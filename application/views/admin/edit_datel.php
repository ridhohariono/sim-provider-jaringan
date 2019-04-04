<div class="container">
    <div class="row">
        <div class="col-md-8 justify-content-center">
            <form action="" method="post">
                <h3 class="mb-4">Ubah Data Teknisi</h3>
                <?php foreach ($datel as $row) : ?>
                <div class="form-group">
                    <label for="nama_datel">Nama Datel</label>
                    <input type="text" class="form-control" id="nama_datel" value="<?= $row['nm_datel']; ?>" name="nama_datel">
                    <small class="text-danger"><?= form_error('nama_datel'); ?></small>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi Datel</label>
                    <input type="text" class="form-control" id="lokasi" value="<?= $row['lokasi']; ?>" name="lokasi">
                    <small class="text-danger"><?= form_error('lokasi'); ?></small>
                </div>
                <div class="form-group">
                    <label for="kakandatel">Kakan Datel</label>
                    <input type="text" class="form-control" id="kakandatel" value="<?= $row['kakandatel']; ?>" name="kakandatel">
                    <small class="text-danger"><?= form_error('kakandatel'); ?></small>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <?php if ($row['status'] == "Aktif") : ?>
                        <option value="Aktif" selected>Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                        <?php else : ?>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif" selected>Tidak Aktif</option>
                        <?php endif; ?>
                    </select>
                    <small class="text-danger"><?= form_error('divisi'); ?></small>
                </div>
                <?php endforeach; ?>
                <a href="<?= base_url('admin/datel') ?>" class="btn btn-success mr-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div> 