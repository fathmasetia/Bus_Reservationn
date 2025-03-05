<?php

include("config.php");
session_start();
if (isset($_POST['simpan'])) {
    $tanggal_pemesanan = $_POST['tanggal_pemesanan'];
    $query = "INSERT INTO pemesanan VALUES('$tanggal_pemesanan')";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Pesanan berhasil ditambahkan!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menambahkan pesanan: ' . mysqli_error($conn)
        ];
    }

    header('Location: pesanan.php');
    exit();
}

if (isset($_POST['delete'])) {
    $catID = $_POST['catID'];

    $exec = mysqli_query($conn, "DELETE FROM pemesanan WHERE pemesanan_id='$catID'");
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Pesanan berhasil dihapus!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menghapus pesanan: ' . mysqli_error($conn)
        ];
    }
    header('Location: pesanan.php');
    exit();
}

if (isset($_POST['update'])) {
    $catID = $_POST['catID'];
    $tanggal_pemesanan = $_POST['tanggal_pemesanan'];
    $query = "UPDATE pemesanan SET tanggal_pemesanan = '$nama' WHERE pemesanan_id='$catID'";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Pesanan berhasil diperbarui!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Pesanan memperbarui kategori: ' . mysqli_error($conn)
        ];
    }
    header('Location: pesanan.php');
    exit();
}
