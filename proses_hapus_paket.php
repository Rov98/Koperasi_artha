<?php  
include "koneksi.php";

$jml=$_GET["jml"];
mysqli_query($con,"delete from paketan WHERE Jumlah = $jml")or die(mysql_error());

header("location: index.php?page=paketan");
?>