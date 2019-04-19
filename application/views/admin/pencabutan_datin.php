<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-5 text-gray-800">Data Pencabutan Datin</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?php if ($this->session->flashdata('teknisi_action')) : ?>
        <div class="flash-datateknisi" data-flashteknisi="<?= $this->session->flashdata('teknisi_action') ?>"></div>
    <?php endif ?>
    <?= $this->session->flashdata('adm_gagal'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mt-5">
        <div class="card-header py-3 bg-gray-800">
            <h6 class="m-0 font-weight-bold text-white">Pencabutan Datin</h6>
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
                        <?php foreach ($cDatin as $row) : ?>
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
                                        <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getCDatinJoinP/'); ?>" class="btn btn-sm btn-success detailsPencabutan" data-toggle="modal" data-target="#detailsCDatin"><span class="fas fa-eye mr-1"></span>Detail</a>
                                        <a href="<?= base_url('admin/lokasi_pemasangan?id=' . $row['id_transaksi'] . '&from=indihome&lok=' . $row['id_lokasi']); ?>" class="btn btn-sm btn-primary"><span class="fa fa-map"></span> Maps</a>
                                    </td>
                                <?php else : ?>
                                    <td style="width: 240px;">
                                        <div class="mt-1">
                                            <a href="javascript:" data-id="<?= $row['id_pelanggan'] ?>" data-url="<?= base_url('admin/getCDatinJoinP/'); ?>" class="btn btn-sm btn-success detailsPencabutan" data-toggle="modal" data-target="#detailsCDatin"><span class="fas fa-eye mr-1"></span>Detail</a>
                                            <?php if ($row['status'] == "Request Pencabutan") : ?>
                                                <a href="<?= base_url('admin/proses_pencabutan?id=' . $row['id_transaksi'] . '&id_pelanggan=' . $row['id_pelanggan'] . '&layanan=datin&status=Proses Pencabutan'); ?>" class="btn btn-sm btn-info prosesPasang"><span class="fa fa-spinner mr-1"></span>Proses</a>
                                            <?php elseif ($row['status'] == "Proses Pencabutan") : ?>
                                                <a href="<?= base_url('admin/proses_pencabutan?id=' . $row['id_transaksi'] . '&id_pelanggan=' . $row['id_pelanggan'] . '&layanan=datin&status=Di Cabut'); ?>" class="btn btn-sm btn-warning cabutSelesai"><span class="fa fa-check mr-1"></span>Selesai</a>
                                            <?php elseif ($row['status'] == "Selesai") : ?>
                                                <a href="<?= base_url('admin/delete_pencabutan?id=' . $row['id_transaksi']) . '&from=datin'; ?>" class="btn btn-sm btn-danger delete"><span class="fa fa-trash mr-1"></span>Hapus</a>
                                            <?php endif; ?>
                                            <a href="<?= base_url('admin/lokasi_pemasangan?id=' . $row['id_transaksi'] . '&from=datin&lok=' . $row['id_lokasi']); ?>" class="btn btn-sm btn-primary"><span class="fa fa-map"></span> Maps</a>
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
<!-- MODAL DETAILS -->
<div class="modal fade" id="detailsCDatin" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DetailsJudul">Details Pencabutan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="DetailsDatel">
                <section class="content">
                    <table class="table table-striped">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <td id="nm_pelanggan_t">Default</td>
                        </tr>
                        <tr>
                            <th>Speedy</th>
                            <td id="speedy_t">Default</td>
                        </tr>
                        <tr>
                            <th>Voice</th>
                            <td id="voice_t">Default</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td id="alamat_t">Default</td>
                        </tr>
                        <tr>
                            <th>Odp</th>
                            <td id="odp_t">Default</td>
                        </tr>
                        <tr>
                            <th>Port</th>
                            <td class="badge badge-pill badge-info" id="port_t">default</td>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <td id="paket_t">default</td>
                        </tr>
                        <tr>
                            <th>Layanan</th>
                            <td id="layanan_t">default</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td id="keterangan_t">default</td>
                        </tr>
                        <tr>
                            <th>Tanggal Aktif</th>
                            <td id="tgl_psb_t">default</td>
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