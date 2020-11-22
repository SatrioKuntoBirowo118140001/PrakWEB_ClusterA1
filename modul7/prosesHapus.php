<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
	<?php
	    $delete = $_POST["hapus"];
	    $conn = mysqli_connect("localhost","root","");
	    mysqli_select_db($conn,"mahasiswa");
	    $hasil = mysqli_query($conn,"delete from mahasiswa where NRP like '%$delete%'");
	    echo "Data berhasil dihapus";
	    echo "<br>";
	?>
 <a href="tampilanawal.html">Kembali ke halaman utama</a>
</body>
</html>