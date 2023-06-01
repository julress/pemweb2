<?php
$conn = mysqli_connect("localhost", "root", " ", "siakad");

$id = $_GET['id'];

$query = "DELETE FROM matakuliah WHERE ID='$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
