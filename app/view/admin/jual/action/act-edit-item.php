<?php 
require_once("../../database/koneksi.php");

$id = htmlentities($_POST['id']);
$id_barang = htmlentities($_POST['id_barang']);
$jumlah = htmlentities($_POST['jumlah']);

$sql = "select * from barang where id_barang = ?";
$row = $conn -> prepare($sql);
$row -> execute(array($id_barang));
$hasil = $row -> fetch();

if ($hasil["stok"] > $jumlah) {
    $jual = $hasil['harga_jual'];
    $total = $jual * $jumlah;
    $data1[] = $jumlah;
    $data1[] = $total;
    $data1[] = $id;

    $sql1 = 'UPDATE penjualan SET jumlah=?, total=? WHERE id=?';
    $row1 = $conn -> prepare($sql1);
    $row1 -> execute($data1);
    echo '<script>window.location="../index.php?nota=yes"</script>';
} else {
    echo '<script>alert("Keranjang Melebihi Stok Barang Anda !");
			window.location="../index.php#keranjang"</script>';
}

?>