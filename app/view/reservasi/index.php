<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <?php 
        require_once("../tampilan/header.php");
        require_once("../../database/koneksi.php");
    ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <?php 
        require_once("../tampilan/navbar.php");
    ?>
    <div class="col-lg-12 col-xl-12 bg-body-secondary mt-2 mt-lg-2">
        <div class="container-fluid">
            <?php 
                    if(isset($_GET["page"])){
                        if($_GET["page"] == "reservasi"){
                ?>
            <div class="d-flex justify-content-center align-items-center g-0 gap-0 flex-shrink-0">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title display-6">Reservasi</h3>
                            <h3 class="card-title fs-5 fw-semibold">Sistem Aplikasi Bengkel</h3>
                            <p class="text-end">
                                <a href="" type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#tambahreservasi" aria-controls="tambahreservasi">
                                    <i class="fas fa-calendar-times"></i>
                                    Reservasi Tanggal
                                </a>
                                <a href="index.php?page=reservasi&nama=<?=$_SESSION['nama']?>" class="btn btn-primary">
                                    <i class="fas fa-refresh"></i>
                                </a>
                            </p>
                            <div class="modal fade" id="tambahreservasi" tabindex="-1" aria-hidden="true">
                                <div class="col-md-9 col-lg-9 mx-auto py-5 py-lg-5">
                                    <div class="container-fluid">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><i class="fas fa-calendar-times"></i>
                                                        Reservasi
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="action/act-tambah.php" method="post">
                                                        <table class="table table-striped table-bordered">
                                                            <tr>
                                                                <td>Nama Konsumen</td>
                                                                <td>
                                                                    <input type="text" name="nama" class="form-control"
                                                                        value="<?=$_SESSION['nama']?>" require>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>PLAT NOMOR</td>
                                                                <td>
                                                                    <input type="text" name="plat_no"
                                                                        class="form-control" require>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>MERK MOBIL</td>
                                                                <td>
                                                                    <input type="text" name="merk_mobil"
                                                                        class="form-control" require>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>RESERVASI</td>
                                                                <td>
                                                                    <select name="reservasi" class="form-control"
                                                                        require>
                                                                        <option value="">Pilih Reservasi</option>
                                                                        <option value="Tune Up">Tune Up</option>
                                                                        <option value="Spooring Balancing">Spooring
                                                                            Balancing</option>
                                                                        <option value="Servis Rem">Servis Rem</option>
                                                                        <option value="Jasa Kuras Mesin">Jasa Kuras
                                                                            Mesin</option>
                                                                        <option value="Repair Body">Repair Body</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Voucher</td>
                                                                <td>
                                                                    <select name="voucher" class="form-control" require>
                                                                        <option value="">Pilih
                                                                            Voucher
                                                                        </option>
                                                                        <?php 
                                                                                            $hasil = $koneksi->query("SELECT * FROM voucher");
                                                                                            $hasil->fetch_array();
                                                                                            foreach ($hasil as $isi) {
                                                                                                ?>
                                                                        <option
                                                                            value="<?php echo $isi["nama_voucher"] ?>">
                                                                            <?php echo $isi["nama_voucher"] ?>
                                                                        </option>
                                                                        <?php
                                                                                            }
                                                                                            ?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Input</td>
                                                                <td>
                                                                    <input type="datetime-local" name="tanggal_input"
                                                                        class="form-control" require>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="submited"
                                                                class="btn btn-primary">
                                                                <i class="fas fa-save"></i>
                                                                Insert Data</button>
                                                            <button type="button"
                                                                class="btn btn-light active text-black"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg flex-shrink-0 g-0 gap-0">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>Nama Konsumen</th>
                                            <th>Tanggal Input</th>
                                            <th>PLAT NOMOR</th>
                                            <th>MERK MOBIL</th>
                                            <th>Reservasi</th>
                                            <th>Voucher</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $nama = $_GET["nama"];
                                            $hasil = $c -> reservasi_konsumen($nama);                                            

                                            foreach ($hasil as $isi) {
                                            ?>
                                        <tr>
                                            <td><?php echo $isi["nama"]; ?></td>
                                            <td><?php echo $isi["tanggal_input"]; ?></td>
                                            <td><?php echo $isi["plat_no"]; ?></td>
                                            <td><?php echo $isi["merk_mobil"]; ?></td>
                                            <td><?php echo $isi["reservasi"]; ?></td>
                                            <td><?php echo $isi["nama_voucher"]; ?></td>
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
            <?php
                        }else if($_GET["page"] == "view"){
                ?>
            <div class="d-flex justify-content-center align-items-center g-0 gap-0 flex-shrink-0">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title display-6">Lihat Reservasi</h3>
                            <h3 class="card-title fs-5 fw-semibold">Sistem Aplikasi Bengkel</h3>
                            <p class="text-end">
                                <a href="index.php?page=reservasi&nama=<?=$_SESSION['nama']?>" class="btn btn-primary">
                                    <i class="fas fa-refresh"></i>
                                </a>
                            </p>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg flex-shrink-0 g-0 gap-0">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>Nama Konsumen</th>
                                            <th>Tanggal Input</th>
                                            <th>PLAT NOMOR</th>
                                            <th>MERK MOBIL</th>
                                            <th>Reservasi</th>
                                            <th>Voucher</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $nama = $_GET["nama"];
                                            $hasil = $c -> reservasi_konsumen($nama);                                            

                                            foreach ($hasil as $isi) {
                                            ?>
                                        <tr>
                                            <td><?php echo $isi["nama"]; ?></td>
                                            <td><?php echo $isi["tanggal_input"]; ?></td>
                                            <td><?php echo $isi["plat_no"]; ?></td>
                                            <td><?php echo $isi["merk_mobil"]; ?></td>
                                            <td><?php echo $isi["reservasi"]; ?></td>
                                            <td><?php echo $isi["nama_voucher"]; ?></td>
                                            <td>
                                                <a href="print.php?nama=<?=$isi['nama']?>&tanggal_input=<?=$isi["tanggal_input"]?>"
                                                    class="btn btn-primary active">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                                <button type="button" class="btn btn-warning active"
                                                    data-bs-target="#edit<?=$isi["id"]?>" data-bs-toggle="modal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <div class="modal fade" id="edit<?=$isi["id"]?>" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="col-md-9 col-lg-9 mx-auto py-5 py-lg-5">
                                                        <div class="container-fluid">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"><i
                                                                                class="fas fa-calendar-times"></i>
                                                                            Reservasi
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="action/act-edit.php"
                                                                            method="post">
                                                                            <input type="text" hidden name="id"
                                                                                class="form-control"
                                                                                value="<?=$isi['id']?>" require>
                                                                            <table
                                                                                class="table table-striped table-bordered">
                                                                                <tr>
                                                                                    <td>Nama Konsumen</td>
                                                                                    <td>
                                                                                        <input type="text" name="nama"
                                                                                            class="form-control"
                                                                                            value="<?=$isi['nama']?>"
                                                                                            require>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>PLAT NOMOR</td>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="plat_no"
                                                                                            class="form-control"
                                                                                            value="<?=$isi['plat_no']?>"
                                                                                            require>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>MERK MOBIL</td>
                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="merk_mobil"
                                                                                            class="form-control"
                                                                                            value="<?=$isi['merk_mobil']?>"
                                                                                            require>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>RESERVASI</td>
                                                                                    <td>
                                                                                        <select name="reservasi"
                                                                                            class="form-control"
                                                                                            require>
                                                                                            <option
                                                                                                value="<?=$isi["reservasi"]?>">
                                                                                                <?=$isi["reservasi"]?>
                                                                                            </option>
                                                                                            <option value="">Pilih
                                                                                                Reservasi</option>
                                                                                            <option value="Tune Up">
                                                                                                Tune
                                                                                                Up</option>
                                                                                            <option
                                                                                                value="Spooring Balancing">
                                                                                                Spooring Balancing
                                                                                            </option>
                                                                                            <option value="Servis Rem">
                                                                                                Servis Rem</option>
                                                                                            <option
                                                                                                value="Jasa Kuras Mesin">
                                                                                                Jasa Kuras Mesin
                                                                                            </option>
                                                                                            <option value="Repair Body">
                                                                                                Repair Body</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Voucher</td>
                                                                                    <td>
                                                                                        <select name="nama_voucher"
                                                                                            class="form-control"
                                                                                            require>
                                                                                            <option value="">Pilih
                                                                                                Voucher
                                                                                            </option>
                                                                                            <option
                                                                                                style="background-color: green; color:white;">
                                                                                                <?php echo $isi["nama_voucher"] ?>
                                                                                            </option>
                                                                                            <?php 
                                                                                            $hasil = $koneksi->query("SELECT * FROM voucher");
                                                                                            $hasil->fetch_array();
                                                                                            foreach ($hasil as $isi) {
                                                                                                ?>
                                                                                            <option
                                                                                                value="<?php echo $isi["nama_voucher"] ?>">
                                                                                                <?php echo $isi["nama_voucher"] ?>
                                                                                            </option>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Tanggal Input</td>
                                                                                    <td>
                                                                                        <input type="datetime-local"
                                                                                            name="tanggal_input"
                                                                                            class="form-control"
                                                                                            require>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" name="submited"
                                                                                    class="btn btn-primary">
                                                                                    <i class="fas fa-save"></i>
                                                                                    Insert Data</button>
                                                                                <button type="button"
                                                                                    class="btn btn-light active text-black"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
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
            <?php
                        }
                    }else{
                        echo "<span class='text-center fs-3'>Error 404</span>";
                    }
                ?>
        </div>
    </div>
    <?php 
        require_once("../tampilan/footer.php");
    ?>