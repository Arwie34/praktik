<?php
session_start();
if ($_SESSION['status'] !== "login") {
    header('Location: form-login.php');
}
include("config.php");

if (isset($_POST['register'])) {
    $username = $_POST['iUsername'];
    $password = $_POST['iPassword'];

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (username, password) VALUE ('$username','$hashPassword')";
    $query = mysqli_query($db,$sql);

    if ($query) {
        header('Location: form-login.php?status=sukses');
    } else {
        die("gagal mendaftarkan akun...");
    }
} else {
    die("gagal terhubung dengan situs...");
}
?>