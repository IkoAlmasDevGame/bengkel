<?php 
require_once("../../database/koneksi.php");

$sqlI = "DELETE FROM nota";
$rowI = $koneksi->prepare($sqlI);
$rowI->execute();
header("location:../index.php?nota=yes#kasirnya");
?>