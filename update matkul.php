<?php
$conn = mysqli_connect("localhost", "root", " ", "siakad");

$id = $_POST['id'];
$nama = $_POST['nama'];
$kode = $_POST['kode'];
$deskripsi = $_POST['deskripsi'];

$query = "UPDATE matakuliah SET Nama='$nama', Kode_Matakuliah='$kode', Deskripsi='$deskripsi' WHERE ID='$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
