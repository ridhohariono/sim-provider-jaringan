<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Teknisi</h1>
    <div class="row mb-5">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tambahData" data-toggle="modal" data-target="#tambahData">
                Tambah Data Teknisi
            </button>
        </div>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_action'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Teknisi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Divisi</th>
                            <th>Team</th>
                            <th>Lokasi Datel</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Divisi</th>
                            <th>Team</th>
                            <th>Lokasi Datel</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($teknisi as $row) : ?>
                        <tr>
                            <td><?= $row['nik'] ?></td>
                            <td><?= $row['nm_teknisi'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['divisi'] ?></td>
                            <td><?= $row['team'] ?></td>
                            <td><?= $row['nm_datel'] ?></td>
                            <td><a href="<?= base_url('admin/teknisi_detail?id=') . $row['id_teknisi']; ?>" class="btn btn-success p-1">Detail</a>
                                <a href="<?= base_url('admin/edit_teknisi?id=') . $row['id_teknisi']; ?>" class="btn btn-primary p-1">Edit</a>
                                <a href="<?= base_url('admin/delete_teknisi?id=') . $row['id_teknisi'] ?>" class="btn btn-danger p-1 delete">Hapus</a></td>
                        </tr>
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
                <h5 class="modal-title" id="judulModal">Tambah Teknisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/add_teknisi'); ?>" method="post">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Nik">
                        <small class="text-danger"><?= form_error('nik'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        <small class="text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                        <small class="text-danger"><?= form_error('alamat'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="divisi">Team</label>
                        <select class="form-control" id="divisi" name="divisi">
                            <option default>Pilih Divisi*</option>
                            <option value="Pemasangan">Pemasangan</option>
                            <option value="Perbaikan">Perbaikan</option>
                        </select>
                        <small class="text-danger"><?= form_error('divisi'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="team">Team</label>
                        <select class="form-control" id="team" name="team">
                            <option>Pilih Team*</option>
                            <option value="Merah" class="text-danger">Merah</option>
                            <option value="Kuning" class="text-warning">Kuning</option>
                            <option value="Biru" class="text-primary">Biru</option>
                        </select>
                        <small class="text-danger"><?= form_error('team'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="datel">Datel</label>
                        <select class="form-control" id="datel" name="datel">
                            <option value="1">Cirebon</option>
                            <option value="2">Indramayu</option>
                            <option value="3">Kuningan</option>
                            <option value="4">Majalengka</option>
                        </select>
                        <small class="text-danger"><?= form_error('datel'); ?></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -- >                                                                                                                           