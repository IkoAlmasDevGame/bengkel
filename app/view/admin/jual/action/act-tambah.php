<?php 
include("../../database/koneksi.php");

$id = $_GET['id'];

// get tabel barang id_barang
$sql = 'SELECT * FROM barang WHERE id_barang = ?';
$row = $conn->prepare($sql);
$row->execute(array($id));
$row = $row->fetch();

if ($row['stok'] > 0) {
    $jumlah = 1;
    $total = $row['harga_jual'];
    $tgl = date("j F Y, G:i");

    $data1[] = $id;
    $data1[] = $jumlah;
    $data1[] = $total;
    $data1[] = $tgl;

    $sql1 = "INSERT INTO penjualan (id,id_barang,jumlah,total,tanggal_input) VALUES ('','$id','$jumlah','$total','$tgl')";
    $row1 = $koneksi->query($sql1);

        header("location:../index.php?nota=yes");
    }else{
        echo '<script>alert("Stok Barang Anda Telah Habis !");"</script>';
        header("location:../jual.php#keranjang");
}

?>