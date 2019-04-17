<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pelanggan</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="<?= base_url('admin/make_pelanggan_pdf/'); ?>" role="button">Pdf</a>
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
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Port</th>
                            <th>Layanan</th>
                            <th>Datel</th>
                            <th>Label</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Port</th>
                            <th>Layanan</th>
                            <th>Datel</th>
                            <th>Label</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pelanggan as $row) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <td><?= $row['nm_pelanggan'] ?></td>
                                <td><?= $row['port'] ?></td>
                                <td><?= $row['nm_layanan'] ?></td>
                                <td><?= $row['lokasi'] ?></td>
                                <td><?= $row['label'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <?php if ($row['status'] == "Aktif") : ?>
                                    <td style="width: 300px;">
                                        <div class="mt-2">
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="btn btn-sm btn-success detailsPelanggan" data-toggle="modal" data-target="#detailsPelanggan"><span class="fas fa-eye mr-1"></span>Detail</a>
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJson/'); ?>" class="btn btn-sm btn-warning editPelanggan" data-toggle="modal" data-target="#editDataPelanggan"><span class="fa fa-edit mr-1"></span>Edit</a>
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="btn btn-sm btn-primary pelangganDenda" data-toggle="modal" data-target="#detailsPelanggan"><span class="fa fa-sticky-note"></span> Denda</a>
                                            <a href="#" class="btn btn-sm btn-danger delete"><span class="fa fa-plug"></span> Cabut</a>
                                        </div>
                                    </td>
                                <?php else : ?>
                                    <td style="width: 150px;">
                                        <div class="mt-2">
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="btn btn-sm btn-success detailsPelanggan" data-toggle="modal" data-target="#detailsPelanggan"><span class="fas fa-eye mr-1"></span>Detail</a>
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJson/'); ?>" class="btn btn-sm btn-warning editPelanggan" data-toggle="modal" data-target="#editDataPelanggan"><span class="fa fa-edit mr-1"></span>Edit</a>
                                        </div>
                                    </td>
                                <?php endif; ?>
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
    <div class="modal-dialog modal-lg" role="document">
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


<!-- MODAL EDIT -->
<div class="modal fade" id="editDataPelanggan" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Edit Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/add_pelanggan'); ?>" method="post">
                    <input type="hidden" name="id_pelanggan" id="id_pelanggan_edit">
                    <div class="form-group">
                        <label for="nm_pelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nm_pelanggan_edit" name="nm_pelanggan" placeholder="Nama Pelanggan">
                        <small class="text-danger"><?= form_error('nm_pelanggan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="speedy">Speedy</label>
                        <input type="text" class="form-control" id="speedy_edit" name="speedy" placeholder="ex. Ti83joaskPajs">
                        <small class="text-danger"><?= form_error('speedy'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="voice">Voice</label>
                        <input type="text" class="form-control" id="voice_edit" name="voice" placeholder="ex. 564316975316">
                        <small class="text-danger"><?= form_error('voice'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat_edit" name="alamat" placeholder="Alamat Pelangan">
                        <small class="text-danger"><?= form_error('alamat'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="label">Label</label>
                        <input type="text" class="form-control" id="label_edit" name="label" placeholder="Label">
                        <small class="text-danger"><?= form_error('label'); ?></small>
                    </div>
                    <input type="hidden" id="id_layanan_edit" name="id_layanan">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit Pelanggan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DETAILS -->
<div class="modal fade" id="detailsPelanggan" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DetailsJudul">Details Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="DetailsDatel">
                <section class="content">
                    <h1 class="text-center mb-5">Detail Pelanggan</h1>
                    <table class="table table-striped">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <td id="nm_pelanggan">Default</td>
                        </tr>
                        <tr>
                            <th>Speedy</th>
                            <td id="speedy">Default</td>
                        </tr>
                        <tr>
                            <th>Voice</th>
                            <td id="voice">Default</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td id="alamat">Default</td>
                        </tr>
                        <tr>
                            <th>Odp</th>
                            <td id="odp">Default</td>
                        </tr>
                        <tr>
                            <th>Port</th>
                            <td class="badge badge-pill badge-info" id="port">default</td>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <td id="paket">default</td>
                        </tr>
                        <tr>
                            <th>Layanan</th>
                            <td id="layanan">default</td>
                        </tr>
                        <tr>
                            <th>Label</th>
                            <td id="label">default</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td id="status">default</td>
                        </tr>
                        <tr>
                            <th>Teknisi</th>
                            <td id="teknisi">default</td>
                        </tr>
                        <tr>
                            <th>Tanggal Aktif</th>
                            <td id="tgl_psb">default</td>
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

</div>
<!-- End of Main Content -- >                                                                                                                           