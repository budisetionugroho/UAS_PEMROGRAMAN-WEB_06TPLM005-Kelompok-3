<?php
require('conn.php');
$id = $_GET['id'];
$sql = "DELETE FROM dataRekapitulasi WHERE id='$id'";

if ($con->query($sql) === TRUE) {
    echo "<script>alert('data berhasil dihapus')</script>";
    header('Location: halaman_utama.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
