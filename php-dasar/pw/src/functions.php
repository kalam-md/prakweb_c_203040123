<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_c_203040123_pw');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nama_buku = htmlspecialchars($data['nama_buku']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
  $stok = htmlspecialchars($data['stok']);
  // $gambar = htmlspecialchars($_FILES['gambar']["name"]);

  $rand = rand();
  $ekstensi =  ['png', 'jpg', 'jpeg', 'gif', 'webp'];
  $filename = $_FILES['gambar']["name"];
  $ukuran = $_FILES['gambar']["size"];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);

  if (!in_array($ext, $ekstensi)) {
    header("location:tambah.php?alert=gagal_ekstensi");
  } else {
    if ($ukuran < 1044070) {
      $xx = $rand . '_' . $filename;
      move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/' . $rand . '_' . $filename);
      $query =
        "INSERT INTO buku VALUES (null, '$nama_buku', '$pengarang', '$tahun_terbit', '$stok', '$xx');";
      mysqli_query($conn, $query);
      header("location:index.php?alert=berhasil");
    } else {
      header("location:index.php?alert=gagal_ukuran");
    }
  }

  return mysqli_affected_rows($conn);
}

function edit($data)
{
  $conn = koneksi();

  $id = htmlspecialchars($data['id']);
  $nama_buku = htmlspecialchars($data['nama_buku']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
  $stok = htmlspecialchars($data['stok']);
  // $gambar = htmlspecialchars($_FILES['gambar']["name"]);

  $rand = rand();
  $ekstensi =  ['png', 'jpg', 'jpeg', 'gif', 'webp'];
  $filename = $_FILES['gambar']["name"];
  $ukuran = $_FILES['gambar']["size"];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);

  if (!in_array($ext, $ekstensi)) {
    header("location:tambah.php?alert=gagal_ekstensi");
  } else {
    if ($ukuran < 1044070) {
      $lama = "SELECT gambar FROM buku WHERE id='$id'";
      $data_lama = mysqli_query($conn, $lama);
      $foto_lama = mysqli_fetch_array($data_lama);
      unlink("img/" . $foto_lama['gambar']);

      $xx = $rand . '_' . $filename;
      move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/' . $rand . '_' . $filename);
      $query =
        "UPDATE buku SET nama_buku='$nama_buku', pengarang='$pengarang', tahun_terbit='$tahun_terbit', stok='$stok', gambar='$xx' WHERE id='$id'";
      mysqli_query($conn, $query);
      header("location:index.php?alert=berhasil");
    } else {
      header("location:index.php?alert=gagal_ukuran");
    }
  }

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  $lama = "SELECT gambar FROM buku WHERE id='$id'";
  $data_lama = mysqli_query($conn, $lama);
  $foto_lama = mysqli_fetch_array($data_lama);
  unlink("img/" . $foto_lama['gambar']);

  mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}
