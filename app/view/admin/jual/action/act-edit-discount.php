<?php 
require_once("../../database/koneksi.php");

if(isset($_POST["submited"])){
    $nama = htmlspecialchars($_POST["nama_voucher"]);
    $disc = htmlspecialchars($_POST["discount"]);
    $id = htmlspecialchars($_POST["id"]);

    $data["voucher"] = array($nama, $disc, $id);
    $sql = "UPDATE voucher SET nama_voucher ='$nama', discount = '$disc' where id = '$id'";
    $row = $koneksi->query($sql);
    
    if($row -> num_rows < 0){
        $db = [
            "nama_voucher" => $_POST["nama_voucher"],
            "discount" => $_POST["discount"],
            "id" => $_POST["id"]
        ];
        array_push($data["voucher"], $db);
        header("location:../voucher.php");
    }else{
        header("location:../voucher.php");        
    }
}

?>