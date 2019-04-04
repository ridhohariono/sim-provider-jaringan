<div class="container mb-5">
    <div class="row">
        <div class="col">
            <section class="content mb-5">
                <h1 class="text-center mb-5">Detail Datel</h1>
                <table class="table table-striped mb-5">
                    <?php foreach ($datel as $row) : ?>
                    <tr>
                        <th>ID Datel</th>
                        <td><?= $row['id_datel']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Datel</th>
                        <td><?= $row['nm_datel']; ?></td>
                    </tr>
                    <tr>
                        <th>Lokasi Datel</th>
                        <td><?= $row['lokasi']; ?></td>
                    </tr>
                    <tr>
                        <th>Kepala Kantor Datel</th>
                        <td><?= $row['kakandatel']; ?></td>
                    </tr>
                    <tr>
                        <th>Status Datel</th>
                        <td><?= $row['status']; ?></td>
                    </tr>
                    <tr>
                        <th>Teknisi</th>
                        <?php if ($datelByteknisi == 0): ?>
                         <td class="text-danger">Belum Ada Teknisi di <?= $row['nm_datel']?></td>   
                         <?php else: ?>
                        <td><?= $datelByteknisi; ?> Orang</td>
                        <?php endif ?>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <a href="<?= base_url('admin/datel'); ?>" class="btn btn-success mb-5">Kembali</a>
            </section>
        </div>
    </div>
</div> 