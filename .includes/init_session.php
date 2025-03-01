<?php
session_start();
//ambil data dari sesi
$userId = $_SESSION["user_id"];
$name = $_SESSION["name"];
$role = $_SESSION["role"];
// Ambil notifikasi jika ada, kemudian hapus dari sesi
$notification = $_SESSION['notification'] ?? null;
if ($notification) {
    unset($_SESSION['notification']);
}
/* periksa apakah sesi username dan role suda ada,
jika tidak arahkan ke halaman login */
if (empty($_SESSION["username"]) || empty($_SESSION["role"])) {
    $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'Silakan Login Terlebih Dahulu!'
    ];
    header('Location: ./auth/login.php');
    exit(); // pastikan script berhenti setelan pengalihan
}