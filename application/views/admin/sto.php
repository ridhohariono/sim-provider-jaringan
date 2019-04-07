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
                Tambah Sto
            </button>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi STO</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama STO</th>
                            <th>Lokasi STO</th>
                            <th>Datel</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama STO</th>
                            <th>Lokasi STO</th>
                            <th>Datel</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($sto as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nm_sto'] ?></td>
                            <td><?= $row['lokasi'] ?></td>
                            <td><?= $row['nm_datel'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/edit_sto?id=') . $row['id_sto']; ?>" class="btn btn-sm btn-primary mr-2"><span class="fa fa-edit mr-1"></span>Edit</a>
                                <a href="<?= base_url('admin/delete_sto?id=') . $row['id_sto'] ?>" class="btn btn-sm btn-danger delete"><span class="fa fa-trash mr-1"></span>Trash</a></td>
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

                <form action="<?= base_url('admin/add_datel'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_datel">Nama Datel</label>
                        <input type="text" class="form-control" id="nama_datel" name="nama_datel" placeholder="Nama Daerah Telkom">
                        <small class="text-danger"><?= form_error('nik'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Datel">
                        <small class="text-danger"><?= form_error('lokasi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="kakandatel">KakanDatel</label>
                        <input type="text" class="form-control" id="kakandatel" name="kakandatel" placeholder="Kepala Kantor Datel">
                        <small class="text-danger"><?= form_error('kakandatel'); ?></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Datel</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -- >                                                                                                                           