<?php 
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$host 	= 'localhost'; // host server
$user 	= 'root';  // username server
$pass 	= ''; // password server, kalau pakai xampp kosongin saja
$dbname = "bengkeldb";

$koneksi = mysqli_connect($host, $user, $pass, $dbname);
if(!$koneksi){
    die("Failed Connection database : " . mysqli_connect_error());
}

try{
    $conn =  new PDO("mysql:host=$host;dbname=$dbname;", $user,$pass);
}catch(PDOException $e){
    echo 'KONEKSI GAGAL' .$e -> getMessage();
}

$view = "../controller/controllerView.php";
$crm = "../controller/controllerVoucher.php";
$konsumen = "../controller/controllerKonsumen.php";

?>