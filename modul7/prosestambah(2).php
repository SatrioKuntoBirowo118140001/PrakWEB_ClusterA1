<!DOCTYPE html>
<html>
<head>
    <title>Simpan Data Mahasiswa</title>
</head>
<body>
    <h1>Simpan Data Mahasiswa</h1>
    <?php
        $nrp = $_POST["nrp"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $jurusan = $_POST["jurusan"];

        if($jurusan=="Teknik Geofisika"){
            $id_jur = "TG";
        }else if($jurusan=="Teknik Informatika"){
            $id_jur = "IF";
        }else if($jurusan=="Teknik Fisika"){
            $id_jur = "TF";
        }else if($jurusan=="Teknik Telekomunikasi"){
            $id_jur = "TT";
        }

        $conn = mysqli_connect("localhost","root","")
        or die("Koneksi gagal");
        mysqli_select_db($conn,"mahasiswa");
        echo "NRP      : $nrp <br>";
        echo "Nama     : $nama <br>";
        echo "Alamat  : $alamat <br>";
        echo "ID Jurusan : $id_jur <br>";

       $sqlstr="insert into mahasiswa(NRP,nama,alamat,id_jur) values ('$nrp','$nama','$alamat','$id_jur')";
        $hasil = mysqli_query($conn,$sqlstr);
        echo "Simpan data mahasiswa berhasil dilakukan";
        echo "<br>";
    ?>
     <a href="tampilanawal.html">Kembali ke halaman utama</a>
</body>
</html>