<?php
require('conn.php');

if (isset($_POST['tambah'])) {
    $alokasi = $_POST['alokasi'];
    $jumlahTransaksi = $_POST['jumlahTransaksi'];
    $jumlahDana = $_POST['jumlahDana'];
    $namaLengkap = $_POST['namaLengkap'];
    $noHp = $_POST['noHp'];
    $email = $_POST['email'];
    $sql = "INSERT INTO dataRekapitulasi (alokasi, jumlah_transaksi, jumlah_dana,nama_lengkap, noHp, email)
        VALUES ('$alokasi', '$jumlahTransaksi', '$jumlahDana', '$namaLengkap','$noHp', '$email')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: halaman_utama.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<html>

<body>
    <form action="tambahData.php" method="POST">
        <select name="alokasi">
            <option value="Alat Pelindung Diri">Alat Pelindung Diri</option>
            <option value="Logistik Mahasiswa">Logistik Mahasiswa</option>
            <option value="Bantuan Kuota Mahasiswa">Bantuan Kuota Mahasiswa</option>
            <option value="Hand Sanitezir">Hand Sanitezir</option>
            <option value="Sembako Masyarakat">Sembako Masyarakat</option>
        </select>
        <br>
        Jumlah Transaksi: <input type="text" name="jumlahTransaksi"><br>
        Jumlah Dana: <input type="text" name="jumlahDana"><br>
        Nama Lengkap: <input type="text" name="namaLengkap"><br>
        No Hp: <input type="text" name="noHp"><br>
        Email: <input type="text" name="email"><br>


        <button type="submit" name="tambah">Tambah</button>
    </form>

</body>

</html>