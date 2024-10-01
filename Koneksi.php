<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";  // Ganti dengan username database Anda, default 'root'
$password = "";      // Ganti dengan password database Anda, default kosong untuk XAMPP
$dbname = "movie";  // Ganti dengan nama database yang Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
