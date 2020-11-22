<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $delete = $_POST["delete"];
    $conn = mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"kampus");
    $hasil = mysqli_query($conn,"delete from mahasiswa where NRP like '%$delete%'");
    echo "Data berhasil dihapus";
    echo "<br>";
?>
 <a href="index.html">Kembali ke halaman utama</a>
</body>
</html>