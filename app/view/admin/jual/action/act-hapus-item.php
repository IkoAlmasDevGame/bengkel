<?php 
require_once("../../database/koneksi.php");

$brg = $_GET['brg'];
$sql = "SELECT * from barang where id_barang = ?";
$row = $conn->prepare($sql);
$row->execute(array($brg));

$id = $_GET['id'];
$sqlI = "DELETE FROM penjualan WHERE id = ?";
$rowI = $conn->prepare($sqlI);
$rowI->execute(array($id));
header("location:../index.php");
?>