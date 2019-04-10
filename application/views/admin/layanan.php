<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Layanan</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>
    
    <!-- DataTales Example -->
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary tambahLayanan float-right mb-1" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i>
                Tambah Layanan
            </button>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Layanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama layanan</th>
                            <th>Paket layanan</th>
                            <th>Nama Paket</th>
                            <th>Kecepatan</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama layanan</th>
                            <th>Paket layanan</th>
                            <th>Nama Paket</th>
                            <th>Kecepatan</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($layanan as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nm_layanan'] ?></td>
                            <td><?= $row['paket'] ?></td>
                            <td><?= $row['nm_paket'] ?></td>
                            <td><?= $row['kecepatan'] ?></td>
                            <td>Rp.<?= number_format($row['harga']); ?></td>
                            <td style="width: 215px;"><a href="javascript:" class="btn btn-sm btn-success Details" data-toggle="modal" data-target="#Details" data-id="<?= $row['id_layanan'];?>" data-url="<?= base_url('admin/getJsonLayanan?id='.$row['id_layanan']);?>"><span class="fas fa-eye mr-1"></span>Detail</a>
                                <a href="javascript:" class="btn btn-sm btn-primary editLayanan" data-toggle="modal" data-target="#tambahData" data-id="<?= $row['id_layanan'];?>" data-url="<?= base_url('admin/getJsonLayanan?id='.$row['id_layanan']);?>"><span class="fa fa-edit mr-1"></span>Edit</a>
                                <a href="<?= base_url('admin/delete_layanan?id=') . $row['id_layanan'] ?>" class="btn btn-sm btn-danger delete"><span class="fa fa-trash mr-1"></span>Trash</a></td>
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
                <h5 class="modal-title" id="judulModal">Tambah layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="post">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="nama_layanan">Nama layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Nama Layanan">
                        <small class="text-danger"><?= form_error('nama_layanan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="paket">Paket</label>
                        <select name="paket" id="paket" class="form-control">
                            <option value="Indihome" id="defStatus">Indihome</option>
                            <option value="Datin">Datin</option>
                        </select>
                        <small class="text-danger"><?= form_error('paket'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nm_paket">Nama Paket</label>
                        <input type="text" class="form-control" id="nm_paket" name="nm_paket" placeholder="Nama Paket">
                        <small class="text-danger"><?= form_error('nm_paket'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="kecepatan">Kecepatan(Mbps)</label>
                        <input type="text" class="form-control" id="kecepatan" name="kecepatan" placeholder="ex. 10">
                        <small>Masukan Angka Saja</small>
                        <small class="text-danger"><?= form_error('kecepatan'); ?></small>
                    </div>
                    <label for="harga">Harga</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                      </div>
                     <input type="text" class="form-control" id="harga" placeholder="ex. 180000" name="harga">
                     <small class="text-danger"><?= form_error('harga'); ?></small>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah layanan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- MODAL DETAILS -->
<div class="modal fade" id="Details" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DetailsJudul">Details Layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
        </div>
        <div class="modal-body" id="Details">
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
</div>
</div>
</div>
<!-- End of Main Content -- >                                                                                                                           