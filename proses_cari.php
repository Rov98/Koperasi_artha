<?php
include "koneksi.php";	
$cari=$_POST['crF'];
	$data=mysqli_query($con, "select * from anggota where Nama='$cari'") or die(mysql_error());
	while ($data2=mysqli_fetch_array($data)) {
	echo "<tr><td>$nomer</td><td>$data2[Nama]</td><td>$data2[ttl]</td><td>$data2[JK]</td><td>$data2[Alamat]</td><td>$data2[Hp]</td>";
?>