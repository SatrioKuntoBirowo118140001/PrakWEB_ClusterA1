<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html>
<head>
<!-- Csrf Token -->
<meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
</head>
<style type="text/css">
	<!-- Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</style>
<body>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</<nav class="navbar navbar-dark bg-primary">
	  <a class="navbar-brand" href="index.php" style="color: #fff;">
	  </a>
	</nav>
 
	<div class="container">
		<h2 align="center" style="margin: 30px;">CRUD Ajax No Loading</h2>
 
        <form method="post" class="form-data" id="form-data">  
        	<div class="row">
        		<div class="col-sm-3">
        			<div class="form-group">
						<label>Nama Mahasiswa</label>
						<input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" required="true">
					</div>
        		</div>
        		<div class="col-sm-3">
        			<div class="form-group">
						<label>NIM</label>
						<input type="text" name="NIM" id="NIM" class="form-control" required="true">
					</div>
        		</div>
	            <div class="col-sm-3">
	            	<div class="form-group">
						<label>Prodi</label>
						<select name="jurusan" id="jurusan" class="form-control" required="true">
							<option value=""></option>
							<option value="Sistem Informasi">Sistem Informasi</option>
							<option value="Teknik Informatika">Teknik Informatika</option>
						</select>
					</div>
	            </div>
	            <div class="col-sm-3">
	            	<div class="form-group">
						<label>Angkatan</label>
						<input type="text" name="Angkatan" id="Angkatan" class="form-control" required="true">
					</div>
	            </div>

	            </div>
			</div>
			
			
			<div class="form-group">
				<button type="button" name="simpan" id="simpan" class="btn btn-primary">
					<i class="fa fa-save"></i> Simpan
				</button>
			</div>
        </form>
        <hr>
 
		<div class="data"></div>
		
    </div>

 
    <div class="text-center">© <?php echo date('Y'); ?> Copyright: Satrio Kunto
	</div>
	<script type="text/javascript">
	$(document).ready(function(){
            //Mengirimkan Token Keamanan
            $.ajaxSetup({
               headers : {
                'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
               }
            });
 
	    $('.data').load("data.php");
	});
</script>
</body>
</html>