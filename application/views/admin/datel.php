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
                Tambah Datel
            </button>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Datel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Datel</th>
                            <th>Lokasi Datel</th>
                            <th>Kepala Kantor Datel</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Datel</th>
                            <th>Lokasi Datel</th>
                            <th>Kepala Kantor Datel</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($datel as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['nm_datel'] ?></td>
                                <td><?= $row['lokasi'] ?></td>
                                <td><?= $row['kakandatel'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td style="width: 215px;"><a href="javascript" class="btn btn-sm btn-success detailsDatel" data-toggle="modal" data-target="#DetailsModal" data-id="<?= $row['id_datel'];?>" data-url="<?= base_url('admin/getJsonDatel?id='.$row['id_datel']);?>"><span class="fas fa-eye mr-1"></span>Detail</a>
                                    <a href="javascript:" class="btn btn-sm btn-primary editDatel" data-toggle="modal" data-target="#tambahData" data-id="<?= $row['id_datel'];?>" data-url="<?= base_url('admin/getJsonDatel?id='.$row['id_datel']);?>"><span class="fa fa-edit mr-1"></span>Edit</a>
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
                    <h5 class="modal-title" id="judulModal">Tambah Datel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?= base_url('admin/add_datel'); ?>" method="post">
                        <input type="hidden" id="id" name="id_datel">
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
                        <div class="form-group status">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Aktif" id="defaultStatus">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="submit">Tambah Datel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DETAILS -->
<div class="modal fade" id="DetailsModal" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DetailsJudul">Details Datel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body" id="DetailsDatel">
    <section class="content">
        <h1 class="text-center mb-5">Detail Datel</h1>
                <table class="table table-striped">
                    <tr>
                        <th>ID Datel</th>
                        <td id="id_datel">Default</td>
                    </tr>
                    <tr>
                        <th>Nama Datel</th>
                        <td id="nm_datel">Default</td>
                    </tr>
                    <tr>
                        <th>Lokasi Datel</th>
                        <td id="lokasi">Default</td>
                    </tr>
                    <tr>
                        <th>Kepala Kantor Datel</th>
                        <td id="kakandatel">Default</td>
                    </tr>
                    <tr>
                        <th>Status Datel</th>
                        <td id="status">Default</td>
                    </tr>
                    <tr>
                        <th>Teknisi</th>
                         <td class="text-danger" id="teknisi">default</td>   
                    </tr>
                </table>
    </section>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- End of Main Content -- >                                                                                                                           