<?php 
require_once("../tampilan/header.php");
require_once("../tampilan/navbar.php");

$jumlah_barang = $lihat -> rowBarang();
$jumlah_kategori = $lihat -> rowKategori();

$sql = "select * from barang where stok <= 3";
$row = $koneksi->query($sql);
$r = $row->num_rows;
if($r > 0){
    echo "
    <div class='alert alert-warning'><span class='fas fa-info'></span> Ada <span style='color:red'>$r</span>
barang yang Stok tersisa sudah kurang dari 3 items. silahkan isi stock barang lagi !!
<a href='../produk/barang.php?stok=yes' class='nav-link active'>Cek Barang
    <i class='fas fa-angle-double-right'></i></a></div>
";
}
?>

<div class="container-fluid py-4 flex-shrink-0 overflow-x-scroll g-3 gap-3">
    <div class="p-5 mb-4 mb-lg-4 container-fluid bg-dark rounded-3">
        <div class="container-md container-lg rounded-1">
            <h4 class="display-6 fw-semibold text-start text-white">
                Selamat Datang Di Sahabat Bengkel,
                <small class="text-white text-start fw-semibold">
                    <?php echo ucfirst(ucwords($_SESSION["username"])) ?>
                </small>
            </h4>
        </div>
        <div class="d-flex align-items-center justify-content-around flex-wrap">
            <div class="col-md-3 col-lg-3">
                <div class="containter-fluid p-5 mb-3 mb-lg-3">
                    <div class="conatainer-md container-lg">
                        <div class="card bg-light active">
                            <div class="card-header">
                                <h5 class="card-title fw-lighter text-center"><i class="fas fa-briefcase"></i>
                                    Jumlah Data Barang</h5>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center card-comment pb-2 pb-lg-2">
                                    <?php echo number_format($jumlah_barang["jml"]); ?>
                                </h3>
                                <div class="card-footer d-flex justify-content-end align-items-end">
                                    <a href="../produk/barang.php" class="btn btn-danger active">
                                        <i class="fas fa-angle-double-right"></i>
                                        Cek Barang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="containter-fluid p-5 mb-3 mb-lg-3">
                    <div class="conatainer-md container-lg">
                        <div class="card bg-light active">
                            <div class="card-header">
                                <h5 class="card-title fw-lighter text-center">
                                    <i class="fas fa-cubes"></i>
                                    Jumlah Data Kategori
                                </h5>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center card-comment pb-2 pb-lg-2">
                                    <?php echo number_format($jumlah_kategori["jml"]); ?>
                                </h3>
                                <div class="card-footer d-flex justify-content-end align-items-end">
                                    <a href="../produk/kategori.php" class="btn btn-danger active">
                                        <i class="fas fa-angle-double-right"></i>
                                        Cek Kategori
                                    </a>
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