<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pelanggan</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>

    <!-- DataTales Example -->
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary tambahPelanggan float-right mb-1" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i>
                Tambah Pelanggan
            </button>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Pelanggan</h6>
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
                            <th>Layanan</th>
                            <th>Datel</th>
                            <th>Tanggal</th>
                            <th>Label</th>
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
                            <th>Layanan</th>
                            <th>Datel</th>
                            <th>Tanggal</th>
                            <th>Label</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pelanggan as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['nm_pelanggan'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['port'] ?></td>
                                <td><?= $row['nm_layanan'] ?></td>
                                <td><?= $row['lokasi'] ?></td>
                                <td><?= $row['tgl_psb'] ?></td>
                                <td><?= $row['label'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td style="width: 220px;">
                                    <a href="<?= base_url('admin/pelanggan_detail?id=') . $row['id_pelanggan']; ?>" class="btn btn-sm btn-success"><span class="fas fa-eye mr-1"></span>Detail</a>
                                    <a href="<?= base_url('admin/edit_pelanggan?id=') . $row['id_pelanggan']; ?>" class="btn btn-sm btn-primary"><span class="fa fa-edit mr-1"></span>Edit</a>
                                    <a href="<?= base_url('admin/delete_pelanggan?id=') . $row['id_pelanggan'] ?>" class="btn btn-sm btn-danger delete"><span class="fa fa-trash mr-1"></span>Denda</a>
                                </td>
                            </tr>
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
                <h5 class="modal-title" id="judulModal">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/add_pelanggan'); ?>" method="post">
                    <div class="form-group">
                        <label for="nm_pelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nm_pelanggan" name="nm_pelanggan" placeholder="Nama Pelanggan">
                        <small class="text-danger"><?= form_error('nm_pelanggan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="speedy">Speedy</label>
                        <input type="text" class="form-control" id="speedy" name="speedy" placeholder="ex. Ti83joaskPajs">
                        <small class="text-danger"><?= form_error('speedy'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="voice">Voice</label>
                        <input type="text" class="form-control" id="voice" name="voice" placeholder="ex. 564316975316">
                        <small class="text-danger"><?= form_error('voice'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Pelangan">
                        <small class="text-danger"><?= form_error('alamat'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="paket">Paket</label>
                        <select class="form-control" id="paket" name="paket">
                            <option value="">Pilih Paket*</option>
                            <?php foreach ($layanan as $row) : ?>
                                <option data-id="<?= $row['id_layanan']; ?>" value="<?= $row['paket']; ?>"><?= $row['paket']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group div-layanan">
                        <label for="layanan">Layanan</label>
                        <select class="form-control" id="layanan" name="layanan">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sto">STO</label>
                        <select class="form-control" id="sto" name="sto">
                            <?php foreach ($sto as $row) : ?>
                                <option value="<?= $row['id_sto']; ?>"><?= $row['nm_sto']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_datel">DATEL</label>
                        <select name="id_datel" id="id_datel" class="form-control">
                            <option>Pilih Datel*</option>
                            <?php foreach ($datel as $row) : ?>
                                <option value="<?= $row['id_datel']; ?>"><?= $row['nm_datel']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?= form_error('id_datel'); ?></small>
                    </div>
                    <div class="form-group div-odp">
                        <label for="odp">ODP</label>
                        <input type="text" class="form-control" id="odp" name="odp" readonly>
                    </div>
                    <div class="form-group">
                        <label for="label">Label</label>
                        <input type="text" class="form-control" id="label" name="label" placeholder="Label">
                        <small class="text-danger"><?= form_error('label'); ?></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -- >                                                                                                                           