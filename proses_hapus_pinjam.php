<?php  
include "koneksi.php";

$nama=$_GET["nama"];
mysqli_query($con,"delete from data_pinjam where nama = '$nama'")or die(mysql_error());
mysqli_query($con,"delete from riwayat where nama = '$nama'")or die(mysql_error());

header("location: index.php?page=datapinjam");
?>