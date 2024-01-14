<?php 
require_once("../../database/koneksi.php");

$id = htmlspecialchars($_GET["id"]);
$sqlI = "DELETE FROM jadwal_konsumen where id = ?";
$rowI = $conn->prepare($sqlI);
$rowI->execute(array($kode));
header("location:../index.php?page=view");
?>