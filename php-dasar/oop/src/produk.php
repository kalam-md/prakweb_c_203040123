<?php

class Produk
{
  public $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0;

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }
}

// $produk1 = new Produk();
// $produk1->judul = "Naruto";
// var_dump($produk1);

// $produk2 = new Produk();
// $produk2->judul = "Gojp";
// $produk2->penulis = "Aku";
// $produk2->tambahProperti = "properti";
// var_dump($produk2);

$produk3 = new Produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi";
$produk3->penerbit = "Shonen Jump";
$produk3->harga = 100000;
// var_dump($produk3);

$produk4 = new Produk();
$produk4->judul = "Jujutsu";
$produk4->penulis = "Kalam";
$produk4->penerbit = "Shonen Walk";
$produk4->harga = 200000;

echo "Komik: " . $produk3->getLabel();
echo "<hr>";
echo "Komik: " . $produk4->getLabel();;
