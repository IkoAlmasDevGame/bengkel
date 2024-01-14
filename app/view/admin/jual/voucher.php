<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocher Discount Barang</title>
    <?php 
        require_once("../tampilan/header.php");
        require_once("../../../database/koneksi.php");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
    @import url('https://fonts.cdnfonts.com/css/3-of-9-barcode');

    .barcode {
        font-family: '3 of 9 Barcode', sans-serif;
    }

    #more {
        display: none;
    }
    </style>
</head>

<body>
    <?php 
        require_once("../tampilan/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12 p-5 py-5 bg-body-secondary mt-5 mt-lg-5">
        <div class="container-fluid py-5 rounded-2 bg-body-tertiary">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-9 col-lg-9 py-3 bg-info">
                    <h3>Voucher Discount</h3>
                    <div class="card">
                        <div class="card-header py-4">
                            <div class="card-header-form">
                                <a href="" type="button" class="btn btn-danger active" data-bs-toggle="modal"
                                    data-bs-target="#tambahvoucher" aria-controls="tambahvoucher">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a href="voucher.php" type="button" class="btn btn-info">
                                    <i class="fa fa-refresh"></i> Refresh Page</a>
                            </div>
                            <div class="modal fade" id="tambahvoucher" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Voucher</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="action/act-tambah-discount.php" method="post">
                                            <div class="modal-body">
                                                <table class="table table-striped bordered">
                                                    <tr>
                                                        <td>Nama Voucher</td>
                                                        <td>
                                                            <input type="text" name="nama_voucher" class="form-control"
                                                                placeholder="isi nama voucher disini ..." required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Berapa Discount</td>
                                                        <td><input type="text" name="discount" class="form-control"
                                                                placeholder="isi discount disini untuk %" required>
                                                            <button onclick="myFunction()"
                                                                class="btn btn-secondary my-2" id="myBtn">read
                                                                more</button>
                                                            <p>cara pengerjaan discount ialah
                                                                <span id="dots"> ...</span>
                                                                <span id="more">
                                                                    <br>
                                                                    Harga Jual - (Harga Jual * Berapa Persen).
                                                                    <br>
                                                                    contoh :
                                                                    <br>
                                                                    500.000 - (500.000 * 20 / 100) ?
                                                                    <br>
                                                                    500.000 - 100.000 = 400.000
                                                                    <br>
                                                                    Discountnya Jadi 0.2%.
                                                                </span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="modal-footer">
                                                    <button type="submit" name="submited" class="btn btn-primary"><i
                                                            class="fa fa-plus"></i> Insert
                                                        Data</button>
                                                    <button type="button" class="btn btn-default"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-body">
                                <div class="table-responsive-md table-responsive-lg">
                                    <table class="table table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Voucher</th>
                                                <th class="text-center">Discount</th>
                                                <th class="text-center">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $hasil = $lihat -> GetVoucher();
                                                $no = 1;
                                                foreach ($hasil as $isi) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no; ?></td>
                                                <td class="text-center"><?php echo $isi["nama_voucher"]; ?></td>
                                                <td class="text-center"><?php echo $isi["discount"]; ?></td>
                                                <td class="text-center">
                                                    <a href="" data-bs-target="modal"
                                                        data-bs-toggle="#editvoucher<?=$isi["id"]?>"
                                                        class="btn btn-warning">
                                                        <i class="fas fa-pen-alt"></i>
                                                    </a>
                                                    <a href="action/act-hapus-discount.php?id=<?=$isi["id"]?>"
                                                        class="btn btn-danger"
                                                        onclick="javascript:return confirm('Apakah kamu ingin menghapus voucher ini ?')">
                                                        <i class="fas fa-close"></i>
                                                    </a>
                                                </td>
                                                <div class="modal fade" id="editvoucher<?=$isi["id"]?>" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"><i class="fa fa-plus"></i>
                                                                    Tambah Voucher</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <form action="action/act-edit-discount.php" method="post">
                                                                <div class="modal-body">
                                                                    <table class="table table-striped bordered">
                                                                        <tr>
                                                                            <td>Nama Voucher</td>
                                                                            <td>
                                                                                <input type="text" name="nama_voucher"
                                                                                    class="form-control"
                                                                                    placeholder="isi nama voucher disini ..."
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Berapa Discount</td>
                                                                            <td><input type="text" name="discount"
                                                                                    class="form-control"
                                                                                    placeholder="isi discount disini untuk %"
                                                                                    value="<?=$isi["discount"]?>"
                                                                                    required>
                                                                                <button onclick="myFunction()"
                                                                                    class="btn btn-secondary my-2"
                                                                                    id="myBtn">read
                                                                                    more</button>
                                                                                <p>cara pengerjaan discount ialah
                                                                                    <span id="dots"> ...</span>
                                                                                    <span id="more">
                                                                                        <br>
                                                                                        Harga Jual - (Harga Jual *
                                                                                        Berapa Persen).
                                                                                        <br>
                                                                                        contoh :
                                                                                        <br>
                                                                                        500.000 - (500.000 * 20 / 100) ?
                                                                                        <br>
                                                                                        500.000 - 100.000 = 400.000
                                                                                        <br>
                                                                                        Discountnya Jadi 0.2%.
                                                                                    </span>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="submited"
                                                                            class="btn btn-primary"><i
                                                                                class="fa fa-plus"></i> Insert
                                                                            Data</button>
                                                                        <button type="button" class="btn btn-default"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                            <?php
                                                    $no ++;
                                                }
                                            ?>
                                        </tbody>
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