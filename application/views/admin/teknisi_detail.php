<div class="container mb-5">
    <div class="row">
        <div class="col">
            <section class="content mb-5">
                <h1 class="text-center mb-5">Detail Teknisi</h1>
                <table class="table table-striped mb-5">
                    <?php foreach ($teknisi as $row) : ?>
                    <tr>
                        <th>NIK</th>
                        <td><?= $row['nik']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= $row['nm_teknisi']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $row['alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>Divisi</th>
                        <td><?= $row['divisi']; ?></td>
                    </tr>
                    <tr>
                        <th>Team</th>
                        <td><?= $row['team']; ?></td>
                    </tr>
                    <tr>
                        <th>Datel</th>
                        <td><?= $row['nm_datel']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Datel</th>
                        <td><?= $row['lokasi']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <a href="<?= base_url('admin/teknisi'); ?>" class="btn btn-success mb-5">Kembali</a>
            </section>
        </div>
    </div>
</div> 