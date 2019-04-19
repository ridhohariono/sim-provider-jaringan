<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-5 text-gray-800">Data Denda</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-800">
            <h6 class="m-0 font-weight-bold text-white">Informasi Denda</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Paket</th>
                            <th>Layanan</th>
                            <th>Lama Nunggak</th>
                            <th>Jumlah Denda</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Paket</th>
                            <th>Layanan</th>
                            <th>Lama Nunggak</th>
                            <th>Jumlah Denda</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($denda as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['nm_pelanggan'] ?></td>
                                <td><?= $row['paket'] ?></td>
                                <td><?= $row['layanan'] ?></td>
                                <td><?= $row['lama_nunggak'] ?> Hari</td>
                                <td>Rp.<?= number_format($row['denda']); ?>,-</td>
                                <td style="width: 215px;">
                                    <a href="javascript" class="btn btn-sm btn-success detailsDenda" data-toggle="modal" data-target="#detailDenda" data-id="<?= $row['id_pelanggan']; ?>" data-url="<?= base_url('admin/details_dendaJson'); ?>"><span class="fas fa-eye mr-1"></span>Detail</a>
                                    <a href="javascript:" class="btn btn-sm btn-primary editDenda" data-toggle="modal" data-target="#editDenda" data-id="<?= $row['id_denda']; ?>" data-url="<?= base_url('admin/edit_dendaJson'); ?>"><span class="fa fa-edit mr-1"></span>Edit</a>
                                    <a href="<?= base_url('admin/delete_denda?id_denda=' . $row['id_denda']) . '&id_pelanggan=' . $row['id_pelanggan']; ?>" class="btn btn-sm btn-danger delete"><span class="fa fa-trash mr-1"></span>Trash</a>
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

<!-- MODAL DETAILS -->
<div class="modal fade" id="detailDenda" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DetailsJudul">Details Denda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="DetailsDatel">
                <section class="content">
                    <table class="table table-striped">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <td id="nm_pelanggan">Default</td>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <td id="paket">Default</td>
                        </tr>
                        <tr>
                            <th>Layanan</th>
                            <td id="layanan">Default</td>
                        </tr>
                        <tr>
                            <th>ODP</th>
                            <td id="odp">Default</td>
                        </tr>
                        <tr>
                            <th>Port</th>
                            <td id="port">Default</td>
                        </tr>
                        <tr>
                            <th>Lama Nunggak</th>
                            <td id="lama_nunggak">Default</td>
                        </tr>
                        <tr>
                            <th>Denda</th>
                            <td id="denda">default</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td id="keterangan">default</td>
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

<!-- MODAL EDIT -->
<!-- Modal Denda -->
<div class="modal fade" id="editDenda" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Pengajuan Denda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/edit_dendaSubmit'); ?>" method="post">
                    <input type="hidden" id="id_pelanggan_denda" name="id_pelanggan_denda">
                    <input type="hidden" id="id_denda" name="id_denda">
                    <div class="form-group">
                        <label for="nm_pelanggan_denda">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nm_pelanggan_denda" name="nm_pelanggan_denda" placeholder="Nama Pelanggan" readonly>
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

</div>
<!-- End of Main Content -- >                                                                                                                           