<?php 

class Voucher {
    private $code;
    private $discount;

    public function __construct($code, $discount){
        $this -> code = $code;
        $this -> discount = $discount;
    }

    public function getCode(){
        return $this -> code;
    }

    public function getDiscount(){
        return $this -> discount;
    }
}

class CRM {
    private $Vouchers;

    public function __construct(){
        $this -> Vouchers = array();
    }

    public function addVoucher($code, $discount){
        $voucher = new Voucher($code, $discount);
        $this -> Vouchers[] = $voucher;
    }

    public function getVoucherByCode($code){
        foreach ($this -> Vouchers as $voucher) {
            if($voucher->getCode() == $code){
                return $voucher;
            }
        }
        return null;
    }

    public function applyDiscount($code, $amount){
        $voucher = $this -> getVoucherByCode($code);
        if($voucher){
            $discount = $voucher -> getDiscount();
            $discountedAmount = $amount - ($amount * $discount);
            return $discountedAmount;
        }
        return $amount;
    }
}

?>