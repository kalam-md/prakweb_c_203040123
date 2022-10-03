<?php

class Produk
{
  public $judul, $penulis, $penerbit, $harga;

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }
}

$produk1 = new Produk("Naruto", "Masashi", "Shonen Jump", 10000);

$produk2 = new Produk("Jujutsu", "Kalam", "Shonen Walk", 20000);

$produk3 = new Produk();

echo "Komik: " . $produk1->getLabel();
echo "<hr>";
echo "Komik: " . $produk2->getLabel();
echo "<hr>";
echo "Komik: " . $produk3->getLabel();
