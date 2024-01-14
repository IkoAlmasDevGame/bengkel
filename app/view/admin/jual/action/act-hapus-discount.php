<?php 
require_once("../../database/koneksi.php");

$id = $_GET['id'];
$sqlI = "DELETE FROM voucher WHERE id = ?";
$rowI = $conn->prepare($sqlI);
$rowI->execute(array($id));
header("location:../index.php");
?>