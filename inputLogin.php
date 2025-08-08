<?php
// Mulai session
session_start();

// Cek jika form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Atur username dan password yang valid
    $valid_username = "tik";
    $valid_password = "tik3";

    // Cek apakah username dan password cocok
    if ($username === $valid_username && $password === $valid_password) {
        // Jika cocok, set session login dan arahkan ke halaman utama
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: view_json.php"); // Link halaman tujuan setelah login
        exit;
    } else {
        // Jika tidak cocok, arahkan kembali ke halaman login dengan pesan error
        $_SESSION['error'] = "Username atau password salah.";
        header("location: indexLogin.html"); // Link file HTML login kamu
        exit;
    }
}
?>