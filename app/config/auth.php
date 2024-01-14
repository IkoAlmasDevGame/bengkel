<?php 
if(isset($_SESSION["status"])){
    if(isset($_SESSION["id"])){
        if(isset($_SESSION["username"])){
            if(isset($_SESSION["photo"])){
                if(isset($_SESSION["user_level"])){
                
                }
            }
        }
    }
}else{
    header("location:index.php");
    exit();
}

?>