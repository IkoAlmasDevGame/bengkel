<?php 
require_once("../../../database/koneksi.php");
if(isset($_POST["submited"])){
    $id = htmlspecialchars($_POST["id"]);
    $userEmail = htmlspecialchars($_POST["userEmail"]);
    $passEmail = htmlspecialchars($_POST["password"]);
    $username = htmlspecialchars($_POST["username"]);
    $level = htmlspecialchars($_POST["user_level"]);

    $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif');
    $nama_foto = $_FILES['photo']['name'];
    $x_foto = explode('.', $nama_foto);
    $ekstensi_foto = strtolower(end($x_foto));
    $ukuran_foto = $_FILES['photo']['size'];
    $file_tmp_foto = $_FILES['photo']['tmp_name'];

    if(in_array($ekstensi_foto, $ekstensi_diperbolehkan_foto) === true){
        if($ukuran_foto < 10440070){
            move_uploaded_file($file_tmp_foto, "../../../../assets/img/" . $nama_foto);

            $query = "UPDATE account_admin SET userEmail='$userEmail', username='$username', password='$passEmail', user_level='$level', photo='$nama_foto'";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die("Error Database : ".mysqli_errno($koneksi));
            }else{
                header("location:../dashboard/index.php");
                header("cache-control: no-cache");
                header("Content-Disposition:attachment;filename='index.php'");
                echo "<meta http-equiv='refresh' content='0; url=index.php'>";
            }
        }else{
            echo "GAGAL MENGUPLOAD FILE FOTO";
        }
    }else{
        echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
    }
}else{
    header("location:index.php");
}
?>