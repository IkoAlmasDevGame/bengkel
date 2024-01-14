<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Excel Keuangan</title>
    <?php 
        require_once("../tampilan/header.php");
        require_once("../../../database/koneksi.php");
        require_once("../tampilan/footer.php");

        $bulan_tes =array(
            '01'=>"Januari",
            '02'=>"Februari",
            '03'=>"Maret",
            '04'=>"April",
            '05'=>"Mei",
            '06'=>"Juni",
            '07'=>"Juli",
            '08'=>"Agustus",
            '09'=>"September",
            '10'=>"Oktober",
            '11'=>"November",
            '12'=>"Desember"
        );

        if($_SESSION["user_level"] == "admin"){

        }else{
            header("location:../tampilan/header.php?aksi=keluar");
        }

        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=data-laporan-".date('Y-m-d').".xls");  //File name extension was wrong
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);     
    ?>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="col-md-12 col-lg-12 py-5 bg-body-secondary mt-2 mt-lg-2">
        <div class="container-fluid py-5 bg-white">
            <div class="row">
                <h3 style="text-align:center;">
                    <?php if(!empty(htmlentities($_GET['cari']))){ ?>
                    Data Laporan Penjualan <?= $bulan_tes[htmlentities($_GET['bln'])];?>
                    <?= htmlentities($_GET['thn']);?>
                    <?php }elseif(!empty(htmlentities($_GET['hari']))){?>
                    Data Laporan Penjualan <?= htmlentities($_GET['tgl']);?>
                    <?php }else{?>
                    Data Laporan Penjualan <?= $bulan_tes[date('m')];?> <?= date('Y');?>
                    <?php }?>
                </h3>
                <table border="1" width="100%" cellpadding="3" cellspacing="4">
                    <thead>
                        <tr style="background:#DFF0D8;color:#333;">
                            <th> No</th>
                            <th> Nama Barang</th>
                            <th style="width:10%;"> Jumlah</th>
                            <th style="width:10%;"> Modal Beli</th>
                            <th style="width:10%;"> Modal Jual</th>
                            <th style="width:10%;"> Total</th>
                            <th> Kasir</th>
                            <th> Tanggal Input</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no=1; 
                        if(!empty(htmlentities($_GET['cari']))){
                            $periode = htmlentities($_GET['bln']).'-'.htmlentities($_GET['thn']);
                            $no=1; 
                            $jumlah = 0;
                            $bayar = 0;
                            $row = $lihat -> periode_jual($periode);
                        }elseif(!empty(htmlentities($_GET['hari']))){
                            $hari = htmlentities($_GET['tgl']);
                            $no=1; 
                            $jumlah = 0;
                            $bayar = 0;
                            $row = $lihat -> hari_jual($hari);
                        }else{
                            $row = $lihat -> jual();
                        }
                    ?>
                        <?php 
                    $bayar = 0;
                    $jumlah = 0;
                    $modal = 0;
                    foreach ($row as $isi) {
                        $bayar += $isi['total'];
                        $modal1 += $isi['harga_beli'];
                        $modal2 += $isi['harga_jual'];
                        $jumlah += $isi['jumlah'];
                        $keperluan += $isi['total'] - ($isi['harga_beli'] + $isi['harga_jual']);
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $isi['nama_barang'];?></td>
                            <td><?php echo $isi['jumlah'];?> </td>
                            <td>Rp.<?php echo number_format($isi['harga_beli']* $isi['jumlah']);?>,-</td>
                            <td>Rp.<?php echo number_format($isi['harga_jual']* $isi['jumlah']);?>,-</td>
                            <td>Rp.<?php echo number_format($isi['total']);?>,-</td>
                            <td><?php echo $_SESSION['username'];?></td>
                            <td><?php echo $isi['tanggal_input'];?></td>
                        </tr>

                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                        <tr>
                            <td colspan="1"></td>
                            <td><b>Total Terjual</b></td>
                            <td><b><?php echo $jumlah;?></b></td>
                            <td><b>Rp.<?php echo number_format($modal1);?>,-</b></td>
                            <td><b>Rp.<?php echo number_format($modal2);?>,-</b></td>
                            <td><b>Rp.<?php echo number_format($bayar);?>,-</b></td>
                            <td><b>Keuntungan</b></td>
                            <td><b>Rp.<?php echo number_format($keperluan);?>,-</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>