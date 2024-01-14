<?php 
require_once("../tampilan/header.php");
require_once("../tampilan/navbar.php");
$info = mysqli_fetch_array($koneksi->query("SELECT * from sistem"));
?>

<div class="container-fluid mb-2 mb-lg-2 py-5 mt-4 mt-lg-4 bg-body-secondary">
    <h3 class="mt-2 mt-lg-2 fs-4 fw-semibold bg-white py-5">Selamat Datang Di Sahabat Bengkel,
        <?=ucfirst($_SESSION["nama"])?>
    </h3>
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="card bg-transparent border-transparent border-0">
                <div class="card-header border-transparent border-0">
                    <p class="fs-5">Informasi : <br></p>
                    <?php echo $info["informasi"] ?>
                </div>
                <div class="card-body">
                    <?php echo $info["beranda"] ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
require_once("../tampilan/footer.php");
?>