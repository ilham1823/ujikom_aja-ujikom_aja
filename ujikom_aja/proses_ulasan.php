<?php
    session_start();

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tugas_perpus";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data yang dikirimkan melalui formulir
    $Judul = $_POST['Judul'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];
    $Buku_ID = $_POST['Buku_ID']; // Ambil Buku_ID dari formulir

    // Lakukan validasi data (opsional)

    // Proses pengiriman ulasan ke database
    // Query untuk menyimpan ulasan ke dalam tabel ulasanbuku
    $sql = "INSERT INTO buku_ulasan (user_ID, Buku_ID, ulasan, rating) VALUES ('$_SESSION[user_ID]', '$buku_ID', '$ulasan', '$rating')";

    if ($conn->query($sql) === TRUE) {
        header("location: ulasan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();