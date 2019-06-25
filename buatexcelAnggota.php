<?php
include "koneksi.php";
	header("Content-Type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Anggota.xls");	
?>
<table class="table">
	<thead class="bg-light">
		<tr class="border-0">
		<th class="border-0">No</th>
		<th class="border-0">Nama Anggota</th>
		<th class="border-0">Tanggal Lahir</th>
		<th class="border-0">Jenis Kelamin</th>
		<th class="border-0">Alamat</th>
		<th class="border-0">Telepon</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$nomer=1;
			include "koneksi.php";
			$data=mysqli_query($con, "select * from anggota") or die(mysql_error());
			while ($data2=mysqli_fetch_array($data)) {
				echo "<tr><td>$nomer</td><td>$data2[Nama]</td><td>$data2[ttl]</td><td>$data2[JK]</td><td>$data2[Alamat]</td><td>$data2[Hp]</td></tr>";
				$nomer++;
			}
			?>
</tbody>
</table>