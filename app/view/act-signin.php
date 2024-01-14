<?php 
include("../database/koneksi.php");
session_start();
if(isset($_POST["submited"])){
    $userEmail = htmlspecialchars($_POST["userEmail"]);
    $passEmail = htmlspecialchars($_POST["password"]);
    password_verify($passEmail, PASSWORD_DEFAULT);

    if($userEmail == "" || $passEmail == ""){
        header("location:index.php");
    }

    $sql = "SELECT account.*, profile.nama FROM account join profile on account.nama = profile.nama WHERE userEmail = '$userEmail' and password='$passEmail' || username = '$userEmail' and password='$passEmail'";
    $row = $koneksi->query($sql);

    if($row->num_rows > 0){
        $response["account"] = array($userEmail,$passEmail);
        if($db = $row->fetch_assoc()){
            if($db["user_level"]== "konsumen"){
                $_SESSION["id_user"] = $db["id_user"];
                $_SESSION["username"] = $db["username"];
                $_SESSION["nama"] = $db["nama"];
                $_SESSION["photo"] = $db["photo"];
                $_SESSION["user_level"] = "konsumen";
                header("location:Dshboard/index.php");
            }
            $_SESSION["status"] = true;
            json_encode($response["account"]);
            array_push($response["account"], $db);
        }
    }else{
        header("location:index.php");
    }
}
?>