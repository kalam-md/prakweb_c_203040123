<?php

require 'functions.php';

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$previous = $halaman - 1;
$next = $halaman + 1;
$data = query("SELECT * FROM buku");
$jumlah_data = count($data);
$total_halaman = ceil($jumlah_data / $batas);
$halaman_awal = ($batas * $halaman) - $batas;
// var_dump($halaman_awal);
// die();
$buku = query("SELECT * FROM buku LIMIT $halaman_awal, $batas");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="./dist/output.css" rel="stylesheet">
  <style>
    body {
      background-color: #DFDBE5;
      background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%234b2a80' fill-opacity='0.4' fill-rule='evenodd'%3E%3Cpath d='M5 0h1L0 6V5zM6 5v1H5z'/%3E%3C/g%3E%3C/svg%3E");
    }
  </style>
</head>

<body>

  <div class="max-w-7xl mx-auto bg-gray-100 p-12 m-12 rounded-md drop-shadow-xl">
    <!-- <div class="max-w-2xl mx-auto flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3
    mb-4 rounded" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
      </svg>
      <p>Something happened that you should know about.</p>
    </div> -->

    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
      <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
        <div class="">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Tampilkan Data</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">Halaman menampilkan data buku.</p>
        </div>
        <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-semibold transition ease-in-out delay-150 hover:-translate-y-0.5 hover:scale-110 duration-300"><a href="tambah.php">Tambah Buku</a></button>
      </div>
      <div class="border-t border-gray-200">
        <dl>
          <table class="table-auto min-w-max w-full">
            <thead class="bg-gray-100 text-gray-600 text-sm leading-normal">
              <tr class="mt-2">
                <th class="py-3 px-6 text-left">#</th>
                <th class="py-3 px-6 text-left">Nama Buku</th>
                <th class="py-3 px-6 text-left">Pengarang</th>
                <th class="py-3 px-6 text-left">Tahun Terbit</th>
                <th class="py-3 px-6 text-left">Stok</th>
                <th class="py-3 px-6 text-left">Gambar</th>
                <th class="py-3 px-6 text-left">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
              <?php $i = $halaman_awal + 1;
              foreach ($buku as $b) : ?>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                  <td class="py-3 px-6 text-left font-semibold"><?= $i++; ?></td>
                  <td class="py-3 px-6 text-left font-semibold"><?= $b['nama_buku']; ?></td>
                  <td class="py-3 px-6 text-left font-semibold"><?= $b['pengarang']; ?></td>
                  <td class="py-3 px-6 text-left font-semibold"><?= $b['tahun_terbit']; ?></td>
                  <td class="py-3 px-6 text-left font-semibold"><?= $b['stok']; ?></td>
                  <td class="py-3 px-6 text-left font-semibold"><img class="bg-cover bg-center rounded" src="img/<?= $b['gambar']; ?>" width="60"></td>
                  <td class="py-5 px-6 flex justify-start gap-2">
                    <!-- <a href="edit.php?id=<?= $b['id']; ?>" class="">Edit</a>
                    <span>|</span>
                    <a href="hapus.php?id=<?= $b['id']; ?>" class="">Hapus</a> -->
                    <a href="edit.php?id=<?= $b['id']; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-indigo-700 transition ease-in-out delay-150 hover:-translate-y-0.5 hover:scale-110 duration-300">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                      </svg>
                    </a>
                    <a href="hapus.php?id=<?= $b['id']; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-700 transition ease-in-out delay-150 hover:-translate-y-0.5 hover:scale-110 duration-300">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                      </svg>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </dl>
      </div>

      <div class="flex items-center justify-between bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
          <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
          <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
          <div>
            <p class="text-sm text-gray-700">
              Menampilkan
              <span class="font-medium"><?= $batas; ?></span>
              data dari
              <span class="font-medium"><?= $jumlah_data; ?></span>
              hasil
            </p>
          </div>
          <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
              <a <?php if ($halaman > 1) {
                    echo "href='?halaman=$previous'";
                  } ?> class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
                <span class="sr-only">Previous</span>
                <!-- Heroicon name: mini/chevron-left -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                </svg>
              </a>

              <?php
              for ($x = 1; $x <= $total_halaman; $x++) :
              ?>
                <?php if ($x != $halaman) : ?>
                  <a href="?halaman=<?php echo $x ?>" aria-current="page" class="relative z-10 inline-flex border border-gray-300 items-center px-4 py-2 text-sm font-medium focus:z-20"><?php echo $x; ?></a>
                <?php else : ?>
                  <a href="?halaman=<?php echo $x ?>" aria-current="page" class="relative z-10 inline-flex items-center border border-indigo-500 bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-600 focus:z-20"><?php echo $x; ?></a>
                <?php endif; ?>
              <?php
              endfor;
              ?>

              <a <?php if ($halaman < $total_halaman) {
                    echo "href='?halaman=$next'";
                  } ?> class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
                <span class="sr-only">Next</span>
                <!-- Heroicon name: mini/chevron-right -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
              </a>
            </nav>
          </div>
        </div>
      </div>

    </div>

  </div>

</body>

</html>