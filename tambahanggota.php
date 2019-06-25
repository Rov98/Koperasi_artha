<html>
<body>

</body>
</html>
<form action="" method="POST">
		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" id="nama" name="nama" required>
		</div>			
		<div class="form-group">
			<label for="ttl">Tanggal Lahir</label>
			<input type="text" class="form-control" id="ttl" name="ttl" required>
		</div>	
		<div class="form-group">
			<label for="jk">Jenis Kelamin</label>
			<select class="form form-control" id="jk" name="jk">
				<option value="-">Pilih...</option>
				<option value="Laki Laki">Laki Laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</div>

		<div class="form-group">
			<label for="alamat">Alamat</label>
			<input type="text" class="form-control" id="alamat" name="alamat" required>
		</div>	
		<div class="form-group">
			<label for="telp">No. Telp</label>
			<input type="text" class="form-control" id="telp" name="telp" required>
		</div>	
		<button type="submit" class="btn btn-success btn-md" name="simpan">Simpan</button>
		
	</form>
<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
	$nama=$_POST["nama"];
	$ttl=$_POST["ttl"];
	$jk=$_POST["jk"];
	$alamat=$_POST["alamat"];
	$telp=$_POST["telp"];
	
	
}
?>