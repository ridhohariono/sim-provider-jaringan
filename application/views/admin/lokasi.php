<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Lokasi</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>
    
    <!-- DataTales Example -->
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary tambahData float-right mb-1 " data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i>
                Tambah Lokasi
            </button>
            <a type="button" href="<?= base_url('admin/lihat_lokasi') ?>" class="btn btn-success float-right mb-1 mr-1"><i class="fa fa-search"></i>
                Lihat di Maps
            </a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Lokasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama ODP</th>
                            <th>Nama ODC</th>
                            <th>Latitude</th>
                            <th>Longtitude</th>
                            <th>Kapasitas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($lokasi_info as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row->nm_odp ?></td>
                                <td><?= $row->nm_odc ?></td>
                                <td><?= $row->latitude ?></td>
                                <td><?= $row->longtitude ?></td>
                                <td><?= $row->kapasitas ?></td>
                                <td></td>
                                
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
                    <h5 class="modal-title" id="judulModal">Tambah Lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?= base_url('admin/add_lokasi'); ?>" method="post">
                        <input type="hidden" id="id" name="id_lokasi">

                        <div class="form-group">
                            <label for="nama_odp">Nama ODP</label>
                            <input type="text" class="form-control" id="nama_odp" name="nama_odp" placeholder="Nama ODP">
                            <small class="text-danger"><?= form_error('nama_odp'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="nama_odc">Nama ODC</label>
                            <input type="text" class="form-control" id="nama_odc" name="nama_odc" placeholder="Nama ODC">
                            <small class="text-danger"><?= form_error('nama_odc'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude">
                            <small class="text-danger"><?= form_error('lat'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="long">Longtitude</label>
                            <input type="text" class="form-control" id="long" name="long" placeholder="Longtitude">
                            <small class="text-danger"><?= form_error('long'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="kapasitas">Kapasitas</label>
                            <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas">
                            <small class="text-danger"><?= form_error('kapasitas'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                            <small class="text-danger"><?= form_error('alamat'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="sto">STO</label>
                            <select name="sto" id="sto" class="form-control">
                                <?php foreach ($sto_info as $sto) {
                                    echo '<option value="'.$sto[id_sto].'"> '.$sto[nm_sto].' - '.$sto[lokasi].'</option>';
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                            <small class="text-danger"><?= form_error('alamat'); ?></small>
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