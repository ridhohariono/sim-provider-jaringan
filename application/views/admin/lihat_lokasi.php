<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lihat Lokasi</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>
    <?php echo $map['js'];?>

    <!-- DataTales Example -->
    <div class="row">
        <div class="col">
            <a type="button" href="<?= base_url('admin/lokasi') ?>" class="btn btn-info float-right mb-1"><i class="fa fa-arrow-left"></i>
                Lihat data lokasi
            </a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Lokasi</h6>
        </div>
        <div class="card-body">
            <?php echo $map['html'];?>
        </div>

    </div>
</div>
    <!-- /.container-fluid -->
            <div id="map-canvas" class="map-canvas"></div>
            
                                                                                                                  