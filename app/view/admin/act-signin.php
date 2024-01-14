<?php 
include("../../database/koneksi.php");
session_start();
if(isset($_POST["submit"])){
    $userEmail = htmlspecialchars($_POST["userEmail"]);
    $passEmail = htmlspecialchars($_POST["password"]);
    password_verify($passEmail, PASSWORD_DEFAULT);

    if($userEmail == "" || $passEmail == ""){
        header("location:index.php");
    }

    $sql = "SELECT * FROM account_admin WHERE userEmail = '$userEmail' and password='$passEmail' || username = '$userEmail' and password='$passEmail'";
    $row = $koneksi->query($sql);

    if($row->num_rows > 0){
        $response["account_admin"] = array($userEmail,$passEmail);
        if($db = $row->fetch_assoc()){
            if($db["user_level"]== "admin"){
                $_SESSION["id"] = $db["id"];
                $_SESSION["username"] = $db["username"];
                $_SESSION["photo"] = $db["photo"];
                $_SESSION["user_level"] = "admin";
                header("location:dashboard/index.php");
            }
            $_SESSION["status"] = true;
            json_encode($response["account_admin"]);
            array_push($response["account_admin"], $db);
        }
    }else{
        header("location:index.php");
    }
}
?>