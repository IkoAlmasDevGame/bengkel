<?php 
require_once "../database/koneksi.php";
    if(isset($_POST["tambah"])){
        $nama = htmlspecialchars($_POST["nama"]);
        $total = htmlspecialchars($_POST["total"]);
        $date = htmlspecialchars($_POST["tanggal_input"]);

        $response["nota_pelanggan"] = array($nama,$total,$date);
    
        $sql = "INSERT INTO nota_pelanggan (id,nama,total,tanggal_input) VALUES ('','$nama','$total','$date')";
        $query = $koneksi->query($sql);
        if($query){
            header("location:index.php");
            array_push($response["nota_pelanggan"], array($nama,$total,$date));
        }else{
            die("error connection insert : ".mysqli_connect_errno());
        }
    }
?>