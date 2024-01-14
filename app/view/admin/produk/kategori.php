<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
    <?php 
        require_once("../tampilan/header.php");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                                <div class="card-header-form">
                                    <?php
                                        if (!empty($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $hasil = $lihat -> editKategori($id);
                                    ?>
                                    <form method="POST" action="action/act-kategori-edit.php">
                                        <table>
                                            <tr>
                                                <td style="width:25pc;"><input type="text" class="form-control"
                                                        value="<?= $hasil['kategori_nama']; ?>" required name="kategori"
                                                        placeholder="Masukan Kategori Barang Baru">
                                                    <input type="hidden" name="id"
                                                        value="<?= $hasil['id_kategori']; ?>">
                                                </td>
                                                <td style="padding-left:10px;"><button id="tombol-simpan"
                                                        class="btn btn-primary" type="submit"><i class="fa fa-edit"></i>
                                                        Ubah Data</button></td>
                                            </tr>
                                        </table>
                                    </form>
                                    <?php } else { ?>
                                    <form method="POST" action="action/act-kategori-tambah.php">
                                        <table>
                                            <tr>
                                                <td style="width:25pc;"><input type="text" class="form-control" required
                                                        name="kategori" placeholder="Masukan Kategori Barang Baru"></td>
                                                <td style="padding-left:10px;"><button id="tombol-simpan"
                                                        class="btn btn-primary"><i class="fa fa-plus"></i>
                                                        Insert Data</button></td>
                                            </tr>
                                        </table>
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md table-responsive-lg flex-shrink-0 overflow-x-scroll">
                                    <table class="table table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori</th>
                                                <th>Tanggal Input</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $hasil = $lihat -> kategori();
                                            $no = 1;
                                            foreach ($hasil as $isi) {
                                                ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $isi["kategori_nama"]; ?></td>
                                                <td><?php echo $isi["tgl_input"]; ?></td>
                                                <td>
                                                    <a href="action/act-kategori-hapus.php?id=<?=$isi["id_kategori"]?>"
                                                        class="btn btn-danger active">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a href="kategori.php?id=<?=$isi["id_kategori"]?>"
                                                        class="btn btn-warning active">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                                $no++;
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