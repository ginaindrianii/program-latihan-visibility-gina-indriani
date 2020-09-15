<?php
class produk{
  public $namajajanan, 
         $jenis;
         protected $diskon;
         private $harga;

  public function getCetak(){
    return "$this->namajajanan $this->jenis  (Rp $this->harga)";
  }
  public function __construct($namajajanan="nama jajanan", $jenis="jenis", $harga=0, $beratbersih="berat bersih", $ukuran="ukuran"){
    $this->namajajanan = $namajajanan;
    $this->jenis=$jenis;
    $this->harga=$harga;
    $this->beratbersih=$beratbersih;
    $this->ukuran=$ukuran;
  }

    public function cetakInfo(){
        $str="{$this->namajajanan}, {$this->getCetak()}";
        return $str;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
}

class makanan extends produk{
    public $beratbersih;
    public function __construct($namajajanan, $jenis, $harga, $beratbersih){
        parent::__construct($namajajanan, $jenis, $harga);
        $this->beratbersih=$beratbersih;
    }
    public function cetakInfo(){
        $str="jajanan kekinian: ".parent::getCetak()." | berat bersih: {$this->beratbersih}";
        return $str;
    }
    public function setDiskon($diskon){
        $this->diskon=$diskon;
    }
}

class minuman extends produk{
    public $ukuran;
    public function __construct($namajajanan, $jenis, $harga, $ukuran){
        parent::__construct($namajajanan, $jenis, $harga);
        $this->ukuran=$ukuran;
    }
    public function cetakInfo(){
        $str="minuman kekinian:  ".parent::getCetak()." | ukuran: {$this->ukuran}";
        return $str;
    }
}

$produk1 = new makanan("manisan kolang kaling","manis rasa jeruk",50000,"1 kg");
$produk2 = new minuman("aneka jus","rasa jeruk",10000,"300 mill");


echo $produk1->cetakInfo();
echo "<br>";
echo $produk2->cetakInfo();
echo "<br>";
echo "<hr>";
$produk1->setDiskon(85);
echo "Diskon yang bisa anda dapatkan sebesar : ".$produk1->getHarga();