<?php
include "koneksi.php";
	header("Content-Type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=DataPinjam.xls");	
?>
 <table class="table">
                    <thead >
                    <tr>
	                    <th>No</th>
	                    <th>Tanggal</th>
	                    <th>Nama Anggota</th>
	                    <th>Jumlah</th>
	                    <th>Bunga</th>
	                    <th>Waktu</th>
	                    <th>PerBulan</th>
	                    <th>Total</th>
	                    <th>Ket</th>
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
					$data=mysqli_query($con, "select * from data_pinjam where nama like '%$simpan_nama%' and ket = '$var_status' order by $var_sesuai") or die(mysql_error());
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
				}else{
					echo "<td style='color: red'>Belum Lunas</td>";
				}
				?>
				<?php
				$nomer++;
				echo "</tr>";
			}
            	?>
            </tbody>
</table>