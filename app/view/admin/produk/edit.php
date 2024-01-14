<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <?php 
        require_once("../tampilan/header.php");
        $id = $_GET["id"];
        $isi = $lihat -> editBarang($id);
    ?>
</head>

<body>
    <?php 
        require_once("../tampilan/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12 py-5 bg-body-tertiary mt-2 mt-lg-2">
        <div class="container-fluid p-5 mb-2 mb-lg-2 bg-body-secondary">
            <div class="container-md container-lg py-5 bg-body-tertiary">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-8 col-lg-8 py-5 bg-info active rounded-2">
                        <h3 class="modal-title text-center text-black active"><?=$isi["nama_barang"]?></h3>
                        <form action="action/act-barang-edit.php" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="id" value="<?=$isi["id_barang"]?>">
                            <div class="d-flex justify-content-end align-items-end mx-2 ">
                                <img src="../../../../assets/inventory/<?=$isi["photo"]?>" alt="" width="128"
                                    class="rounded-3">
                            </div>
                            <div class="border-top border my-2 my-lg-2"></div>
                            <table class="table table-striped bordered">
                                <tr>
                                    <td>ID Barcode</td>
                                    <td><input type="text" readonly="readonly" required
                                            value="<?php echo $isi["id_barcode"];?>" class="form-control"
                                            name="id_barcode">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>
                                        <select name="kategori" class="form-control" required>
                                            <option value="#">Pilih Kategori</option>
                                            <option value="<?php echo $isi['id_kategori'];?>">
                                                <?php echo $isi['kategori_nama'];?></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Barang</td>
                                    <td><input type="text" placeholder="Nama Barang" required class="form-control"
                                            name="nama" value="<?=$isi["nama_barang"]?>"></td>
                                </tr>
                                <tr>
                                    <td>Merk Barang</td>
                                    <td><input type="text" placeholder="Merk Barang" required class="form-control"
                                            name="merk" value="<?=$isi["merk"]?>"></td>
                                </tr>
                                <tr>
                                    <td>Harga Beli</td>
                                    <td><input type="number" placeholder="Harga beli" required class="form-control"
                                            name="beli" value="<?=$isi["harga_beli"]?>"></td>
                                </tr>
                                <tr>
                                    <td>Harga Jual</td>
                                    <td><input type="number" placeholder="Harga Jual" required class="form-control"
                                            name="jual" value="<?=$isi["harga_jual"]?>"></td>
                                </tr>
                                <tr>
                                    <td>Satuan Barang</td>
                                    <td>
                                        <select name="satuan" class="form-control" required>
                                            <option value="#">Pilih Satuan</option>
                                            <option value="<?=$isi["satuan_barang"]?>" class="text-success">
                                                <?=$isi["satuan_barang"]?>
                                            </option>
                                            <option value="PCS">PCS</option>
                                            <option value="Karton">Kardus</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td><input type="number" required Placeholder="Stok" class="form-control"
                                            name="stok" value="<?=$isi["stok"]?>"></td>
                                </tr>
                                <tr>
                                    <td>File Gambar</td>
                                    <td>
                                        <input type="file" required Placeholder="File Gambar" class="form-control"
                                            name="photo">
                                        <input type="hidden" required Placeholder="File Gambar" class="form-control"
                                            name="photo" value="<?=$isi["photo"]?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td><input type="text" required readonly="readonly" class="form-control"
                                            value="<?php echo date("j F Y, G:i");?>" name="tgl_input"></td>
                                </tr>
                            </table>
                            <div class="modal-footer">
                                <button type="submit" name="submited" class="btn btn-primary"><i class="fa fa-save"></i>
                                    Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require_once("../tampilan/footer.php");
    ?>