<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Admin</title>
    <?php 
        require_once("../tampilan/header.php");
        require_once("../../database/koneksi.php");
        $id = $_GET["id_user"];
        $sql = "SELECT account.*, profile.*, jadwal_konsumen.nama FROM account join profile on profile.nama = account.nama join jadwal_konsumen on jadwal_konsumen.nama = account.nama WHERE account.id_user = '$id'";
        $row = $koneksi -> query($sql);
        $hasil = $row->fetch_array();  
        ?>
</head>

<body>
    <?php 
        require_once("../tampilan/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12">
        <div class="p-5 mb-4 mb-lg-4 mt-2 mt-lg-2 container-fluid py-5 bg-info">
            <div class="col-md-6 col-lg-6 bg-light p-3 py-3 mx-auto mx-lg-auto">
                <div class="row">
                    <div class="d-flex align-items-end justify-content-end">
                        <img src="../../../assets/img/<?=$hasil["photo"]?>" alt="" class="mx-5" width="64">
                    </div>
                </div>
                <form action="act-edit.php" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id_user" value="<?=$hasil["id"]?>">
                    <input type="hidden" name="id" value="<?=$hasil["id"]?>">
                    <div class="form-group row align-items-center mt-4">
                        <div class="form-group row align-items-center mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="fas fa-envelope mx-1 mb-1 mb-lg-1" title="username / Email"></h3>
                                <input type="text" name="userEmail" value="<?=$hasil["userEmail"]?>"
                                    class="form-control" placeholder="masukkan username / Email ..." required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="fas fa-lock mx-1 mb-1 mb-lg-1" title="password"></h3>
                                <div class="input-group">
                                    <input type="password" name="password" value="<?=$hasil["password"]?>" id="passwd"
                                        class="form-control" placeholder="masukkan kata sandi ..." required>
                                    <div class="input-group-text">
                                        <input type="checkbox" onclick="showpw();">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="fas fa-user mx-1 mb-1 mb-lg-1" title="username"></h3>
                                <input type="text" name="username" value="<?=$hasil["username"]?>" class="form-control"
                                    placeholder="masukkan username ..." required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="fas fa-user-alt mx-1 mb-1 mb-lg-1" title="nama konsumen"></h3>
                                <input type="text" name="nama" value="<?=$hasil["nama"]?>" class="form-control"
                                    placeholder="masukkan nama anda ..." required readonly>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="fas fa-phone mx-1 mb-1 mb-lg-1" title="nomer telepon"></h3>
                                <input type="text" name="telp_kon" value="<?=$hasil["telp_kon"]?>" class="form-control"
                                    placeholder="masukkan nomer telepon ..." required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="fas fa-map-location mx-1 mb-1 mb-lg-1" title="alamat rumah"></h3>
                                <input type="text" name="alamat_kon" value="<?=$hasil["alamat_kon"]?>"
                                    class="form-control" placeholder="masukkan alamat rumah ..." required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="fas fa-file mx-1 mb-1 mb-lg-1" title="file photo"></h3>
                                <input type="file" name="photo" class="form-control" required>
                                <input type="hidden" name="photo" value="<?=$hasil["photo"]?>">
                            </div>
                        </div>
                        <div class="border border-top border-black mt-2 mt-lg-2"></div>
                        <div class="modal-footer mt-2 mt-lg-2">
                            <button type="submit" name="submited" class="btn btn-primary active">
                                <i class="fas fa-save"></i>
                                Simpan data
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
        require_once("../tampilan/footer.php");
    ?>