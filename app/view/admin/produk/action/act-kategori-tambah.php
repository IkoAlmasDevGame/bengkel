<?php 
require_once("../../../../database/koneksi.php");
$nama = htmlspecialchars($_POST["kategori"]);
$tgl= date("j F Y, G:i");
$row = array(
    "kategori_nama" => $_POST['kategori_nama'],
    "tgl_input" => date("j F Y, G:i")
);
$sql = "INSERT INTO kategori (id_kategori,kategori_nama,tgl_input) VALUES ('','$nama','$tgl')";
$row = $koneksi->query($sql);
$response = array();
$response['kategori'] = array_push($response['kategori'], $row);
header("location:../kategori.php");
?>