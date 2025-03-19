<?php 
session_start();
require_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM penumpang WHERE nama='$nama'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            $_SESSION["nama"] = $row["nama"];
            $_SESSION["penumpang_id"] = $row ["penumpang_id"];
            $_SESSION["role"] = $row ["role"];

            if($row['role']=="admin"){
                $_SESSION['nama'] = $nama;
                $_SESSION['role'] = "admin";
                header("Location: ../beranda.php");

            }else if($row['role']=="user"){
                $_SESSION['nama'] = $nama;
                $_SESSION['role'] = "user";
                header("Location: ../beranda_user.php");
            }
            //header('Location: ../beranda.php');
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
        }
        $conn->close();
?> 