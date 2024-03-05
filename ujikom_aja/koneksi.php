<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "tugas_perpus";

// Buat koneksi
$conn = new mysqli($localhost, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}



?>
