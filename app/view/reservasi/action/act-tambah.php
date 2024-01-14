<?php 
require_once("../../../database/koneksi.php");
if(isset($_POST["submited"])){
    $tanggal = htmlspecialchars($_POST["tanggal_input"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $plat_no = htmlspecialchars($_POST["plat_no"]);
    $merk_mobil = htmlspecialchars($_POST["merk_mobil"]);
    $reservasi = htmlspecialchars($_POST["reservasi"]);
    $voucher = htmlspecialchars($_POST["nama_voucher"]);

    $sql = "INSERT INTO jadwal_konsumen (id,tanggal_input,nama,plat_no,merk_mobil,reservasi,nama_voucher)
     VALUES ('','$tanggal','$nama','$plat_no','$merk_mobil','$reservasi','$voucher')";
    $row = $koneksi->query($sql);

    if(!$row){
        header("location:../../Dshboard/index.php");        
    }else{
        header('location:../index.php?page=reservasi&nama='.$nama.'');
    }
}
?>