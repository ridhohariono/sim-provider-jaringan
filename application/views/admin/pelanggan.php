<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pelanggan</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary tambahPelanggan float-right mb-1" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i>
                Tambah Pelanggan
            </button>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Pelanggan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Speedy</th>
                            <th>Layanan</th>
                            <th>Alamat</th>
                            <th>Label</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Speedy</th>
                            <th>Layanan</th>
                            <th>Alamat</th>
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
                                <td><?= $row['speedy'] ?></td>
                                <td><?= $row['nm_layanan'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['label'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td style="width: 130px;">
                                    <?php if ($row['status'] == "Aktif") : ?>
                                        <div>
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="badge badge-sm badge-success detailsPelanggan" data-toggle="modal" data-target="#detailsPelanggan"><span class="fas fa-eye mr-1"></span>Detail</a>
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJson/'); ?>" class="badge badge-sm badge-warning editPelanggan" data-toggle="modal" data-target="#editDataPelanggan"><span class="fa fa-edit mr-1"></span>Edit</a>
                                            <?php if ($row['denda'] == 1 && $row['status'] == 'Aktif') : ?>
                                                <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" aria-disabled="true" class=" badge badge-sm badge-secondary" disabled><span class="fa fa-sticky-note"></span> Denda</a>
                                            <?php else : ?>
                                                <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="badge badge-sm badge-primary pelangganDenda" data-toggle="modal" data-target="#pelangganDenda"><span class="fa fa-sticky-note"></span> Denda</a>
                                            <?php endif; ?>
                                            <a href="javascript:" class="badge badge-sm badge-danger cabutPelanggan" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" data-toggle="modal" data-target="#cabutPelanggan"><span class="fa fa-plug"></span> Cabut</a>
                                        </div>
                                    <?php else : ?>
                                        <div>
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="badge badge-sm badge-success detailsPelanggan" data-toggle="modal" data-target="#detailsPelanggan"><span class="fas fa-eye mr-1"></span>Detail</a>
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJson/'); ?>" class="badge badge-sm badge-warning editPelanggan" data-toggle="modal" data-target="#editDataPelanggan"><span class="fa fa-edit mr-1"></span>Edit</a>
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" aria-disabled="true" class=" badge badge-sm badge-secondary" disabled><span class="fa fa-sticky-note"></span> Denda</a>
                                            <?php if ($row['status'] == 'Di Cabut') :  ?>
                                                <a href="<?= base_url('admin/delete_pelanggan?id=' . $row['id_pelanggan']); ?>" class="badge badge-sm badge-danger delete"><span class="fa fa-trash"></span> Hapus</a>
                                            <?php else : ?>
                                                <a href="#" class="badge badge-sm badge-secondary" aria-disabled="true" disabled><span class="fa fa-plug"></span> Cabut</a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
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

<!-- Modal Denda -->
<div class="modal fade" id="pelangganDenda" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Pengajuan Denda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/denda_pelanggan'); ?>" method="post">
                    <input type="hidden" id="id_pelanggan_denda" name="id_pelanggan_denda">
                    <input type="hidden" id="id_layanan_denda" name="id_layanan_denda">
                    <div class="form-group">
                        <label for="nm_pelanggan_denda">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nm_pelanggan_denda" name="nm_pelanggan_denda" placeholder="Nama Pelanggan" readonly>
                        <small class="text-danger"><?= form_error('nm_pelanggan'); ?></small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="paket_denda">Paket</label>
                            <input type="text" class="form-control" id="paket_denda" name="paket_denda" placeholder="Nama Paket" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="layanan_denda">Layanan</label>
                            <input type="text" class="form-control" id="layanan_denda" name="layanan_denda" placeholder="Nama Layanan" readonly>
                        </div>
                    </div>
                    <div class="form-group div-odp">
                        <label for="odp_denda">ODP</label>
                        <input type="text" class="form-control" id="odp_denda" name="odp_denda" readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tgl_mulai">Tanggal Mulai</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                </div>
                                <input type="text" class="form-control datePicker" id="tgl_mulai" name="tgl_mulai" placeholder="Periode Awal Denda">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_mulai">Tanggal Akhir</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                </div>
                                <input type="text" class="form-control datePicker" id="tgl_akhir" name="tgl_akhir" placeholder="Periode Akhir Denda">
                            </div>
                        </div>
                    </div>
                    <label for="harga">Jumlah Denda</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="text" class="form-control" id="jmlh_denda" placeholder="ex. 180000" name="jmlh_denda">
                    </div>
                    <div class="form-group">
                        <label for="keterangan_denda">Keterangan</label>
                        <textarea class="form-control" name="keterangan_denda" id="keterangan_denda" cols="30" rows="3"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $(".datePicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: false,
        });
        $("#tgl_mulai").on('changeDate', function(selected) {
            var startDate = new Date(selected.date.valueOf());
            $("#tgl_akhir").datepicker('setStartDate', startDate);
            if ($("#tgl_mulai").val() > $("#tgl_akhir").val()) {
                $("#tgl_akhir").val($("#tgl_mulai").val());
            }
        });
    });
</script>

<!-- CABUT PELANGGAN -->
<!-- Modal Box -->
<div class="modal fade" id="cabutPelanggan" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Cabut Layanan Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/cabut_pelanggan'); ?>" method="post">
                    <input type="hidden" id="id_layanan_cabut" name="id_layanan_cabut">
                    <input type="hidden" id="id_pelanggan_cabut" name="id_pelanggan_cabut">
                    <input type="hidden" id="id_sto_cabut" name="id_sto_cabut">
                    <input type="hidden" id="id_datel_cabut" name="id_datel_cabut">
                    <input type="hidden" id="port_cabut" name="port_cabut">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nm_pelanggan_cabut">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nm_pelanggan_cabut" name="nm_pelanggan_cabut" placeholder="Nama Pelanggan" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="odp_cabut">ODP</label>
                            <input type="text" class="form-control" id="odp_cabut" name="odp_cabut" placeholder="Nama ODP" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_cabut">Alamat</label>
                        <input type="text" class="form-control" id="alamat_cabut" name="alamat_cabut" placeholder="Alamat Pelangan" readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="paket_cabut">Paket</label>
                            <input type="text" class="form-control" id="paket_cabut" name="paket_cabut" placeholder="Nama Paket" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nm_layanan_cabut">Layanan</label>
                            <input type="text" class="form-control" id="nm_layanan_cabut" name="nm_layanan_cabut" placeholder="Nama Layanan" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="label_cabut">Label</label>
                        <input type="text" class="form-control" id="label_cabut" name="label_cabut" placeholder="Label" readonly>
                    </div>
                    <div class="form-group">
                        <label for="keterangan_cabut">Keterangan</label>
                        <textarea name="keterangan_cabut" id="keterangan_cabut" class="form-control" cols="30" rows="3"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -- >                                                                                                                           