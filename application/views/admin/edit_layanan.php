<div class="container">
    <div class="row">
        <div class="col-md-8 justify-content-center">
            <form action="" method="post">
                <h3 class="mb-4">Ubah Layanan</h3>
                <?php foreach ($layanan as $row) : ?>
                <div class="form-group">
                    <label for="nama_layanan">Nama Layanan</label>
                    <input type="text" class="form-control" id="nama_layanan" value="<?= $row['nm_layanan']; ?>" name="nama_layanan">
                    <small class="text-danger"><?= form_error('nama_layanan'); ?></small>
                </div>
                <div class="form-group">
                        <label for="paket">Paket</label>
                        <select name="paket" id="paket" class="form-control">
                            <?php if ($row['paket'] == 'Indihome'): ?>
                                <option value="Indihome" selected>Indihome</option>
                                <option value="Datin">Datin</option>
                            <?php else: ?>
                                <option value="Indihome">Indihome</option>
                                <option value="Datin" selected>Datin</option>
                            <?php endif; ?>
                        </select>
                        <small class="text-danger"><?= form_error('paket'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nm_paket">Nama Paket</label>
                        <input type="text" class="form-control" id="nm_paket" name="nm_paket" placeholder="Nama Paket" value="<?= $row['nm_paket']; ?>">
                        <small class="text-danger"><?= form_error('nm_paket'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="kecepatan">Kecepatan(Mbps)</label>
                        <input type="text" class="form-control" id="kecepatan" name="kecepatan" placeholder="ex. 10" value="<?= $row['kecepatan']; ?>">
                        <small>Masukan Angka Saja</small>
                        <small class="text-danger"><?= form_error('kecepatan'); ?></small>
                    </div>
                    <label for="harga">Harga</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                      </div>
                     <input type="text" class="form-control" id="harga" placeholder="ex. 180000" name="harga" value="<?= $row['harga']; ?>">
                     <small class="text-danger"><?= form_error('harga'); ?></small>
                  </div>
                <?php endforeach; ?>
                <a href="<?= base_url('admin/layanan') ?>" class="btn btn-success mr-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div> 