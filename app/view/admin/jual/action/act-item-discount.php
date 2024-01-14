<?php 
require_once("../../database/koneksi.php");

$discount = $_POST['discount'];

$sql = "INSERT INTO nota SET discount = '$discount'";
$koneksi->query($sql);

$response["nota"] = array("discount" => $_POST["discount"]);

array_push($response["nota"], $discount);

header("location:../index.php#nota=yes");
?>