<?php 
require_once("../../../../database/koneksi.php");
if(isset($_POST["restock"])){
    $id = htmlspecialchars($_POST["id"]);
    $restok = htmlspecialchars($_POST["restok"]);
    $row = $koneksi -> query("UPDATE barang SET stok = '$restok' WHERE id_barang='$id'");
    if(!$row){
        die("error update : ".mysqli_errno($koneksi));
    }else{
        header("location:../barang.php");
    }
}

?>