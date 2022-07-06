<?php
require('conn.php');
session_start();
if (isset($_POST['login'])) {

    // menghilangkan backshlases
    $username = $_POST['username'];
    // menghilangkan backshlases
    $password = $_POST['password'];

    //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
    if (!empty(trim($username)) && !empty(trim($password))) {

        //select data berdasarkan username dari database
        $query      = "SELECT * FROM user WHERE username = '$username' and password ='$password'";
        $result     = mysqli_query($con, $query);
        $rows       = mysqli_num_rows($result);
        $_SESSION['username'] = $username;
    } else {
        $error =  'Data tidak boleh kosong !!';
    }
}
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
$sql = "SELECT * FROM dataRekapitulasi";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="tambahData.php">Tambah Data Rekaptulasi</a>
    <table class="center" border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Alokasi</th>
            <th>Jumlah Transaksi</th>
            <th>Jumlah Dana</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php while (
            $row = mysqli_fetch_assoc($result)
        ) : ?>
            <tr>

                <td><?= $i++; ?></td>
                <td><?= $row['alokasi'] ?></td>
                <td><?= $row['jumlah_transaksi'] ?></td>
                <td><?= $row['jumlah_dana'] ?></td>
                <td><a onclick="return confirm('yakin?')" href="hapus.php?id=<?php echo $row['id'] ?>">Hapus</a> | <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a></td>
            </tr>
        <?php endwhile; ?>

    </table>
    <br>
    <br>
    <a href="logout.php">Logout</a>
</body>

</html>