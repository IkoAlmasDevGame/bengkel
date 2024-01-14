<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <?php 
        require_once("../tampilan/header.php");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
    @import url('https://fonts.cdnfonts.com/css/3-of-9-barcode');

    .barcode {
        font-family: '3 of 9 Barcode', sans-serif;
    }
    </style>
</head>

<body>
    <?php 
        require_once("../tampilan/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12 py-5 bg-body-tertiary mt-2 mt-lg-2">
        <div class="container-fluid p-5 mb-2 mb-lg-2 bg-body-secondary">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fs-4 mx-1 fw-semibold">Data Barang</h3>
                                <div class="card-header-form">
                                    <a href="" type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#tambahbarang" aria-controls="tambahbarang">
                                        <i class="fas fa-plus"></i>
                                        Tambah Barang
                                    </a>
                                    <a href="barang.php?stok=yes" type="button" class="btn btn-warning">
                                        <i class="fa fa-list"></i> Sortir Stok Kurang</a>
                                    <a href="barang.php" type="button" class="btn btn-info">
                                        <i class="fa fa-refresh"></i> Refresh Page</a>
                                </div>
                                <div class="modal fade" id="tambahbarang" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background:skyblue;color:#fff;">
                                                <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="action/act-barang-tambah.php"
                                                    enctype="multipart/form-data" method="post">
                                                    <table class="table table-striped bordered">
                                                        <?php
                                                            $format = $lihat-> barang_id();
                                                        ?>
                                                        <tr>
                                                            <td>ID Barcode</td>
                                                            <td><input type="text" readonly="readonly" required
                                                                    value="<?php echo $format;?>" class="form-control"
                                                                    name="id_barcode">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kategori</td>
                                                            <td>
                                                                <select name="kategori" class="form-control" required>
                                                                    <option value="#">Pilih Kategori</option>
                                                                    <?php $row = $lihat-> kategori(); foreach($row as $isi){ 	?>
                                                                    <option value="<?php echo $isi['id_kategori'];?>">
                                                                        <?php echo $isi['kategori_nama'];?></option>
                                                                    <?php }?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Barang</td>
                                                            <td><input type="text" placeholder="Nama Barang" required
                                                                    class="form-control" name="nama"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Merk Barang</td>
                                                            <td><input type="text" placeholder="Merk Barang" required
                                                                    class="form-control" name="merk"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Harga Beli</td>
                                                            <td><input type="number" placeholder="Harga beli" required
                                                                    class="form-control" name="beli"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Harga Jual</td>
                                                            <td><input type="number" placeholder="Harga Jual" required
                                                                    class="form-control" name="jual"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Satuan Barang</td>
                                                            <td>
                                                                <select name="satuan" class="form-control" required>
                                                                    <option value="#">Pilih Satuan</option>
                                                                    <option value="PCS">PCS</option>
                                                                    <option value="Karton">Kardus</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Stok</td>
                                                            <td><input type="number" required Placeholder="Stok"
                                                                    class="form-control" name="stok"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>File Gambar</td>
                                                            <td><input type="file" required Placeholder="File Gambar"
                                                                    class="form-control" name="photo"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Input</td>
                                                            <td><input type="text" required readonly="readonly"
                                                                    class="form-control"
                                                                    value="<?php echo  date("j F Y, G:i");?>"
                                                                    name="tgl_input"></td>
                                                        </tr>
                                                    </table>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="submited" class="btn btn-primary"><i
                                                                class="fa fa-plus"></i> Insert
                                                            Data</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md table-responsive-lg flex-shrink-0 overflow-x-scroll">
                                    <table class="table table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th style="width: 4%; min-width:4%;">No</th>
                                                <th style="width: 8%; min-width:8%;" class="text-center">Kategori</th>
                                                <th style="width: 29%; min-width:29%;" class="text-center">Nama Barang
                                                </th>
                                                <th style="width: 12%; min-width:12%;" class="text-center">Merk Barang
                                                </th>
                                                <th class="text-center">Harga Beli</th>
                                                <th class="text-center">Harga Jual</th>
                                                <th style="width: 12%; min-width:12%;" class="text-center">Satuan Barang
                                                </th>
                                                <th style="width: 12%; min-width:12%;" class="text-center">Stok Barang
                                                </th>
                                                <th class="text-center">Photo</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        $totalBeli = 0;
                                        $totalJual = 0;
                                        $totalStok = 0;
                                        
                                        if(!empty($_GET['stok'] == "yes")){
                                            $hasil = $lihat-> barang_stok();
                                        }else{
                                            $hasil = $lihat-> barang();
                                        }

                                        $no = 1;
                                        foreach ($hasil as $isi) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no; ?></td>
                                                <td class="text-center"><?=$isi["kategori_nama"]?></td>
                                                <td class="text-center"><?=$isi["nama_barang"]?></td>
                                                <td class="text-center"><?=$isi["merk"]?></td>
                                                <td class="text-center">Rp. <?=number_format($isi["harga_beli"])?></td>
                                                <td class="text-center">Rp. <?=number_format($isi["harga_jual"])?></td>
                                                <td class="text-center"> <?=$isi['satuan_barang']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($isi['stok'] <=  '3') { ?>
                                                    <form action="action/act-stok-barang.php" method="post">
                                                        <input type="text" name="restok" class="form-control">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $isi['id_barang'];?>"
                                                            class="form-control">
                                                        <button class="btn btn-primary btn-sm" type="submit"
                                                            name="restock">Restok</button>
                                                        <a href="action/act-barang-hapus.php?id=<?=$isi["id_barang"]?>"
                                                            onclick="javascript:return confirm('Hapus Data barang ?');">
                                                            <button class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-trash-alt"></i></button></a>
                                                    </form>
                                                    <?php } else if ($isi['stok'] == '0') { ?>
                                                    <button class="btn btn-danger"> Habis</button>
                                                    <?php } else { ?>
                                                    <?php echo $isi['stok']; ?>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center"> <img
                                                        src="../../../../assets/inventory/<?=$isi['photo']; ?>" alt=""
                                                        width="32"></td>
                                                <td class="text-center" style="width: 12%; min-width:12%;">
                                                    <a href="detail.php?id=<?=$isi["id_barang"]?>"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="edit.php?id=<?=$isi["id_barang"]?>"
                                                        class="btn btn-warning btn-sm" type="button">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="action/act-barang-hapus.php?id=<?=$isi["id_barang"]?>"
                                                        onclick="javascript:return confirm('Hapus Data barang ?');"
                                                        class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                    $no++;
                                    $totalBeli += $isi['harga_beli'] * $isi['stok'];
                                    $totalJual += $isi['harga_jual'] * $isi['stok'];
                                    $totalStok += $isi['stok'];
                                        }
                                    ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">Total </td>
                                                <th class="text-center">Rp.<?php echo number_format($totalBeli); ?>,-
                                                    </td>
                                                <th class="text-center">Rp.<?php echo number_format($totalJual); ?>,-
                                                    </td>
                                                <th colspan="1" style="background:#ddd"></th>
                                                <th class="text-center"><?php echo $totalStok; ?></td>
                                                <th colspan="2" style="background:#ddd"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require_once("../tampilan/footer.php");
    ?>