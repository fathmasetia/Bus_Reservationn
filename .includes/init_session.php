<?php
session_start();

$penumpangId = $_SESSION ["penumpang_id"];
$nama = $_SESSION ["nama"];

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