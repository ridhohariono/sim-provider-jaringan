<div class="container">
    <div class="row">
        <div class="col-md-8 justify-content-center">
            <form action="" method="post">
                <h3 class="mb-4">Ubah Data Teknisi</h3>
                <?php foreach ($teknisi as $row) : ?>
                <div class="form-group">
                    <label for="nik">NIK Teknisi</label>
                    <input type="text" class="form-control" id="nik" value="<?= $row['nik']; ?>" name="nik">
                    <small class="text-danger"><?= form_error('nik'); ?></small>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Teknisi</label>
                    <input type="text" class="form-control" id="nm_teknisi" value="<?= $row['nm_teknisi']; ?>" name="nama">
                    <small class="text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Teknisi</label>
                    <input type="text" class="form-control" id="alamat" value="<?= $row['alamat']; ?>" name="alamat">
                    <small class="text-danger"><?= form_error('alamat'); ?></small>
                </div>
                <div class="form-group">
                    <label for="divisi">Divisi</label>
                    <select class="form-control" id="divisi" name="divisi">
                        <?php if ($row['divisi'] == "Pemasangan") : ?>
                        <option value="Pemasangan" selected>Pemasangan</option>
                        <option value="Perbaikan">Perbaikan</option>
                        <?php else : ?>
                        <option value="Pemasangan">Pemasangan</option>
                        <option value="Perbaikan" selected>Perbaikan</option>
                        <?php endif; ?>
                    </select>
                    <small class="text-danger"><?= form_error('divisi'); ?></small>
                </div>
                <div class="form-group">
                    <label for="team">Team</label>
                    <select class="form-control" id="team" name="team">
                        <?php if ($row['team'] == "Merah") : ?>
                        <option value="Merah" class="text-danger" selected>Merah</option>
                        <option value="Kuning" class="text-warning">Kuning</option>
                        <option value="Biru" class="text-primary">Biru</option>
                        <?php elseif ($row['team'] == "Kuning") : ?>
                        <option value="Merah" class="text-danger">Merah</option>
                        <option value="Kuning" class="text-warning" selected>Kuning</option>
                        <option value="Biru" class="text-primary">Biru</option>
                        <?php else : ?>
                        <option value="Merah" class="text-danger">Merah</option>
                        <option value="Kuning" class="text-warning">Kuning</option>
                        <option value="Biru" class="text-primary" selected>Biru</option>
                        <?php endif; ?>
                    </select>
                    <small class="text-danger"><?= form_error('team'); ?></small>
                </div>
                <div class="form-group">
                    <label for="datel">Datel</label>
                    <select class="form-control" id="datel" name="datel">
                        <?php if ($row['id_datel'] == 1) : ?>
                        <option value="1" selected>Cirebon</option>
                        <option value="2">Indramayu</option>
                        <option value="3">Kuningan</option>
                        <option value="4">Majalengka</option>
                        <?php elseif ($row['id_datel'] == 2) : ?>
                        <option value="1">Cirebon</option>
                        <option value="2" selected>Indramayu</option>
                        <option value="3">Kuningan</option>
                        <option value="4">Majalengka</option>
                        <?php elseif ($row['id_datel'] == 3) : ?>
                        <option value="1">Cirebon</option>
                        <option value="2">Indramayu</option>
                        <option value="3" selected>Kuningan</option>
                        <option value="4">Majalengka</option>
                        <?php elseif ($row['id_datel'] == 4) : ?>
                        <option value="1">Cirebon</option>
                        <option value="2">Indramayu</option>
                        <option value="3">Kuningan</option>
                        <option value="4" selected>Majalengka</option>
                        <?php endif; ?>
                    </select>
                    <small class="text-danger"><?= form_error('datel'); ?></small>
                </div>
                <?php endforeach; ?>
                <a href="<?= base_url('admin/teknisi') ?>" class="btn btn-success mr-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div> 