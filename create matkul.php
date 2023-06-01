<?php
$conn = mysqli_connect("localhost", "root", " ", "siakad");

$nama = $_POST['nama'];
$kode = $_POST['kode'];
$deskripsi = $_POST['deskripsi'];

$query = "INSERT INTO matakuliah (Nama, Kode_Matakuliah, Deskripsi) VALUES ('$nama', '$kode', '$deskripsi')";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
