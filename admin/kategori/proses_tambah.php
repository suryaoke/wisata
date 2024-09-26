<?php

session_start();
$_SESSION['save_success'] = '  Data Berhasil Ditambahkan';
include "../koneksi.php";
$nama_kategori = $_POST['nama_kategori'];

// Memperbaiki query dengan menambahkan kurung tutup yang hilang
$tambah = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')");

if ($tambah) {
    echo "<script>
        window.location.href='../?page=kategori/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
      window.location.href='../?page=kategori/index';
    </script>";
}
