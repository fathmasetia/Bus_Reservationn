<?php
require_once("../config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $kontak = $_POST["kontak"];
    $role = $_POST["role"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO penumpang (nama, password, kontak, role)
    VALUES ( '$nama', '$hashedPassword', '$kontak', '$role')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Registrasi Berhasil!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal Registrasi: ' . mysqli_error($conn)
        ];
    }
    header('Location: login.php');
    exit();
}
$conn->close();
?>