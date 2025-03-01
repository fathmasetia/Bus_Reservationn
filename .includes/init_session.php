<?php
session_start();

$nama = $_SESSION ["nama"];
//$penumpang_id = $_SESSION["penumpang_id"];
//$kontak = $_SESSION ["kontak"];

$notification = $_SESSION['notification'] ?? null;
if ($notification){
    unset($_SESSION['notification']);
}

if (empty($_SESSION["nama"])){
    $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'Silahkan login terlebih dahulu!'
    ];
    header('Location: ./auth/login.php');
    exit();
}