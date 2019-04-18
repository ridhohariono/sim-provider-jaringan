<!DOCTYPE html>
<html>
    <head>
        <title>Expense Report</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <style type="text/css">
            .table_tr1{
                background-color: rgb(224, 224, 224);
            }
            .table_tr1 td{
                padding: 7px 0px 7px 8px;
                font-weight: bold;
            }
            .table_tr2 td{
                padding: 7px 0px 7px 8px;
                border: 1px solid black;
            }            
        </style>
    </head>
    <body style="min-width: 100%; min-height: 100%; overflow: hidden; alignment-adjust: central;">
        <br />
        <div style="width: 100%; border-bottom: 2px solid black;">
            <table style="width: 100%; vertical-align: middle;">
                <tr>
                    <td style="width: 35px;">
                        <img style="width: 50px;height: 50px" src="<?= base_url() ?>assets/img/asiaa.png" alt="" class="img-circle"/>
                    </td>
                    <td>
                        <p style="margin-left: 10px; font: 14px lighter;">Sistem Informasi Validasi</p>
                    </td>                 
                </tr>
            </table>
        </div>
        <br />
        <div style="width: 100%;">
            <div style="width: 100%; background-color: rgb(224, 224, 224); padding: 1px 0px 5px 15px;">                
                <table style="width: 100%;">                    
                    <tr style="font-size: 20px;  text-align: center">
                        <td style="padding: 10px;">Daftar Denda Pelanggan</td>
                    </tr>                                    
                </table>
            </div>
            <br/>            
            <table style="width: 100%; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse;">
                <tr class="table_tr1">
                    <td style="border: 1px solid black;">No.</td>                    
                    <td style="border: 1px solid black;">Nama Pelanggan</td>                    
                    <td style="border: 1px solid black;">Paket</td>                    
                    <td style="border: 1px solid black;">Layanan</td>                    
                    <td style="border: 1px solid black;">Lama Nunggak</td>                    
                    <td style="border: 1px solid black;">Jumlah Denda</td>                                 
                </tr>  
                <?php
                $key = 1;
                $total_amount = 0;
                ?>
                <?php if (!empty($denda)): foreach ($denda as $row) : ?>

                        <tr class="table_tr2">
                            <td><?= $key ?></td>   
                            <td><?= $row['nm_pelanggan'] ?></td>
                            <td><?= $row['paket'] ?></td>
                            <td><?= $row['layanan'] ?></td>
                            <td><?= $row['lama_nunggak'] ?> Hari</td>
                            <td>Rp.<?= number_format($row['denda']); ?>,-</td>                                                     
                        </tr>
                        <?php
                        $key++;
                    endforeach;
                    ?>
                <?php else : ?>
                    <td colspan="3">
                        <strong>Tidak Ada Data Yang Ditampilkan!</strong>
                    </td>
                <?php endif; ?>
            </table>            
        </div>
    </body>
</html>