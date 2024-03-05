<?php
// Ambil data dari formulir jika ada
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username_input = $_POST['username']; // Ganti nama variabelnya agar tidak bentrok
    $email = $_POST['email'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $role = 'user'; // Set nilai role secara langsung
    
    // Validasi data (contoh sederhana, Anda mungkin memerlukan validasi yang lebih lengkap)
    if(empty($username_input) || empty($email) || empty($password)) {
        echo "Harap isi semua field.";
        exit;
    }

    // Hash password sebelum menyimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Buat koneksi ke database
    $servername = "localhost";
    $db_username = "root"; // Ganti dengan username database Anda
    $db_password = ""; // Ganti dengan password database Anda
    $dbname = "tugas_perpus";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Siapkan pernyataan SQL INSERT
    $sql = "INSERT INTO `user` (`username`, `password`, `email`, `nama_lengkap`, `alamat`, `role`) 
            VALUES ('$username_input', '$hashed_password', '$email', '$nama_lengkap', '$alamat', '$role')";

    // Jalankan pernyataan SQL
    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman login setelah registrasi berhasil
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
} else {
    // Jika data tidak dikirim melalui formulir, kembali ke halaman registrasi
    header("Location: registrasi.php");
    exit;
}
?>
