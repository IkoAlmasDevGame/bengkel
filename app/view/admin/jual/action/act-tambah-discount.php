<?php 
require_once("../../database/koneksi.php");

if(isset($_POST["submited"])){
    $nama = htmlspecialchars($_POST["nama_voucher"]);
    $disc = htmlspecialchars($_POST["discount"]);

    $data["voucher"] = array($nama, $disc);
    $sql = "insert into voucher (id, nama_voucher, discount) values ('','$nama','$disc')";
    $row = $koneksi->query($sql);
    
    if($row -> num_rows < 0){
        $db = [
            "nama_voucher" => $_POST["nama_voucher"],
            "discount" => $_POST["discount"]
        ];
        array_push($data["voucher"], $db);
        header("location:../voucher.php");
    }else{
        header("location:../voucher.php");        
    }
}

?>