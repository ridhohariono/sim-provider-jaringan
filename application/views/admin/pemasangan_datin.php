<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-5 text-gray-800">Data Pemasangan Datin</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pemasangan Datin</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Port</th>
                            <th>Label</th>
                            <th>Datel</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Port</th>
                            <th>Label</th>
                            <th>Datel</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pDatin as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['nm_pelanggan'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['port'] ?></td>
                                <td><?= $row['label'] ?></td>
                                <td><?= $row['nm_datel'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <?php if ($this->session->userdata('role_id') == 1) : ?>
                                    <td style="width: 160px;">
                                        <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="btn btn-sm btn-success detailsPelanggan" data-toggle="modal" data-target="#detailsPelanggan"><span class="fas fa-eye mr-1"></span>Detail</a>
                                        <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="btn btn-sm btn-primary detailsPelanggan" data-toggle="modal" data-target="#detailsPelanggan"><span class="fa fa-map"></span> Maps</a>
                                    </td>
                                <?php else : ?>
                                    <td style="width: 240px;">
                                        <div class="mt-1">
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="btn btn-sm btn-success detailsPelanggan" data-toggle="modal" data-target="#detailsPelanggan"><span class="fas fa-eye mr-1"></span>Detail</a>
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="btn btn-sm btn-info detailsPelanggan" data-toggle="modal" data-target="#detailsPelanggan"><span class="fa fa-spinner mr-1"></span>Proses</a>
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="btn btn-sm btn-primary detailsPelanggan" data-toggle="modal" data-target="#detailsPelanggan"><span class="fa fa-map"></span> Maps</a>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <form action=""></form>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Box -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Sto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/add_sto'); ?>" method="post">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="id_datel" name="id_datel">
                    <div class="form-group">
                        <label for="nama_sto">Nama STO</label>
                        <input type="text" class="form-control" id="nama_sto" name="nama_sto" placeholder="Nama STO">
                        <small class="text-danger"><?= form_error('nama_sto'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Datel">
                        <small class="text-danger"><?= form_error('lokasi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="datel_def">Datel</label>
                        <select name="datel_def" id="datel_def" class="form-control">
                            <?php foreach ($sto as $row) : ?>
                                <option id="" value="<?= $row['id_datel']; ?>"><?= $row['nm_datel']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="text-danger"><?= form_error('datel_def'); ?></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="submit">Tambah STO</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -- >                                                                                                                           