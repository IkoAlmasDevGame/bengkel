<?php 
require_once("../../../../database/koneksi.php");
$nama= htmlspecialchars($_POST['kategori']);
$id= htmlspecialchars($_POST['id']);
$sql = "UPDATE kategori SET kategori_nama='$nama' WHERE id_kategori='$id'";
$row = $koneksi->query($sql);

if(!$row){
    die("error update : ".mysqli_errno($koneksi));
}else{
    header('location:../kategori.php?id='.$id.'');
}
?>