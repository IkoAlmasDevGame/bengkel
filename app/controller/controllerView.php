<?php 

class view {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function editAccount($id, $name){
        $sql = "SELECT * FROM account_admin WHERE username='$name' and id='$id'";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        return $hasil;
    }

    public function countKategori(){
        $sql = "";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->rowCount();
        return $hasil;
    }

    public function countBarang(){
        $sql = "";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->rowCount();
        return $hasil;
    }

    public function rowKategori(){
        $sql = "SELECT SUM(id_kategori) as jml FROM kategori";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        return $hasil;
    }

    public function rowBarang(){
        $sql = "SELECT SUM(stok) as jml FROM barang";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        return $hasil;
    }

    public function Kategori(){
        $sql = "SELECT * FROM kategori";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function editKategori($id){
        $sql = "SELECT * FROM kategori where id_kategori = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($id));
        $hasil = $row->fetch();
        return $hasil;
    }

    public function Barang(){
        $sql = "SELECT barang.*, kategori.id_kategori, kategori.kategori_nama
        from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
        ORDER BY id_barang DESC";
        $row = $this->db->prepare($sql);
        $row->execute();
        $isi = $row->fetchAll();
        return $isi;
    }

    public function editBarang($id){
        $sql = "SELECT barang.*, kategori.id_kategori, kategori.kategori_nama
        from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
        WHERE id_barang = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($id));
        $hasil = $row->fetch();
        return $hasil;
    }

    public function viewBarang($id){
        $sql = "SELECT barang.*, kategori.id_kategori, kategori.kategori_nama
        from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
        WHERE id_barang = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($id));
        $hasil = $row->fetch();
        return $hasil;
    }

    public function barang_stok(){
        $sql = "select barang.*, kategori.id_kategori, kategori.kategori_nama
                from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
                where stok <= 3 ORDER BY id_barang DESC";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function barang_cari($cari)
    {
        $sql = "select barang.*, kategori.id_kategori, kategori.kategori_nama
        from barang inner join kategori on barang.id_kategori = kategori.id_kategori
        where id_barang like '%$cari%' or id_barcode like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%'";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function barang_id(){
        $sql = 'SELECT * FROM barang ORDER BY id_barcode DESC';
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetch();

        $urut = substr($row['id_barcode'], 3, 4);
        $tambah = (int) $urut + 1;
        if (strlen($tambah) == 1) {
            $format = 'BRG000'.$tambah.'';
        } elseif (strlen($tambah) == 2) {
            $format = 'BRG00'.$tambah.'';
        } else {
            $ex = explode('BRG', $row['id_barcode']);
            $no = (int) $ex[1] + 1;
            $format = 'BRG'.$no.'';
        }
        return $format;
    }

    public function kodejadwal(){
        $sql = 'SELECT * FROM jadwal ORDER BY kode_jadwal DESC';
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $row = $row -> fetch();

        $urut = substr($row['kode_jadwal'], 3, 4);
        $tambah = (int) $urut + 1;
        if (strlen($tambah) == 1) {
            $format = 'KDJ00'.$tambah.'';
        } elseif (strlen($tambah) == 2) {
            $format = 'KDJ0'.$tambah.'';
        } else {
            $ex = explode('KDJ', $row['kode_jadwal']);
            $no = (int) $ex[1] + 1;
            $format = 'KDJ'.$no.'';
        }
        return $format;
    }

    public function penjualan(){
        $sql = "SELECT penjualan.* , barang.id_barang, barang.nama_barang from penjualan 
                left join barang on barang.id_barang=penjualan.id_barang ORDER BY id ASC";
        $row = $this-> db -> prepare($sql);
        $row -> execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function jumlah(){
        $sql = "SELECT SUM(total) as bayar FROM penjualan";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetch();
        return $hasil;
    }

    public function GetVoucher(){
        $sql = "SELECT * FROM voucher";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $hasil2 = $row -> fetchAll();
        return $hasil2;
    }

    public function jumlah_nota(){
        $sql = "SELECT SUM(total) as tb FROM nota";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetch();
        return $hasil;
    }

    public function jual(){
        $sql = "SELECT nota_backup.* , barang.id_barang, barang.nama_barang, barang.harga_beli, barang.harga_jual from nota_backup 
                left join barang on barang.id_barang=nota_backup.id_barang where nota_backup.periode = ? ORDER BY id_nota DESC";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array(date('m-Y')));
        $row = $row -> fetchAll();
        return $row;
    }

    public function periode_jual($periode){
        $sql = "SELECT nota_backup.* , barang.id_barang, barang.nama_barang, barang.harga_beli, barang.harga_jual from nota_backup 
        left join barang on barang.id_barang=nota_backup.id_barang WHERE nota_backup.periode = ? ORDER BY id_nota ASC";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($periode));
        $row = $row -> fetchAll();
        return $row;
    }

    public function hari_jual($hari){
        $ex = explode('-', $hari);
        $monthNum  = $ex[1];
        $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
        if ($ex[2] > 9) {
            $tgl = $ex[2];
        } else {
            $tgl1 = explode('0', $ex[2]);
            $tgl = $tgl1[1];
        }
        $cek = $tgl.' '.$monthName.' '.$ex[0];
        $param = "%{$cek}%";
        $sql = "SELECT nota_backup.* , barang.id_barang, barang.nama_barang, barang.harga_beli, barang.harga_jual from nota_backup 
        left join barang on barang.id_barang=nota_backup.id_barang WHERE nota_backup.tanggal_input LIKE ? ORDER BY id_nota ASC";
        $row = $this-> db -> prepare($sql);
        $row -> execute(array($param));
        $row = $row->fetchAll();
        return $row;
    }

    public function reservasi_date(){
        $sql = "SELECT jadwal_konsumen.*, profile.nama FROM jadwal_konsumen left join profile on jadwal_konsumen.nama = profile.nama 
        order by jadwal_konsumen.nama desc";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function reservasi_edit($kode){
        $sql = "SELECT jadwal_konsumen.*, profile.nama FROM jadwal_konsumen 
        join profile on jadwal_konsumen.nama = profile.nama where jadwal_konsumen.kode_jadwal = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($kode));
        $hasil = $row->fetch();
        return $hasil;
    }
    // Generated Voucher Otomatis dibawah ini

    public function generateVoucherDiscount(){
        $length = 8;
        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $code = "";
        for($i = 0; $i < $length; $i++){
            $index = rand(0, strlen($characters) - 1);
            $code = $characters[$index];
        }
        return $code;
    }
}

?>