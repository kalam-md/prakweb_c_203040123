<?php

class About
{
  public function index($nama = 'kalam', $pekerjaan = 'manajer')
  {
    echo "Halo saya $nama, saya $pekerjaan";
  }

  public function page()
  {
    echo 'about/page';
  }
}
