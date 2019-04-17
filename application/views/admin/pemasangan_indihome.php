<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-5 text-gray-800">Data Pemasangan Indihome</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?php if ($this->session->flashdata('teknisi_action')) : ?>
        <div class="flash-datateknisi" data-flashteknisi="<?= $this->session->flashdata('teknisi_action') ?>"></div>
    <?php endif ?>
    <?= $this->session->flashdata('adm_gagal'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pemasangan Indihome</h6>
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
                            <th>Label</th>
                            <th>Datel</th>
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
                            <th>Label</th>
                            <th>Datel</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pIndihome as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['nm_pelanggan'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['port'] ?></td>
                                <td><?= $row['label'] ?></td>
                                <td><?= $row['nm_datel'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <?php if ($this->session->userdata('role_id') == 1) : ?>
                                    <td style="width: 160px;">
                                        <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="btn btn-sm btn-success detailsPemasangan" data-toggle="modal" data-target="#detailsPIndihome"><span class="fas fa-eye mr-1"></span>Detail</a>
                                        <a href="<?= base_url('admin/lokasi_pemasangan?id=' . $row['id_transaksi']); ?>" class="btn btn-sm btn-primary"><span class="fa fa-map"></span> Maps</a>
                                    </td>
                                <?php else : ?>
                                    <td style="width: 240px;">
                                        <div class="mt-1">
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getPelangganByIdJsonJoin/'); ?>" class="btn btn-sm btn-success detailsPemasangan" data-toggle="modal" data-target="#detailsPIndihome"><span class="fas fa-eye mr-1"></span>Detail</a>
                                            <?php if ($row['status'] == "Tidak/Belum Terpasang") : ?>
                                                <a href="<?= base_url('admin/proses_pemasangan?id=' . $row['id_transaksi'] . '&id_pelanggan=' . $row['id_pelanggan'] . '&layanan=indihome&status=Proses Pemasangan'); ?>" class="btn btn-sm btn-info prosesPasang"><span class="fa fa-spinner mr-1"></span>Proses</a>
                                            <?php elseif ($row['status'] == "Proses Pemasangan") : ?>
                                                <a href="<?= base_url('admin/proses_pemasangan?id=' . $row['id_transaksi'] . '&id_pelanggan=' . $row['id_pelanggan'] . '&layanan=indihome&status=Aktif'); ?>" class="btn btn-sm btn-warning onlinePasang"><span class="fa fa-signal mr-1"></span>Online</a>
                                            <?php elseif ($row['status'] == "Selesai") : ?>
                                                <a href="<?= base_url('admin/delete_pemasangan?id=' . $row['id_transaksi']); ?>" class="btn btn-sm btn-danger delete"><span class="fa fa-trash mr-1"></span>Hapus</a>
                                            <?php endif; ?>
                                            <a href="<?= base_url('admin/lokasi_pemasangan?id=' . $row['id_transaksi']); ?>" class="btn btn-sm btn-primary"><span class="fa fa-map"></span> Maps</a>
                                        </div>
                                    </td>
                                <?php endif; ?>
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

                <form action="<?= base_url('admin/add_sto'); ?>" method="post">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="id_datel" name="id_datel">
                    <div class="form-group">
                        <label for="nama_sto">Nama STO</label>
                        <input type="text" class="form-control" id="nama_sto" name="nama_sto" placeholder="Nama STO">
                        <small class="text-danger"><?= form_error('nama_sto'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Datel">
                        <small class="text-danger"><?= form_error('lokasi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="datel_def">Datel</label>
                        <select name="datel_def" id="datel_def" class="form-control">
                            <?php foreach ($sto as $row) : ?>
                                <option id="" value="<?= $row['id_datel']; ?>"><?= $row['nm_datel']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="text-danger"><?= form_error('datel_def'); ?></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="submit">Tambah STO</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL DETAILS -->
<div class="modal fade" id="detailsPIndihome" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DetailsJudul">Details Pemasangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="DetailsDatel">
                <section class="content">
                    <h1 class="text-center mb-5">Detail Pemasangan Indihome</h1>
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