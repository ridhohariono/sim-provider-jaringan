<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Teknisi</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>
    
    <!-- DataTales Example -->
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary tambahData float-right mb-1" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus" id="tambahTeknisi"></i>
                Tambah Teknisi
            </button>
        </div>
    </div>
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
                                <td style="width: 120px;"><?= $row['nm_datel'] ?></td>
                                <td style="width: 215px;" class="justify-content-center">
                                    <a href="javascript:" class="btn btn-sm btn-success detailsModal" data-toggle="modal" data-target="#Details" data-id="<?= $row['id_teknisi'];?>" data-url="<?= base_url('admin/teknisi_detailJson?id='.$row['id_teknisi']);?>"><span class="fas fa-eye mr-1"></span>Detail</a>
                                    <a href="javascript:" class="btn btn-sm btn-primary editModal" data-toggle="modal" data-target="#tambahData" data-id="<?= $row['id_teknisi'];?>" data-url="<?= base_url('admin/getJsonTeknisi?id='.$row['id_teknisi']);?>"><span class="fa fa-edit mr-1"></span>Edit</a>
                                    <a href="<?= base_url('admin/delete_teknisi?id=') . $row['id_teknisi'] ?>" class="btn btn-sm btn-danger delete"><span class="fa fa-trash mr-1"></span>Trash</a>
                                </td>
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
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Teknisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="post">
                    <input type="hidden" id="id" name="id">
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
                        <label for="divisi">Divisi</label>
                        <select class="form-control" id="divisi" name="divisi">
                            <option id="defaultDivisi">Pilih Divisi*</option>
                            <option value="Pemasangan">Pemasangan</option>
                            <option value="Perbaikan">Perbaikan</option>
                        </select>
                        <small class="text-danger"><?= form_error('divisi'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="team">Team</label>
                        <select class="form-control" id="team" name="team">
                            <option id="defaultTeam">Pilih Team*</option>
                            <option value="Merah" class="text-danger">Merah</option>
                            <option value="Kuning" class="text-warning">Kuning</option>
                            <option value="Biru" class="text-primary">Biru</option>
                        </select>
                        <small class="text-danger"><?= form_error('team'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="datel">Datel</label>
                        <select class="form-control" id="datel" name="datel">
                            <?php foreach ($datel as $row): ?>
                            <option id="defaultDatel" value="<?= $row['id_datel'];?>"><?= $row['nm_datel']?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="text-danger"><?= form_error('datel'); ?></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Details" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DetailsJudul">Details Teknisi</h5>
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