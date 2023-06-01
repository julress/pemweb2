<?php
$conn = mysqli_connect("localhost", "root", " ", "siakad");

$nama = $_POST['nama'];
$nidn = $_POST['nidn'];
$jenjang = $_POST['jenjang'];

$query = "INSERT INTO dosen (Nama, NIDN, Jenjang_Pendidikan) VALUES ('$nama', '$nidn', '$jenjang')";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
