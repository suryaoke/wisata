<?php

session_start();
$_SESSION['update_success'] = '  Data Berhasil Diubah';
include "../koneksi.php";

// Mendapatkan data dari form
$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];

// Membuat query untuk mengubah data kategori
$ubah = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = 
'$nama_kategori' WHERE id_kategori = '$id_kategori'");

if ($ubah) {
    echo "<script>
    window.location.href='../?page=kategori/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
    window.location.href='kategori/index';
    </script>";
}
