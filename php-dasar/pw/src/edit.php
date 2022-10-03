<?php

require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['edit'])) {
  if (edit($_POST) > 0) {
    echo "<script>
            alert('data berhasil diedit');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal diedit!";
  }
}

// ambil id dari URL
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$b = query("SELECT * FROM buku WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Buku</title>
  <link href="../../../assets/dist/output.css" rel="stylesheet">
  <style>
    body {
      background-color: #DFDBE5;
      background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%234b2a80' fill-opacity='0.4' fill-rule='evenodd'%3E%3Cpath d='M5 0h1L0 6V5zM6 5v1H5z'/%3E%3C/g%3E%3C/svg%3E");
    }
  </style>
</head>

<body>

  <div class="max-w-5xl mx-auto bg-gray-100 p-12 m-12 rounded-md drop-shadow-xl">
    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
      <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
        <div class="">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Mengedit Data</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">Halaman mengedit data buku.</p>
        </div>
        <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-semibold transition ease-in-out delay-150 hover:-translate-y-0.5 hover:scale-110 duration-300"><a href="index.php">Kembali</a></button>
      </div>
      <div class="border-t border-gray-200">
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $b['id']; ?>">
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
              <div class="">
                <label for="nama_buku" class="block text-sm font-medium text-gray-700">Nama Buku</label>
                <input type="text" required name="nama_buku" id="nama_buku" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $b['nama_buku']; ?>">
              </div>

              <div class="">
                <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang</label>
                <input type="text" required name="pengarang" id="pengarang" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $b['pengarang']; ?>">
              </div>

              <div class="">
                <label for="tahun_terbit" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                <input type="date" required name="tahun_terbit" id="tahun_terbit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $b['tahun_terbit']; ?>">
              </div>

              <div class="">
                <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" required name="stok" id="stok" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $b['stok']; ?>">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700">Photo</label>
                <div class="mt-1 flex items-center">
                  <img src="./img/<?= $b['gambar']; ?>" width="220" style="display: block;" class="img-preview drop-shadow-xl rounded-xl border border-spacing-1">
                  <input type="file" required name="gambar" class="gambar ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" onchange="previewImage()">
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button type="submit" name="edit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out delay-150 hover:-translate-y-0.5 hover:scale-110 duration-300">Edit Data</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="index.js"></script>
</body>

</html>