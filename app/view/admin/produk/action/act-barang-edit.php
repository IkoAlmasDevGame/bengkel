<?php 
require_once("../../../../database/koneksi.php");

if(isset($_POST['submited'])){
    $id_barang = htmlspecialchars($_POST["id"]);
    $kategori = htmlspecialchars($_POST['kategori']);
    $id = htmlspecialchars($_POST['id_barcode']);
    $nama = htmlspecialchars($_POST['nama']);
    $merk = htmlspecialchars($_POST['merk']);
    $beli = htmlspecialchars($_POST['beli']);
    $jual = htmlspecialchars($_POST['jual']);
    $stok = htmlspecialchars($_POST['stok']);
    $satuan = htmlspecialchars($_POST['satuan']);
    
    $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif');
    $nama_foto = $_FILES['photo']['name'];
    $x_foto = explode('.', $nama_foto);
    $ekstensi_foto = strtolower(end($x_foto));
    $ukuran_foto = $_FILES['photo']['size'];
    $file_tmp_foto = $_FILES['photo']['tmp_name'];
    $tgl = htmlspecialchars($_POST['tgl_input']);

    $data = array(
        "id_barang" => $id_barang,
        "id_kategori" => $kategori,
        "id_barcode" => $id,
        "nama_barang" => $nama,
        "merk" => $merk,
        "harga_beli" => $beli,
        "harga_jual" => $jual,
        "stok" => $stok,
        "satuan_barang" => $satuan,
        "photo" => $nama_foto,
        "tgl_input" => $tgl
    );
    
    if(in_array($ekstensi_foto, $ekstensi_diperbolehkan_foto) === true){
        if($ukuran_foto < 10440070){
            move_uploaded_file($file_tmp_foto, "../../../../../assets/inventory/" . $nama_foto);
            $response['barang'] = array($data);
            // Response Gambar Created
            $sql = "UPDATE barang SET id_kategori = '$kategori', id_barcode='$id', nama_barang='$nama', merk='$merk', harga_beli='$beli', harga_jual='$jual', stok='$stok', satuan_barang='$satuan', photo='$nama_foto' WHERE id_barang='$id_barang'";
            $row = $koneksi->query($sql); 
            if($row->num_rows > 0){
                array_push($response['barang'], $data);
                json_encode($response["barang"]);
                header("location:../barang.php");
            }else{
                header("location:../barang.php");
            }
        }else{
            echo "GAGAL MENGUPLOAD FILE FOTO";
        }
    }else{
        echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
    }
}
?>