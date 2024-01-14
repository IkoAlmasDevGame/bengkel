<?php 

if($_SESSION["user_level"] == ""){
    header("location:../index.php");
    exit();
}

?>

<?php 

if($_SESSION["user_level"] == "konsumen"){
?>
<div class="col-md-12 col-lg-12">
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a href="../Dshboard/index.php" class="navbar-brand">Sahabat Bengkel</a>
            <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarSupported"
                data-bs-toggle="collapse" data-bs-target="#navbarSupported">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupported">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-2">
                    <li class="nav-item">
                        <a href="../Dshboard/index.php" aria-current="page" class="nav-link active">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="" type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">Reservasi</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="../reservasi/index.php?page=reservasi&nama=<?=$_SESSION["nama"]?>"
                                        class="dropdown-item">Reservasi</a>
                                </li>
                                <li>
                                    <a href="../reservasi/index.php?page=view&nama=<?=$_SESSION["nama"]?>" class="
                                        dropdown-item">Lihat Reservasi</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="../laporan/index.php?nama=<?=$_SESSION['nama']?>" class="nav-link active">History
                            Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="" type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Settings
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="../settings/index.php?id_user=<?=$_SESSION["id_user"]?>&nama=<?=$_SESSION["nama"]?>"
                                        class="dropdown-item">Profile Account</a></li>
                                <li><a href="../tampilan/header.php?aksi=keluar"
                                        onclick="javascript:return confirm('Apakah anda ingin keluar dari website ini ?')"
                                        class="dropdown-item">Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <form method="get" enctype="multipart/form-data">
                <div class="ms-auto mb-2 mb-lg-2">
                    <div class="row mx-1">
                        <div class="rounded-2">
                            <?=ucfirst($_SESSION["nama"]);?>
                            <img id="profileImage" src="../../../assets/img/<?=$_SESSION["photo"]?>" alt="Profile Image"
                                width="36">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</div>
<script type="text/javascript">
document.getElementById('profileImage').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('profileImage').src = e.target.result;
        // Kirim file gambar ke server menggunakan AJAX untuk diunggah dan disimpan
        // Anda dapat menggunakan jQuery atau XMLHttpRequest untuk mengirimkan data ke server
        // Setelah gambar diunggah dan disimpan, Anda dapat memperbarui gambar profil di database atau file lainnya
    }

    reader.readAsDataURL(file);
});
</script>
<?php
}else{
    header("location:../index.php");
    exit();
}

?>