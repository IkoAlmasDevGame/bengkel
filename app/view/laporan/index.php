<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan Pelanggan</title>
    <?php 
        require_once("../tampilan/header.php");
    ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <?php 
        require_once("../tampilan/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12 py-5 bg-body-secondary mt-2 mt-lg-2">
        <div class="container-fluid py-5 bg-white">
            <div class="row form-group row d-flex justify-content-center align-items-center">
                <div class="card col-sm-6">
                    <div class="card-header">
                        <h3 class="card-title">Pembayaran Reservasi - <?php echo ucfirst($_SESSION["nama"]) ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md table-responsive-lg">
                            <table class="table table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Konsumen</th>
                                        <th>History Pembayaran</th>
                                        <th>Tanggal Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $hasil = $koneksi->query("SELECT nota_pelanggan.*, account.nama from nota_pelanggan
                                        inner join account on nota_pelanggan.nama = account.nama where nota_pelanggan.nama='$_GET[nama]'");
                                        foreach($hasil as $data){
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data["nama"]; ?></td>
                                        <td>
                                            <?php echo "Rp. ".number_format($data["total"]) ?>
                                        </td>
                                        <td>
                                            <?php echo $data["tanggal_input"] ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                    $total += $data["total"];
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <th colspan="2" class="bg-success active text-white">Total</th>
                                    <th><?php echo "Rp. ".number_format($total) ?></th>
                                    <th colspan="1" class="bg-secondary active"></th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require_once("../tampilan/footer.php");
    ?>