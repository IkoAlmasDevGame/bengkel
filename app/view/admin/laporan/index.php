<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan Pelanggan</title>
    <?php 
        require_once("../tampilan/header.php");
        require_once("../../../database/koneksi.php");
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
                        <h3 class="card-title">Pembayaran Reservasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md table-responsive-lg">
                            <table class="table table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Konsumen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $hasil = $koneksi->query("SELECT * from profile order by nama asc");
                                        foreach($hasil as $data){
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data["nama"]; ?></td>
                                        <td>
                                            <a href="" data-bs-target="#laporan<?=$data['nama']?>"
                                                data-bs-toggle="modal" class="btn btn-danger active">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                            <div class="modal fade" id="laporan<?=$data['nama']?>" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Entri Laporan Pelanggan</h3>
                                                            <button type="button" data-bs-dismiss="modal"
                                                                class="btn btn-default btn-outline-dark">
                                                                <i class="fas fa-close"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="act-tambah.php" method="post"
                                                                enctype="multipart/form-data">
                                                                <table class="table table-striped">
                                                                    <tr>
                                                                        <td>Nama Konsumen</td>
                                                                        <td>
                                                                            <input type="text" name="nama" id="nama"
                                                                                class="form-control"
                                                                                value="<?=$data["nama"]?>">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Pembayaran</td>
                                                                        <td>
                                                                            <input type="number" name="total" id="total"
                                                                                class="form-control"
                                                                                placeholder="masukkan data total pembayaran reservasi">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal Pembayaran</td>
                                                                        <td>
                                                                            <input type="date" name="tanggal_input"
                                                                                id="tanggal_input" class="form-control">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="tambah">
                                                                        <i class="fas fa-save"></i>
                                                                    </button>
                                                                    <button type="button" data-bs-dismiss="modal"
                                                                        class="btn btn-default btn-outline-dark">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
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