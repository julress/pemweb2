<?php
// Informasi koneksi database
$host = "localhost"; 
$username = "root"; 
$password = " "; 
$database = "siakad"; 

// Membuat koneksi menggunakan MySQLi
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Jika koneksi berhasil, dapat melakukan operasi database

// Menutup koneksi
$koneksi->close();
?>
