<?php
$conn = mysqli_connect("localhost", "root", " ", "siakad");

$id = $_POST['id'];
$nama = $_POST['nama'];
$nidn = $_POST['nidn'];
$jenjang = $_POST['jenjang'];

$query = "UPDATE dosen SET Nama='$nama', NIDN='$nidn', Jenjang_Pendidikan='$jenjang' WHERE ID='$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
