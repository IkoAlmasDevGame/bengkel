<?php 
require_once("../../../database/koneksi.php");
if(isset($_POST["submited"])){
    $tanggal = htmlspecialchars($_POST["tanggal_input"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $plat_no = htmlspecialchars($_POST["plat_no"]);
    $merk_mobil = htmlspecialchars($_POST["merk_mobil"]);
    $reservasi = htmlspecialchars($_POST["reservasi"]);
    $voucher = htmlspecialchars($_POST["nama_voucher"]);
    $id = htmlspecialchars($_POST["id"]);

    $read = array(
        $tanggal => $_POST["tanggal_input"],
        $nama => $_POST["nama"],
        $plat_no => $_POST["plat_no"],
        $merk_mobil => $_POST["merk_mobil"],
        $reservasi => $_POST["reservasi"],
        $voucher => $_POST["nama_voucher"],
        $id => $_POST["id"]
    );
    $data["jadwal_konsumen"] = array($read);
    $sql = "UPDATE jadwal_konsumen SET tanggal_input = '$tanggal', nama = '$nama', 
    plat_no = '$plat_no', merk_mobil = '$merk_mobil', reservasi='$reservasi', nama_voucher='$voucher' WHERE id = '$id'";
    $row = $koneksi->query($sql);

    if($row){
        json_encode($data["jadwal_konsumen"]);
        array_push($data["jadwal_konsumen"], $read);
        header("location:../index.php?page=view&nama=".$nama);
    }else{
        header("location:../../Dshboard/index.php");        
    }
}
?>