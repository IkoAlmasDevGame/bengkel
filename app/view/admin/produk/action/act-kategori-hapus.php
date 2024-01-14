<?php 
require_once("../../../../database/koneksi.php");
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM kategori WHERE id_kategori='$id'";
    $row = $koneksi->query($sql);

    if(!$row){
        die("error delete : ".mysqli_errno($koneksi));
    }else{
        header("location:../kategori.php");
    }
}
?>