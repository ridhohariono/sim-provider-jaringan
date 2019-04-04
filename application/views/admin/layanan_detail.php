<div class="container mb-5">
    <div class="row">
        <div class="col">
            <section class="content mb-5">
                <h1 class="text-center mb-5">Detail Datel</h1>
                <table class="table table-striped mb-5">
                    <?php foreach ($layanan as $row) : ?>
                    <tr>
                        <th>ID Layanan</th>
                        <td><?= $row['id_layanan']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Layanan</th>
                        <td><?= $row['nm_layanan']; ?></td>
                    </tr>
                    <tr>
                        <th>Paket</th>
                        <td><?= $row['paket']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Paket</th>
                        <td><?= $row['nm_paket']; ?></td>
                    </tr>
                    <tr>
                        <th>Kecepatan</th>
                        <td><?= $row['kecepatan']; ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp.<?= number_format($row['harga']); ?></td>
                    </tr>
                    <tr>
                        <th>Pelanggan</th>
                        <td>Belum Di bikin</td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <a href="<?= base_url('admin/layanan'); ?>" class="btn btn-success mb-5">Kembali</a>
            </section>
        </div>
    </div>
</div> 