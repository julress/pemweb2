<?php
$conn = mysqli_connect("localhost", "root", " ", "siakad");

$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$prodi = $_POST['prodi'];

$query = "UPDATE mahasiswa SET Nama='$nama', NIM='$nim', Program_Studi='$prodi' WHERE ID='$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
