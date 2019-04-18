<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data ODP</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>
    
    <!-- DataTales Example -->
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary tambahOdp float-right mb-1" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i>
                Tambah ODP
            </button>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi ODP</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama ODP</th>
                            <th>Nama ODC</th>
                            <th>Datel</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama ODP</th>
                            <th>Nama ODC</th>
                            <th>Datel</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($odp as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nm_odp'] ?></td>
                            <td><?= $row['nm_odc'] ?></td>
                            <td><?= $row['nm_datel'] ?></td>
                            <td class="text-center">
                                <a href="javascript:" class="btn btn-sm btn-primary mr-2 modalEditODP" id="modalEditODP" data-toggle="modal" data-target="#tambahData" data-id="<?= $row['id_odp'];?>" data-url="<?= base_url('admin/getJsonODP?id='.$row['id_odp']);?>"><span class="fa fa-edit mr-1"></span>Edit</a>
                                <a href="javascript" class="btn btn-sm btn-success detailsOdp" data-toggle="modal" data-target="#DetailsModal" data-id="<?= $row['id_odp']; ?>" data-url="<?= base_url('admin/getJsonODP?id=' . $row['id_odp']); ?>"><span class="fas fa-eye mr-1"></span>Detail</a>
                                <a href="<?= base_url('admin/delete_odp?id=') . $row['id_odp'] ?>" class="btn btn-sm btn-danger delete"><span class="fa fa-trash mr-1"></span>Trash</a></td>
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
                <h5 class="modal-title" id="judulModal">Tambah ODP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/add_odp'); ?>" method="post">
                    <input type="hidden" class="form-control" id="id" name="id">

                    <div class="form-group">
                        <label for="nm_odp">Nama ODP</label>
                        <input type="text" class="form-control" id="nm_odp" name="nm_odp" placeholder="Nama ODP">
                        <small class="text-danger"><?= form_error('nm_odp'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="odc">ODC</label>
                        <select name="cmb_odc" id="cmb_odc" class="form-control">
                            <?php foreach ($odc_info as $row): ?>
                                <option id="" value="<?= $row->id_odc;?>"><?= $row->nm_odc;?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="text-danger"><?= form_error('odc'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="datel_def">Datel</label>
                        <select name="datel_def" id="datel_def" class="form-control">
                            <?php foreach ($datel_info as $row): ?>
                                <option id="" value="<?= $row['id_datel'];?>"><?= $row['nm_datel'];?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="text-danger"><?= form_error('datel_def'); ?></small>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="submit">Tambah ODP</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="DetailsModal" tabindex="-1" role="dialog" aria-labelledby="Details" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DetailsJudul">Details ODP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detailsOdp">
                <section class="content">
                    <h1 class="text-center mb-5">Detail ODP</h1>
                    <table class="table table-striped">
                        <tr>
                            <th>Nama ODP</th>
                            <td id="nama_odp">Default</td>
                        </tr>
                        <tr>
                            <th>Nama ODC</th>
                            <td id="nama_odc">Default</td>
                        </tr>
                        <tr>
                            <th>Datel</th>
                            <td id="nama_datel">Default</td>
                        </tr>
                        <tr>
                            <th>Port Digunakan</th>
                            <td id="port_terpakai">Default</td>
                        </tr>
                        <tr>
                            <th>Port Tersedia</th>
                            <td id="port_tersedia">Default</td>
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
<!-- End of Main Content -- > 