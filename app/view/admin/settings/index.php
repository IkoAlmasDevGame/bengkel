<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Admin</title>
    <?php 
        require_once("../tampilan/header.php");
        $id = $_GET["id"];
        $name = $_GET["username"];
        $hasil = $lihat->editAccount($id, $name);
    ?>
</head>

<body>
    <?php 
        require_once("../tampilan/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12">
        <div class="p-5 mb-4 mb-lg-4 mt-2 mt-lg-2 container-fluid py-5 bg-body-secondary">
            <div class="col-md-6 col-lg-6 bg-light p-3 py-3 mx-auto mx-lg-auto">
                <div class="row">
                    <div class="d-grid align-items-end justify-content-end">
                        <img src="../../../../assets/img/<?=$_SESSION["photo"]?>" alt="" class="mx-5" width="64">
                    </div>
                </div>
                <form action="act-edit.php" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?=$hasil["id"]?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col-md-8 col-lg-8">
                            <div class="form-group row align-items-center mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-envelope mx-1 mb-1 mb-lg-1"></h3>
                                    <div class="input-group">
                                        <input type="text" name="userEmail" class="form-control"
                                            placeholder="masukkan username / Email ..." value="<?=$hasil["userEmail"]?>"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-lock mx-1 mb-1 mb-lg-1"></h3>
                                    <div class="input-group">
                                        <input type="password" name="password" id="passwd" class="form-control"
                                            placeholder="masukkan kata sandi ..." value="<?=$hasil["password"]?>"
                                            required>
                                        <div class=" input-group-text">
                                            <input type="checkbox" onclick="showpw();">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-user-alt mx-1 mb-1 mb-lg-1"></h3>
                                    <div class="input-group">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="masukkan username ..." value="<?=$hasil["username"]?>"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-4" hidden>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-user-alt mx-1 mb-1 mb-lg-1"></h3>
                                    <div class="input-group">
                                        <input type="text" name="user_level" class="form-control"
                                            value="<?=$hasil["user_level"]?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center mt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fas fa-file-alt mx-1 mb-1 mb-lg-1"></h3>
                                    <div class="input-group">
                                        <input type="file" name="photo" class="form-control"
                                            placeholder="masukkan file photo ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-top border-black mt-2 mt-lg-2"></div>
                            <div class="modal-footer mt-2 mt-lg-2">
                                <button type="submit" name="submited" class="btn btn-primary active">
                                    <i class="fas fa-save"></i>
                                    Simpan data
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
        require_once("../tampilan/footer.php");
    ?>