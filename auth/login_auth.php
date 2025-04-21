<?php 
session_start();
require_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "SELECT * FROM penumpang WHERE nama='$nama'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            $_SESSION["nama"] = $nama;
            $_SESSION["penumpang_id"] = $row ["penumpang_id"];
            $_SESSION["role"] = $row ["role"];

            if($cek > 0){
                $role = mysqli_fetch_assoc($query);
                if($role['role']=="admin"){
                    $_SESSION['role'] = "admin";
                }else if($role['role']=="user"){
                    $_SESSION['role'] = "user";
                }
            }

            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' => 'Berhasil Login'
            ];
            header('Location: ../beranda.php');
            exit();
        } else {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Nama atau Password salah' 
            ];
        }
        } else {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Nama atau Password salah'
            ];
        }       
        header('Location: login.php');
        exit();
        $conn->close();
        }
?> 