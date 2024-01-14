<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Print</title>
    <?php 
        require_once("../tampilan/header.php");
        require_once("../tampilan/footer.php");
    ?>
</head>

<body>
    <script>
    window.print();
    </script>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <center>
                    <p><?php echo "Sistem Aplikasi Bengkel";?></p>
                    <p><?php echo "Jl. Pegangsaan Dua No.68, RT.8/RW.3, Pegangsaan Dua, Kec. Klp. Gading, Jkt Utara, Daerah Khusus Ibukota Jakarta 14250";?></p>
                    <p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
                </center>
                <table class="table table-bordered" style="width: 100%;">
                    <tr>
                        <td>No.</td>
                        <td>Barang</td>
                        <td>Jumlah</td>
                        <td>Total</td>
                    </tr>
                    <tbody>
                        <?php
                        $hasil = $lihat -> penjualan();
                        $no=1; 
                        foreach($hasil as $isi){
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $isi['nama_barang'];?></td>
                            <td><?php echo $isi['jumlah'];?></td>
                            <?php 
                            if(isset($_GET["discount"])){
                                if(!empty($_GET["discount"] == "0" || $_GET["discount"] == "0.1" || 
                                $_GET["discount"] == "0.15" || $_GET["discount"] == "0.15" || $_GET["discount"] == "0.2" || 
                                $_GET["discount"] == "0.25" || $_GET["discount"] == "0.5")){
                                    $tb = $isi["total"] - ($isi["total"] * htmlentities($_GET["discount"]));
                            ?>
                            <td><?php echo number_format($tb);?></td>
                            <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php 
                        $no++; 
                            } 
                        ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php 
                        $hasil = $koneksi->query("SELECT SUM(total) as tb FROM nota");
                        $row = $hasil->fetch_array();
                        if(isset($_GET["discount"])){
                            if(!empty($_GET["discount"] == "0" || $_GET["discount"] == "0.1" || 
                            $_GET["discount"] == "0.15" || $_GET["discount"] == "0.15" || $_GET["discount"] == "0.2" || 
                            $_GET["discount"] == "0.25" || $_GET["discount"] == "0.5")){
                                $tb = $row["tb"] - ($row["tb"] * htmlentities($_GET["discount"]));
                            }
                        }
                    ?>
                    Total :
                    Rp.<?php echo number_format(htmlentities($tb));?>,-
                    <br />
                    Discount : <?php echo htmlentities($_GET['discount']);?>,-
                    <br />
                    Bayar : Rp.<?php echo number_format(htmlentities($_GET['bayar']));?>,-
                </div>
                <br />
                <center>
                    <p class="text-center">Terima kasih sudah service di bengkel kami !</p>
                </center>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>

</html>