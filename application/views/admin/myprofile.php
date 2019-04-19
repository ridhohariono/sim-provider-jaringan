<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-5 text-gray-800">Informasi Akun</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('adm_action') ?>"></div>
    <?= $this->session->flashdata('adm_gagal'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-800">
            <h6 class="m-0 font-weight-bold text-white">Informasi Akun</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2 col-sm-2">
                    <div class="fileinput-new thumbnail" style="width: 144px; height: 158px; margin-top: 14px; margin-left: 16px; background-color: #EBEBEB;">
                            <img src="<?= base_url() ?>assets/img/profile/<?= $user['image']; ?>" style="width: 142px; height: 148px; border-radius: 3px;" >
                    </div>
                </div>

                <div class="col-lg-1 col-sm-1">
                    &nbsp;
                </div>

                <div class="col-lg-8 col-sm-8 ">
                    <div>
                        <div style="margin-left: 20px;">                                        
                            <h3><?= $user['name'] ?></h3>
                            <hr />
                            <table>
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>:</td>
                                    <td>&nbsp;<?= $user['name'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>:</td>
                                    <td>&nbsp;<?= $user['email']; ?></td>
                                </tr>                                           
                                <tr>
                                    <td><strong>Hak Akses</strong></td>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td>:</td>
                                    <td>&nbsp;<?php if(($user['role_id']) == 1) { echo 'Admin'; } else { echo 'Teknisi'; }; ?></td>
                                </tr>                                           
                            </table>                                                                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-header py-3 bg-gray-800">
            <h6 class="m-0 font-weight-bold text-white">Ganti Password</h6>
        </div>
        <div class="card-body ">
            <div class="row">
            <?php 
                $url = base_url() . "assets/img/asiaa.png";
                $email = $this->session->userdata('email'); 
            ?>

            <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background: url(<?= $url ?>); background-position: center; background-size: 80%; background-repeat: no-repeat;"></div>
            <div class="col-lg-7">
                <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Ganti Password</h1>
                </div>
                <form class="user" method="post" action="<?= base_url() ?>admin/ganti_password/">
                    <div class="form-group">
                        <input type="password" name="psw_lama" class="form-control form-control-user" placeholder="Masukkan Password Lama">
                    </div>
                    <div class="form-group">
                        <input type="password" name="psw_baru" class="form-control form-control-user" placeholder="Masukkan Password Baru">
                    </div>
                    <div class="form-group">
                        <input type="password" name="psw_baru2" class="form-control form-control-user" placeholder="Masukkan Password Baru Lagi">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Ganti Password
                    </button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>                                                                                                                   