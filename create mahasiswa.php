<?php
$conn = mysqli_connect("localhost", "root", " ", "siakad");

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$prodi = $_POST['prodi'];

$query = "INSERT INTO mahasiswa (Nama, NIM, Program_Studi) VALUES ('$nama', '$nim', '$prodi')";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
