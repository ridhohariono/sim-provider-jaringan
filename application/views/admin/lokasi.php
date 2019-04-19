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
        <div class="card-header py-3 bg-gray-800">
            <h6 class="m-0 font-weight-bold text-white">Informasi Lokasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama ODP</th>
                            <th>Nama ODC</th>
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
                                <td><?= $row->kapasitas ?></td>
                                <td style="width: 215px;" class="justify-content-center">
                                    <a href="javascript:" class="btn btn-sm btn-success detailsLokasi" data-toggle="modal" data-target="#detailsLokasi" data-id="<?= $row->id_lokasi;?>" data-url="<?= base_url('admin/lokasi_detailJson?id='.$row->id_lokasi);?>"><span class="fas fa-eye mr-1"></span>Detail</a>
                                    <a href="javascript:" class="btn btn-sm btn-primary editModal" data-toggle="modal" data-target="#tambahData" data-id="<?= $row->id_lokasi;?>" data-url="<?= base_url('admin/getJsonLokasi?id='.$row->id_lokasi);?>"><span class="fa fa-edit mr-1"></span>Edit</a>
                                    <a href="<?= base_url('admin/delete_lokasi?id=') . $row->id_lokasi ?>" class="btn btn-sm btn-danger delete"><span class="fa fa-trash mr-1"></span>Trash</a></td>
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
                        <input type="hidden" id="id_lokasi" name="id_lokasi">

                        <div class="form-group">
                            <label for="nama_odp">Nama ODP</label>
                            <input type="text" class="form-control" id="nama_odp" name="nama_odp" placeholder="Masukkan Nama ODP">
                            <small class="text-danger"><?= form_error('nama_odp'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="nama_odc">Nama ODC</label>
                            <input type="text" class="form-control" id="nama_odc" name="nama_odc" placeholder="Masukkan Nama ODC">
                            <small class="text-danger"><?= form_error('nama_odc'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="text" class="form-control" id="lat" name="lat" placeholder="Masukkan  Latitude">
                            <small class="text-danger"><?= form_error('lat'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="long">Longtitude</label>
                            <input type="text" class="form-control" id="long" name="long" placeholder="Masukkan Longtitude">
                            <small class="text-danger"><?= form_error('long'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="kapasitas">Kapasitas</label>
                            <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan Kapasitas">
                            <small class="text-danger"><?= form_error('kapasitas'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
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
                            <label for="tgl_buat">Tanggal di Buat</label>
                            <input type="text" class="form-control datepicker" id="tgl_buat" name="tgl_buat" placeholder="Pilih Tanggal">
                            <small class="text-danger"><?= form_error('tgl_buat'); ?></small>
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
<div class="modal fade" id="detailsLokasi" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DetailsJudul">Details Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detailsLokasi">
                <section class="content">
                    <h1 class="text-center mb-5">Detail Lokasi</h1>
                    <table class="table table-striped">
                        <tr>
                            <th>Nama ODP</th>
                            <td id="nm_odp">Default</td>
                        </tr>
                        <tr>
                            <th>Nama ODC</th>
                            <td id="nm_odc">Default</td>
                        </tr>
                        <tr>
                            <th>Latitude</th>
                            <td id="lat">Default</td>
                        </tr>
                        <tr>
                            <th>Longtitude</th>
                            <td id="long">Default</td>
                        </tr>
                        <tr>
                            <th>Kapasitas</th>
                            <td id="kapasitas">Default</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td id="alamat">default</td>
                        </tr>
                        <tr>
                            <th>STO</th>
                            <td id="detailssto">default</td>
                        </tr>
                        <tr>
                            <th>Tanggal dibuat</th>
                            <td id="tgl_buat">default</td>
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