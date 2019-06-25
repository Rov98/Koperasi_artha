<?php
if ($_SESSION['login']) {
?>
<link rel="stylesheet" type="text/css" href="css/pop_up.css">
<html>
<head>
	<title>Koperasi Artha Mandiri</title>
</head>
<script type="text/javascript">
	 function hapus(nama){
        var jawab=confirm(nama+" Lunas?");
        if (jawab==true) {
            document.location="proses_hapus_pinjam.php?nama="+nama;
        }else{
            location.reload();
        }
    }
</script>
<body>
<form action="" method="post">
		<form action="" method="post">
	<!-- Div Untuk bar atas-->
	<div style="margin-left: 15px"> 
		<select class="form-control-sm" id="sesuai" name="sesuai">
			<option value="nama">Nama</option>
			<option value="Jumlah">Jumlah</option>
		</select>

		<select class="form-control-sm" id="status" name="status">
			<option value="Belum Lunas">Belum Lunas</option>
			<option value="Lunas">Lunas</option>
		</select>
		
		
			<input class="form form-control-sm" type="text" name="tekscari" size="24" />
			<input class="btn-sm btn-outline-dark" style="margin-bottom: 10px" type="submit" name="cari" id="cari" value="Cari" />
			<input class="btn-sm btn-outline-dark" style="margin-bottom: 10px" type="submit" name="semua" id="semua" value="Tampilkan Semua" onclick="location.reload()" />

			<button name="excel" class="bnt btn-outline-default btn-sm" onclick="window.open('buatexcelPinjam.php','_blank')"><span class="fa fa-file-excel"></span>Ekspor</button>
			<button name="pdf" class="bnt btn-outline-default btn-sm" onclick="window.open('buatpdfPinjam.php','_blank')"><span class="fa fa-file-pdf"></span>Ekspor</button>

		</div>
	</form>
	<div class="col-xl-12 col-lg-12 col-md-8 col-sm-12 col-12">
    <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                    <thead class="bg-light">
                    <tr class="border-1">
	                    <th class="border-1">No</th>            
	                    <th class="border-1">Tanggal</th>
	                    <th class="border-1">Nama Anggota</th>
	                    <th class="border-1">Jumlah</th>
	                    <th class="border-1">Bunga</th>
	                    <th class="border-1">Waktu</th>
	                    <th class="border-1">PerBulan</th>
	                    <th class="border-1">Total</th>
	                    <th class="border-1">Ket</th>
	                    <th class="border-1" style="text-align: center;">Aksi</th>
                	</tr>
            </thead>
            <tbody>
			<?php
				$nomer=1;
				include "koneksi.php";
				$data;
				if (isset($_POST['cari'])) {
					$simpan_nama=$_POST['tekscari'];
					$var_sesuai=$_POST['sesuai'];
					$var_status=$_POST['status'];
					$data=mysqli_query($con, "select * from `data_pinjam` where nama like '%$simpan_nama%' and ket = '$var_status' order by $var_sesuai") or die(mysql_error());
				}else{
					$data=mysqli_query($con, "select * from data_pinjam") or die(mysql_error());
				}
				while ($data2=mysqli_fetch_array($data)) {
				echo "<tr><td>$nomer</td><td>$data2[tanggal]</td><td>$data2[nama]</td><td>Rp";
				echo number_format("$data2[jumlah]",'0','.','.');
				echo "</td><td>Rp";
				echo number_format("$data2[bunga]",'0','.','.');
				echo "</td><td>$data2[waktu]</td><td>";
				echo "Rp$data2[perbulan]</td><td>Rp";
				echo number_format("$data2[total]",'0','.','.');
				echo "</td>";
				if ($data2['total']<=0) {
					echo "<td style='color: green'>Lunas</td>";
					$data2['ket']="Lunas";
				}else{
					echo "<td style='color: red'>Belum Lunas</td>";
					$data2['ket']="Belum Lunas";
				}
				?>
				<td>
				<button class="btn btn-warning btn-sm" onclick="hapus(<?php echo "'$data2[nama]'"; ?>);"><span class="far fa-trash-alt"></span> Hapus</button>
				<button id="rwyt" class="btn btn-warning btn-sm" style="margin-left: 5px" onclick="document.getElementById('<?=$data2['nama']?>').style.display='block'"><span class="fa fa-folder-open"></span> Riwayat</button>
				<div id="<?=$data2['nama']?>" class="modal pop_up">
                              <span onclick="document.getElementById('<?=$data2['nama']?>').style.display='none'" 
                            class="close" title="Close Modal" style="margin-right: 10px;">&times;</span>

                              <!-- Modal Content -->
                              <form method="POST" class="form-sm form-control ">
                                <table>
                                	<thead>
                                	<tr>
                                		<th class="border-1">No</th>
                                		<th class="border-1">Nama</th>
                                		<th class="border-1">Tanggal</th>
                                		<th class="border-1">Total</th>
                                		<th class="border-1">Bayar</th>
                                	</tr>
                                	</thead>
                                	<tbody>
                                		<?php
                                		$nomerT = 1;
                                		$nama_rw;
                                			$riwayat=mysqli_query($con, "select * from riwayat where nama = '$data2[nama]'") or die(mysql_error());
				while ($riwayat_clear=mysqli_fetch_array($riwayat)) {
				echo "<tr><td id='nama_rw'>$nomerT</td><td>$riwayat_clear[nama]</td><td>$riwayat_clear[tanggal]</td><td>";
				echo number_format("$riwayat_clear[total]").(",-").("</td><td>");
				echo number_format("$riwayat_clear[bayar]").(",-").("</td>");
										$nomerT++;
										}
                                		?>
                                			<button name="pdf" id="pdf_out" class="bnt btn-outline-default btn-sm" onclick="window.open('buatpdfRiwayat.php','_blank')"><span class="fa fa-file-pdf"></span>Ekspor</button>
                                	</tbody>
                                </table>
                                </form>
                            </div> 
                            </td>
                            
				<?php
				$nomer++;

				echo "</tr>";
			}
            	?>
            </tbody>
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