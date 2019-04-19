<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-5 text-gray-800">Laporan Denda Pelanggan</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Denda Pelanggan</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/make_denda_pdf'); ?>" method="post">
                <div class="form-row">

                    <div class="form-group col-md-5">
                        <label for="tgl_mulai">Tanggal Mulai</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                            </div>
                            <input type="text" class="form-control datePicker" id="tgl_mulai" name="tgl_mulai" placeholder="Periode Awal Denda">
                        </div>
                    </div>
                    
                    <div class="form-group col-md-5">
                        <label for="tgl_mulai">Tanggal Akhir</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                            </div>
                            <input type="text" class="form-control datePicker" id="tgl_akhir" name="tgl_akhir" placeholder="Periode Akhir Denda">
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">&nbsp;</label>
                        <div class="input-group mb-2">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                <i class="fas fa-print"></i>
                                </span>
                                <span class="text">Cetak</span>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        $(".datePicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: false,
        });
        $("#tgl_mulai").on('changeDate', function(selected) {
            var startDate = new Date(selected.date.valueOf());
            $("#tgl_akhir").datepicker('setStartDate', startDate);
            if ($("#tgl_mulai").val() > $("#tgl_akhir").val()) {
                $("#tgl_akhir").val($("#tgl_mulai").val());
            }
        });
    });
</script>
<!-- /.container-fluid -->