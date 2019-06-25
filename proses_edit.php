<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</head>
<body>

<div class="container">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form method="POST">
		<label>Nama</label>
		<input type="text" name="namaB"><br>
		<label>Tanggal Lahir</label>
		<input type="text" name="ttl"><br>
		<label>Jenis Kelamin</label>
		<select name="jk"><br>
			<option>Pilih...</option>
			<option value="Laki-Laki">Laki-Laki</option>
			<option value="Perempuan">Perempuan</option>
		</select>
		<label>Alamat</label>
		<input type="text" name="alamat"><br>
		<label>No.Hp</label>
		<input type="text" name="hp"><br>
		<input type="submit" name="sbm">
	</form>
      
    </div>
  </div>
  
</div>

</body>
</html>


<body>
	
</body>

<?php
include "koneksi.php";
if (isset($_POST['sbm'])) {
	$nama=$_GET['nama'];
	$namaBaru=$_POST['namaB'];
	$ttl=$_POST['ttl'];
	$jk=$_POST['jk'];
	$alamat=$_POST['alamat'];
	$hp=$_POST['hp'];
	mysqli_query($con,"update anggota set Nama='$namaBaru',ttl='$ttl',JK='$jk',Alamat='$alamat',Hp=$hp WHERE Nama='$nama'") or die(mysql_error());
	header("location: index.php?page=anggota");
}
?>