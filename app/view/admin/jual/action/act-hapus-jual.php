<?php 
require_once("../../database/koneksi.php");

$sqlI = "DELETE FROM penjualan";
$rowI = $koneksi->prepare($sqlI);
$rowI->execute();
header("location:../index.php");
?>