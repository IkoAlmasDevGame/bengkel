<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Admin</title>
    <?php 
        require_once("../tampilan/header.php");
        $id = $_GET["id"];
        $hasil = $koneksi->query("SELECT * from sistem where id = '$id'");
        $data = mysqli_fetch_array($hasil);

            if(isset($_POST["ubah"])){
                $id = htmlspecialchars($_POST["id"]);
                $inf = htmlspecialchars($_POST["informasi"]);
                $ben = htmlspecialchars($_POST["beranda"]);

                $sql = "UPDATE sistem SET informasi='$inf', beranda='$ben' where id='$id'";
                $query = $koneksi->query($sql);
                if($query){
                    header("location:../dashboard/index.php");
            }else{
                    die("error connection insert : ".mysqli_connect_errno());
                }
            }
    ?>
</head>

<body>
    <?php 
        require_once("../tampilan/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12">
        <div class="p-5 mb-4 mb-lg-4 mt-2 mt-lg-2 container-fluid py-5 bg-body-secondary">
            <div class="col-md-6 col-lg-6 bg-light p-3 py-3 mx-auto mx-lg-auto">
                <p class="fs-2 text-center">SISTEM INFORMASI - SERVICE BENGKEL MOTOR</p>
                <div class="row">
                    <form action="" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-md-8 col-lg-8">
                                <div class="form-group row align-items-center mt-4">
                                    <label for="informasi">Tentang Informasi : </label>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="input-group">
                                            <textarea name="informasi" id="informasi" class="form-control"
                                                require><?php echo $data["informasi"] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mt-4">
                                    <label for="beranda">Beranda Informasi : </label>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="input-group">
                                            <textarea name="beranda" id="beranda" class="form-control" rows="15"
                                                require><?php echo $data["beranda"] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top mt-1"></div>
                        <div class="modal-footer mt-1">
                            <button type="submit" name="ubah" class="btn btn-info active">
                                <i class="fas fa-save"></i>
                                ubah data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require_once("../tampilan/footer.php");
    ?>