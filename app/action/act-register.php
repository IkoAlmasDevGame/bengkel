<?php 
require_once("../database/koneksi.php");
session_start();
if(isset($_POST["submited"])){
    $userEmail = htmlspecialchars($_POST["userEmail"]);
    $passEmail = htmlspecialchars($_POST["password"]);
    $username = htmlspecialchars($_POST["username"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $telpone = htmlspecialchars($_POST["telp_kon"]);
    $alamat = htmlspecialchars($_POST["alamat_kon"]);

    $sql = "INSERT INTO account (id,userEmail,username,nama,password,photo,user_level) VALUES
     ('','$userEmail','$username','$nama','$passEmail','default.jfif', 'konsumen')";
    $row = $koneksi->query($sql);

    $sql2 = "INSERT INTO profile (id,nama,telp_kon,alamat_kon) VALUES ('','$nama','$telpone','$alamat')";
    $row2 = $koneksi->query($sql2);
    if($row -> num_rows > 0 && $row2 -> num_rows > 0){
        $response["account"] = array($userEmail,$passEmail,$username);
        $response["profile"] = array($nama,$telpone,$alamat);
        
        echo "Data berhasil dibuat";
        array_push($response["account"], $userEmail,$passEmail,$username);
        array_push($response["profile"], $username,$telpone,$alamat);
        header("location:../view/index.php");
        exit();
    }else{
        echo "Data Tidak berhasil dibuat";
        header("location:../view/index.php");        
        exit();
    }
}
?>