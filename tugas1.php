<?php 
	$bilangan = 8;
	$hasil = 1;

	echo "$bilangan! = ";

	for($i = $bilangan; $i > 0; $i--){
		if($i != 1){
			echo "$i x ";
			$hasil = $hasil * $i;
		}else echo $i;
	}
	echo " = $hasil";

 ?>