<?php

include("config.php");
session_start();
$penumpangId = $_SESSION["penumpang_id"];
if (isset($_POST['simpan'])) {
    $rute_id = $_POST["rute_id"];
    $tanggalPesan = $_POST['tanggal_pemesanan'];
    $query = "INSERT INTO pemesanan (rute_id, penumpang_id, tanggal_pemesanan) VALUES ('$rute_id', '$penumpangId', '$tanggalPesan')";

    if ($conn->query($query) === TRUE){
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Berhasil menambah pesanan.'
        ];
    }else{
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error: ' . mysqli_error($conn)
        ];
    }
    header('Location: beranda_user.php');
    exit();
}

if (isset($_POST['delete'])) {
    $pemesananID = $_POST['pemesananID'];

    $exec = mysqli_query($conn, "DELETE FROM pemesanan WHERE pemesanan_id='$pemesananID'");
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
    header('Location: beranda_user.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])){
    $pemesananId = $_POST['pemesanan_id'];
    $rute_id = $_POST["rute_id"];
    $tanggalPesan = $_POST['tanggal_pemesanan'];
    $query = "UPDATE pemesanan SET  rute_id ='$rute_id', tanggal_pemesanan = '$tanggalPesan' WHERE pemesanan_id = $pemesananId";
    $exec = mysqli_query($conn, $query);

    if ($conn->query($query)===TRUE){
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Pesanan berhasil diperbarui.'
        ];
    }else{
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui pesanan.'
        ];
    }
    header('Location: beranda_user.php');
    exit();
    }