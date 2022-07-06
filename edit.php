<?php
require('conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_POST['edit'])) {
    $alokasi = $_POST['alokasi'];
    $jumlahTransaksi = $_POST['jumlahTransaksi'];
    $jumlahDana = $_POST['jumlahDana'];
    $namaLengkap = $_POST['namaLengkap'];
    $noHp = $_POST['noHp'];
    $email = $_POST['email'];
    $idData = $_POST['id'];
    $sql = "UPDATE dataRekapitulasi SET alokasi='$alokasi', jumlah_transaksi='$jumlahTransaksi',jumlah_dana='$jumlahDana', nama_lengkap ='$namaLengkap', noHp = '$noHp', email='$email' WHERE id ='$idData'";
    if (mysqli_query($con, $sql)) {
        echo "Data Berhasil Diubah";
        header('Location: halaman_utama.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$sql = "SELECT * FROM dataRekapitulasi WHERE id='$id'";
$result = $con->query($sql);

$row = mysqli_fetch_assoc($result);
?>

<html>

<body>
    <h1>HALAMAN EDIT</h1>
    <form action="edit.php" method="POST">
        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
        <select name="alokasi">
            <option value="Alat Pelindung Diri">Alat Pelindung Diri</option>
            <option value="Logistik Mahasiswa">Logistik Mahasiswa</option>
            <option value="Bantuan Kuota Mahasiswa">Bantuan Kuota Mahasiswa</option>
            <option value="Hand Sanitezir">Hand Sanitezir</option>
            <option value="Sembako Masyarakat">Sembako Masyarakat</option>
        </select>
        <br>
        Jumlah Transaksi: <input type="text" name="jumlahTransaksi" value="<?php echo $row['jumlah_transaksi'] ?>"><br>
        Jumlah Dana: <input type="text" name="jumlahDana" value="<?php echo $row['jumlah_dana'] ?>"><br>
        Nama Lengkap: <input type="text" name="namaLengkap" value="<?php echo $row['nama_lengkap'] ?>"><br>
        No Hp: <input type="text" name="noHp" value="<?php echo $row['noHp'] ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $row['email'] ?>"><br>


        <button type="submit" name="edit">Ubah</button>
    </form>

</body>

</html>