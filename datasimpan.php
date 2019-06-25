<?php  
if($_SESSION['login']){
?>
<html>
<head>
	<title>Koperasi Artha Mandiri</title>
</head>
<body>
<form action="" method="post">
	<div style="margin-left: 15px"> <!-- Div Untuk bar atas-->
		<select class="form-control-sm" name="Masukkan">
			<option value="nama">Nama</option>
			<option value="nomor">No</option>
		</select>

		<select class="form-control-sm" name="Masukkan">
			<option value="nama">Semua Jenis</option>
			<option value="nomor">Simpanan Pokok</option>
			<option value="nomor">Simpanan Wajib</option>
			<option value="nomor">Simpanan Sukarela</option>
		</select>
		
		
			<input class="form form-control-sm" type="text" name="tekscari" size="24" />
			<input class="btn-sm btn-outline-dark" style="margin-bottom: 10px" type="submit" name="cari" value="Cari" />
			<input class="btn-sm btn-outline-dark" style="margin-bottom: 10px" type="submit" name="semua" value="Tampilkan Semua" />

			<!--<tr><button onclick="tambah(<?php echo "$data2[nim]"; ?>)">Tambah</button></tr>
	                            <tr><button onclick="cetak(<?php echo "'$data2[nama]',$data2[nim]"; ?>)">cetak</button></tr>-->
		</div>

	</form>
	<div class="col-xl-12 col-lg-12 col-md-8 col-sm-12 col-12">
    <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                    <thead class="bg-light">
                    <tr class="border-0">
                    <th class="border-0">No</th>            
                    <th class="border-0">Tanggal</th>
                    <th class="border-0">Nama Anggota</th>
                    <th class="border-0">Jenis</th>
                    <th class="border-0">Jumlah</th>
                    <th class="border-0">Keterangan</th>
                    <th class="border-0">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
</div>
</div>
</body>
</html>
<?php  
}else{
	header("location: login_free.php");
}
?>