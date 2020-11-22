<!DOCTYPE html>
<html>
<head>
	<title>Tugas 2</title>
</head>
<body>
	   <h1>Hasil warna dan harga</h1>
        <form action="" method="post">
        Nama        : <br>
        <input type="text" name="nama"><br>
        Warna (dengan kode warna contoh : #fff ) : <br>
        <input type="text" name="warna"><br>
        <input type="submit" value="Tampilkan" name="tampilkan">
    </form>

    <?php 
	    $nama = $_POST['nama'];
	    $warna = $_POST['warna'];

	    function ubahWarna($warna,$nama,$harga){
            echo '<font color="'.$warna.'">'.$nama.'</font><br>';
            echo '<font color="'.$warna.'">Dengan harga '.$harga.'</font><br>';
        }

	    if(isset($_POST["tampilkan"])){
	    	$jumlahkarakter = strlen($nama);
	        if($jumlahkarakter <= 10){
	            $harga = 300*$jumlahkarakter;
	        }else if($jumlahkarakter<=20){
	            $harga = 500*$jumlahkarakter;
	        }else{
	            $harga = 700*$jumlahkarakter;
	        }
	        if($warna!=NULL){
	            ubahWarna($warna,$nama,$harga);
	        }else{
	            $warna='red';
	            ubahWarna($warna,$nama,$harga);
	        }
	    	}
	     ?>
</body>
</html>