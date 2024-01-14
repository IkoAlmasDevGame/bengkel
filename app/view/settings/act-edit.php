<?php 
require_once("../../database/koneksi.php");
if(isset($_POST["submited"])){
    $userEmail = htmlspecialchars($_POST["userEmail"]);
    $passEmail = htmlspecialchars($_POST["password"]);
    $username = htmlspecialchars($_POST["username"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $telpone = htmlspecialchars($_POST["telp_kon"]);
    $alamat = htmlspecialchars($_POST["alamat_kon"]);
    $id_user = htmlspecialchars($_POST["id_user"]);
    $id = htmlspecialchars($_POST["id"]);

    $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif');
    $nama_foto = $_FILES['photo']['name'];
    $x_foto = explode('.', $nama_foto);
    $ekstensi_foto = strtolower(end($x_foto));
    $ukuran_foto = $_FILES['photo']['size'];
    $file_tmp_foto = $_FILES['photo']['tmp_name'];

    if(in_array($ekstensi_foto, $ekstensi_diperbolehkan_foto) === true){
        if($ukuran_foto < 10440070){
            move_uploaded_file($file_tmp_foto, "../../../assets/img/" . $nama_foto);
            $rest = $koneksi->query("UPDATE account SET userEmail='$userEmail', username='$username', nama='$nama', password='$passEmail',
            photo='$nama_foto', user_level='konsumen' WHERE id_user='$id_user'");
            $result = $koneksi->query("UPDATE profile SET nama='$nama', telp_kon='$telpone', alamat_kon='$alamat' WHERE id='$id'");
            if($rest && $result){
                $_SESSION["photo_name"] = $nama_foto;
                header("location:../Dshboard/index.php");
                header("cache-control: no-cache");
                header("Content-Disposition:attachment;filename='index.php'");
            }else{
                die("Error Database : ".mysqli_errno($koneksi));
            }
        }else{
            echo "GAGAL MENGUPLOAD FILE FOTO";
        }
    }else{
        echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
    }
}else{
    header('location:../Dshboard/index.php');
}
?>