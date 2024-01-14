<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Barang</title>
    <?php 
        require_once("../tampilan/header.php");
        require_once("../../../database/koneksi.php");
        // $hasil2 = $lihat -> GetVoucher();
        // $hasil3 = $lihat -> GetVoucher2();
    ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
    @import url('https://fonts.cdnfonts.com/css/3-of-9-barcode');

    .barcode {
        font-family: '3 of 9 Barcode', sans-serif;
    }
    </style>
</head>

<body>
    <?php 
        require_once("../tampilan/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12 py-5 bg-body-tertiary mt-2 mt-lg-2">
        <div class="container-fluid p-5 mb-2 mb-lg-2 bg-body-secondary">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="card card-primary mb-3">
                                <div class="card-header bg-primary text-white">
                                    <h5><i class="fa fa-search"></i> Cari Barang</h5>
                                </div>
                                <div class="card-body">
                                    <input type="text" id="cari" class="form-control" name="cari"
                                        placeholder="Masukan : Merk / nama kategori / Nama Barang  [ENTER]">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            <div class="card card-primary mb-3">
                                <div class="card-header bg-primary text-white">
                                    <h5><i class="fa fa-list"></i> Hasil Pencarian</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive-md table-responsive-lg">
                                        <div id="hasil_cari"></div>
                                        <div id="tunggu"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header bg-primary text-white">
                                <h5><i class="fa fa-shopping-cart"></i> KASIR
                                    <div class="col-md-offset-0 pt-3 pt-lg-3">
                                        <a class="btn btn-danger"
                                            onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');"
                                            href="action/act-hapus-jual.php"> <b>RESET KERANJANG</b></a>
                                    </div>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md table-responsive-lg" id="keranjang">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td><b>Tanggal</b></td>
                                            <td><input type="text" readonly="readonly" class="form-control"
                                                    value="<?php echo date("j F Y, G:i"); ?>" name="tgl"></td>
                                        </tr>
                                    </table>
                                    <table class="table table-striped tabel-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th style="width:8%; min-width:8%;">No</th>
                                                <th>Nama Barang</th>
                                                <!-- <th>Gambar Barang</th> -->
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $hasil = $lihat -> penjualan();
                                            $total_bayar = 0;
                                            $no = 1;
                                            foreach ($hasil as $isi) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $isi['nama_barang']; ?></td>
                                                <!-- <td><img src="../../../../assets/inventory/<?php echo $isi['photo']; ?>"
                                                        alt="" width="32"></td> -->
                                                <form action="action/act-edit-item.php" method="post">
                                                    <td>
                                                        <input type="number" name="jumlah"
                                                            value="<?php echo $isi['jumlah']; ?>" class="form-control">
                                                        <input type="hidden" name="id" value="<?php echo $isi['id']; ?>"
                                                            class="form-control">
                                                        <input type="hidden" name="id_barang"
                                                            value="<?php echo $isi['id_barang']; ?>"
                                                            class="form-control">
                                                    </td>
                                                    <?php 
                                                        echo "<td>";
                                                        if(isset($_POST["discount"])){
                                                            if($_POST["discount"] == "0" || $_POST["discount"]){
                                                            echo "Rp. ".number_format($isi['total'] - ($isi['total'] * $_POST["discount"])).",-";
                                                        ?>
                                                    <?php
                                                        }
                                                    }else{
                                                        echo "Rp. ".number_format($isi['total']).",-";
                                                    }
                                                    echo "</td>";
                                                    ?>
                                                    <td>
                                                        <button type="submit" class="btn btn-warning">Update</button>
                                                </form>
                                                <a href="action/act-hapus-item.php?id=<?= $isi['id'] ?>&brg=<?= $isi['id_barang'] ?>"
                                                    class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            $total_bayar += $isi['total'];
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div id="kasirnya">
                                        <table class="table table-striped">
                                            <?php 
                                                if (!empty($_GET['nota'] =="yes")){   
                                                    $bayar = $_POST['bayar'];
                                                    $total = $_POST['total'];

                                                    if(!empty($bayar)){
                                                        $hitung = $bayar - $total; 
                                                            if($bayar >= $total){
                                                            $id_barang = $_POST['id_barang'];
                                                            $jumlah = $_POST['jumlah'];
                                                            $total_bayar = $_POST['total1'];
                                                            $tgl_input = $_POST['tgl_input'];
                                                            $periode = $_POST['periode'];
                                                            $jumlah_beli = count($id_barang);

                                                            for($x = 0; $x < $jumlah_beli; $x++){
                                                                $row_barang = "SELECT * FROM barang WHERE id_barang ='$id_barang[$x]'";
                                                                $row_data = $koneksi->query($row_barang);

                                                                $sql = "INSERT INTO nota SET id_barang='$id_barang[$x]', jumlah='$jumlah[$x]', total='$total_bayar[$x]', tanggal_input='$tgl_input[$x]', periode='$periode[$x]'";
                                                                    
                                                                $row = $koneksi->query($sql);
                                                                $koneksi->query("INSERT INTO nota_backup SET id_barang='$id_barang[$x]', jumlah='$jumlah[$x]', total='$total_bayar[$x]', tanggal_input='$tgl_input[$x]', periode='$periode[$x]'");
                                                                    
                                                                $hsl = $row_data->fetch_array();
                                                                $total_stok = $hsl['stok'] - $jumlah[$x];
                                                                    
                                                                $editStok = "UPDATE barang SET stok='$total_stok' WHERE id_barang='$id_barang[$x]'";
                                                                $koneksi->query($editStok);
                                                            }
                                                            echo "Belanjaan Berhasil Di Bayar !";
                                                        }else{
                                                            echo "Uang Kurang ! Rp.".$hitung;
                                                        }
                                                        $hasil = $lihat -> jumlah_nota();
                                                    }
                                                }       
                                            ?>
                                            <form action="index.php?nota=yes#kasirnya" method="post">
                                                <tbody>
                                                    <?php
                                                    foreach ($hasil as $isi) {
                                                    ?>
                                                    <input type="hidden" name="id_barang[]"
                                                        value="<?php echo $isi['id_barang']; ?>">
                                                    <input type="hidden" name="jumlah[]"
                                                        value="<?php echo $isi['jumlah']; ?>">
                                                    <input type="hidden" name="total1[]"
                                                        value="<?php echo $isi['total']; ?>">
                                                    <input type="hidden" name="tgl_input[]"
                                                        value="<?php echo $isi['tanggal_input']; ?>">
                                                    <input type="hidden" name="periode[]"
                                                        value="<?php echo date('m-Y'); ?>">
                                                    <?php
                                                        $no++;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td>Total Semua </td>
                                                        <td>
                                                            <?php 
                                                            if(!empty($_GET['nota'] == "yes")){
                                                                if(isset($_POST["discount"])){
                                                                    if($_POST["discount"] == "0" || $_POST["discount"]){
                                                            ?>
                                                            <input type="text" class="form-control" name="total" value="<?php 
                                                            $hasil = $lihat -> jumlah(); echo $hasil['bayar'] - 
                                                                ($hasil['bayar'] * $_POST["discount"]); ?>">
                                                            <?php
                                                                }
                                                            }else{
                                                                ?>
                                                            <input type="text" class="form-control" name="total"
                                                                value="<?php $hasil = $lihat -> jumlah(); echo $hasil['bayar']; ?>">
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                        </td>
                                                        <td>Bayar </td>
                                                        <td><input type="text" class="form-control" name="bayar"
                                                                value="<?= $bayar; ?>"></td>
                                                        <td>
                                                            <!-- <button class="btn btn-success" type="submit"><i
                                                                    class="fa fa-shopping-cart"></i>Bayar</button> -->
                                                            <a href="action/act-hapus.php" class="btn btn-danger">Reset
                                                                Nota</a>
                                                        </td>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                </tbody>
                                                <tr>
                                                    <?php 
                                                    if(!empty($_GET['nota'] == "yes")){
                                                ?>
                                                    <td><b>Discount Voucher</b></td>
                                                    <td>
                                                        <select name="discount" onchange="this.form.submit();"
                                                            class="form-control" require>
                                                            <option value="">Pilih
                                                                Voucher
                                                            </option>
                                                            <?php 
                                                                $hasil = $koneksi->query("SELECT * FROM voucher");
                                                                $hasil->fetch_array();
                                                                foreach ($hasil as $isi) {
                                                                ?>
                                                            <option value="<?php echo $isi["discount"] ?>">
                                                                <?php echo $isi["nama_voucher"] ?>
                                                            </option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <!-- <td>Kembali</td>
                                                    <td><input type="text" class="form-control" name="kembali"
                                                            value="<?= $hitung; ?>">  -->
                                                    </td>
                                                    <td colspan="2"></td>
                                                    <td>
                                                        <a href="../laporan/print.php?bayar=<?=$bayar;?>&discount=<?=$_POST["discount"];?>"
                                                            class="btn btn-secondary">
                                                            <i class="fa fa-print"></i>
                                                            Print Untuk Bukti Pembayaran
                                                        </a>
                                                    </td>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            </form>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php 
        require_once("../tampilan/footer.php");
    ?>