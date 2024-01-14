<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Document</title>
    <?php 
        require_once("../tampilan/header.php");
        require_once("../tampilan/footer.php");
        $nama = htmlspecialchars($_GET["nama"]);
        $tanggal = htmlspecialchars($_GET["tanggal_input"]);
        $hasil = $koneksi->query("SELECT * FROM jadwal_konsumen WHERE nama = '$nama' and tanggal_input = '$tanggal'");
    ?>
</head>

<body>
    <script>
    window.print();
    </script>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
                <table class="table table-bordered" style="width: 100%;">
                    <tr>
                        <th>
                            <center>
                                <p><?php echo "Sistem Aplikasi Bengkel";?></p>
                                <p><?php echo "Jl. Pegangsaan Dua No.68, RT.8/RW.3, Pegangsaan Dua, Kec. Klp. Gading, Jkt Utara, Daerah Khusus Ibukota Jakarta 14250";?></p>
                            </center>
                        </th>
                    </tr>
                    <?php 
                            foreach($hasil as $isi){
                        ?>
                    <tr>
                        <th class="fs-1">
                            <center>
                                <?php echo $nama; ?>
                                <br>
                                <?=$isi["tanggal_input"] ?>
                            </center>
                        </th>
                    </tr>
                    <?php
                            }
                        ?>
                    <tfoot>
                        <th>
                            <center>
                                <p><?php echo "Terima kasih sudah reservasi di sistem bengkel kami !"; ?></p>
                            </center>
                        </th>
                    </tfoot>
                </table>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>

</html>