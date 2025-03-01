<?php

include("config.php");
session_start();
if (isset($_POST['simpan'])) {
    $kota_asal = $_POST['kota_asal'];
    $kota_tujuan = $_POST['kota_tujuan'];
    if (isset($_POST['harga'])){
        $selected_val = $_POST['harga'];
        $harga = $_POST [$selected_val];
    }
    $harga = $_POST['harga'];

    $query = "INSERT INTO rute (kota_asal, kota_tujuan, harga) VALUES('$kota_asal', '$kota_tujuan', '$harga')";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Rute berhasil ditambahkan!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menambahkan Rute: ' . mysqli_error($conn)
        ];
    }

    header('Location: rute.php');
    exit();
}

if (isset($_POST['delete'])) {
    $rute_id = $_POST['rute_id'];

    $exec = mysqli_query($conn, "DELETE FROM rute WHERE rute_id='$rute_id'");
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Rute berhasil dihapus!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menghapus rute: ' . mysqli_error($conn)
        ];
    }
    header('Location: rute.php');
    exit();
}

if (isset($_POST['update'])) {
    $rute_id = $_POST['rute_id'];
    $kota_asal = $_POST['kota_asal'];
    $kota_tujuan = $_POST['kota_tujuan'];
    if (isset($_POST['harga'])){
        $selected_val = $_POST['harga'];
        $harga = $_POST [$selected_val];
    }
    $harga = $_POST['harga'];
    $query = "UPDATE rute SET rute_id = '$rute_id', kota_asal='$kota_asal', kota_tujuan='$kota_tujuan', harga='$harga' WHERE rute_id='$rute_id'";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Rute berhasil diperbarui!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui Rute: ' . mysqli_error($conn)
        ];
    }
    header('Location: rute.php');
    exit();
}


