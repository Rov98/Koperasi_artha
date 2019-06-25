<?php  
include "koneksi.php";

$nama=$_GET["nama"];
mysqli_query($con,"delete from anggota where Nama='$nama'")or die(mysql_error());

header("location: index.php?page=anggota");
?>