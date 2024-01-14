<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!--  -->
    <link rel="shortcut icon" href="../../../assets/icon/Logo SMB.png" type="image/x-icon">
    <!--  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://fonts.cdnfonts.com/css/3-of-9-barcode" rel="stylesheet">
    <?php 
    session_start();
    require_once("../../config/auth.php");
    require_once("../../config/config.php");
    require_once("../../database/koneksi.php");
    require_once("../../controller/controllerView.php");
    require_once("../../controller/controllerVoucher.php");
    require_once("../../controller/controllerKonsumen.php");
    $lihat = new view($conn);
    $c = new konsumen($conn);
    $crm = new CRM();

    if(isset($_GET['aksi'])){
        $aksi = $_GET['aksi'];
        if($aksi == "keluar"){
            if(isset($_SESSION['status'])){
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("location:../index.php");
            exit();
        }else{
            echo "<meta http-equiv='refresh' content='0; url=tampilan/index.php'>";
        }
    }
    ?>
</head>

<body>