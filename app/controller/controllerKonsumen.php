<?php 

class konsumen {
    
    protected $db;

    public function __construct($db){
        $this -> db = $db;
    }

    public function data_revervasi($nama){
        $sql = "SELECT account.*, profile.nama FROM account join profile on account.nama = profile.nama where account.nama = ?";
        $row = $this -> db -> prepare($sql);
        $row->execute(array($nama));
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function reservasi_konsumen($nama){
        $sql = "SELECT profile.*, account.nama, jadwal_konsumen.* FROM profile inner join account on account.nama = profile.nama inner join jadwal_konsumen on jadwal_konsumen.nama = profile.nama WHERE profile.nama = ?";
        $row = $this -> db -> prepare($sql);
        $row ->execute(array($nama));
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function reservasi_konsumen_edit($kode,$nama){
        $sql = "SELECT * FROM jadwal_konsumen where kode_jadwal = ? and nama = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($kode,$nama));
        $hasil = $row->fetch();
        return $hasil;
    }

    public function printReservasi($kode){
        $sql = "SELECT * FROM jadwal_konsumen where kode_jadwal = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($kode));
        $hasil = $row->fetch();
        return $hasil;
    }

    public function editAccount($nama){
        $sql = "SELECT account.*, profile.nama, profile.telp_kon, profile.alamat_kon FROM account join profile on 
        account.nama = profile.nama WHERE account.nama = '$nama'";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        return $hasil;
    }

    public function editReservasi($id){
        $sql = "SELECT * FROM jadwal_konsumen WHERE id = '$id'";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        return $hasil;
    }

}

?>