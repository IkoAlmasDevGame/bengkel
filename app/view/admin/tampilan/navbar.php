<?php 
if($_SESSION["user_level"] == ""){
    header("location:../index.php");
    exit();
}
?>

<?php 
if($_SESSION["user_level"] == "admin"){
    ?>
<div class="col-md-12 col-lg-12">
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a href="../dashboard/index.php" class="navbar-brand">Sahabat Bengkel</a>
            <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarSupported"
                data-bs-toggle="collapse" data-bs-target="#navbarSupported">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupported">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-2">
                    <li class="nav-item">
                        <a href="../dashboard/index.php" aria-current="page" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="" type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">Laporan</a>
                            <ul class="dropdown-menu">
                                <li><a href="../laporan/laporan.php" class="dropdown-item">Laporan Keuangan</a></li>
                                <li><a href="../laporan/index.php" class="dropdown-item">Pembayaran Reservasi</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="" type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">Penjualan Barang</a>
                            <ul class="dropdown-menu">
                                <li><a href="../jual/index.php" class="dropdown-item">Kasir Penjualan Produk</a></li>
                                <li><a href="../jual/voucher.php" class="dropdown-item">Voucher</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="" type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">Reservasi</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="../reservasi/index.php?page=view" class="dropdown-item">Lihat Reservasi</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="" type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">Produk</a>
                            <ul class="dropdown-menu">
                                <li><a href="../produk/barang.php" class="dropdown-item">Data Barang</a></li>
                                <li><a href="../produk/kategori.php" class="dropdown-item">Data Kategori</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="" type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Settings
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="../settings/index.php?username=<?=$_SESSION["username"]?>&id=<?=$_SESSION["id"]?>"
                                        class="dropdown-item">Profile Account</a></li>
                                <li><a href="../settings/admin.php?id=<?=$_SESSION["id"]?>" class="dropdown-item">Sistem
                                        Admin</a></li>
                                <li><a href="../tampilan/header.php?aksi=keluar"
                                        onclick="javascript:return confirm('Apakah anda ingin keluar dari website ini ?')"
                                        class="dropdown-item">Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <form method="get" enctype="multipart/form-data"
                    onload="this.Image(img.src='../../../../assets/img/<?=$_SESSION['photo']?>')">
                    <div class="ms-auto mb-2 mb-lg-2">
                        <div class="row mx-1">
                            <div class="rounded-2">
                                <?=ucfirst($_SESSION["username"]);?>
                                <img src="../../../../assets/img/<?=$_SESSION["photo"]?>" alt="" class="mx-3"
                                    width="36">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</div>
<?php
}else{
    header("location:../index.php");
    exit();
}
?>