<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Telkom</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>
    
    <!-- DataTales Example -->
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary tambahData float-right mb-1" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i>
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
                            <th>Alamat Pelanggan</th>
                            <th>Email Pelanggan</th>
                            <th>No Telp</th>
                            <th>Layanan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat Pelanggan</th>
                            <th>Email Pelanggan</th>
                            <th>No Telp</th>
                            <th>Layanan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pelanggan as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['no_hp'] ?></td>
                            <td><?= $row['layanan'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td style="width: 215px;"><a href="<?= base_url('admin/datel_detail?id=') . $row['id_datel']; ?>" class="btn btn-sm btn-success"><span class="fas fa-eye mr-1"></span>Detail</a>
                                <a href="<?= base_url('admin/edit_datel?id=') . $row['id_datel']; ?>" class="btn btn-sm btn-primary"><span class="fa fa-edit mr-1"></span>Edit</a>
                                <a href="<?= base_url('admin/delete_datel?id=') . $row['id_datel'] ?>" class="btn btn-sm btn-danger delete"><span class="fa fa-trash mr-1"></span>Trash</a></td>
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

                <form action="<?= base_url('admin/add_datel'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_datel">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_datel" name="nama_datel" placeholder="Nama Daerah Telkom">
                        <small class="text-danger"><?= form_error('nik'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat Pelanggan">
                        <small class="text-danger"><?= form_error('lokasi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com">
                        <small class="text-danger"><?= form_error('kakandatel'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="email">No Hp</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com">
                        <small class="text-danger"><?= form_error('kakandatel'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="layanan">Layanan</label>
                        <select name="layanan" id="layanan" class="form-control">
                    <?php foreach ($layanan as $rows): ?>
                            <option value="<?= $rows['id_layanan'];?>"><?= $rows['nm_layanan'];?></option>
                    <?php endforeach ?>
                        </select>
                        <small class="text-danger"><?= form_error('layanan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="sto">Sto/Kecamatan/Kota</label>
                        <select name="sto" id="sto" class="form-control">
                    <?php foreach ($sto as $rows): ?>
                            <option value="<?= $rows['id_sto'];?>"><?= $rows['nm_sto'];?></option>
                    <?php endforeach ?>
                        </select>
                        <small class="text-danger"><?= form_error('sto'); ?></small>
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