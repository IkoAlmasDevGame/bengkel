<?php 
require_once("../../database/koneksi.php");

if (!empty($_GET['cari_barang'])) {
    if(isset($_POST['keyword'])){
        $cari = strip_tags(trim($_POST['keyword']));
        if($cari == ''){   

        }else{
            $sql = "select barang.*, kategori.id_kategori, kategori.kategori_nama
            from barang inner join kategori on barang.id_kategori = kategori.id_kategori
            where kategori_nama like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%'";
            $row = $conn -> prepare($sql);
            $row -> execute();
            $hasil = $row -> fetchAll();
        }
?>
<div class="overflow-y-scroll flex-shrink-0 g-0 gap-0">
    <table class="table table-striped table-bordered" id="example1">
        <tr>
            <!-- <th style="text-align:center;">Gambar Barang</th> -->
            <th style="text-align:center;">Nama Barang</th>
            <th style="text-align:center;">Merk Barang</th>
            <th style="text-align:center;">Harga Jual</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
        <?php foreach ($hasil as $isi) {
        ?>
        <tr>
            <!-- <td align="center"><img src="../../../../assets/inventory/<?php echo $isi['photo'];?>" alt="" width="32">
            </td> -->
            <td><?php echo $isi['nama_barang'];?></td>
            <td><?php echo $isi['merk'];?></td>
            <td>Rp. <?php echo number_format($isi['harga_jual']);?></td>
            <td align="center">
                <a class="btn btn-success" href="action/act-tambah.php?id=<?=$isi['id_barang']?>">
                    <i class="fa fa-shopping-cart"></i></a>
            </td>
        </tr>
        <?php }?>
    </table>
</div>
<?php
    }
}

?>