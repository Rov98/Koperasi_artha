<?php
  include "koneksi.php";
  $user=$_POST['username'];
  $pass=$_POST['password'];
  $email=$_POST['email'];
  mysqli_query($con,"insert into admin values('$user','$pass','$email')");
  header("login_free.php")
?>