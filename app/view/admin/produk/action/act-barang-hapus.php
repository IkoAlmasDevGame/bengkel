<?php 
require_once("../../../../database/koneksi.php");
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM barang WHERE id_barang='$id'";
    $row = $koneksi->query($sql);

    if(!$row){
        die("error delete : ".mysqli_errno($koneksi));
    }else{
        header("location:../barang.php");
    }
}
?>