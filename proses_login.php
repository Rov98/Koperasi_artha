<?php
   session_start();
   require_once("koneksi.php");
   $id= $_POST['id'];
   $username = $_POST['username'];
   $pass = $_POST['password'];   
   $cekuser = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
   $hasil = mysqli_fetch_array();
   if(mysqli_num_rows() == 0) {
     echo "<div align='center'>Username Belum Terdaftar! <a href='login.php'>Back</a></div>";
   } else {
     if($pass <> $hasil['password']) {
       echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
     } else {
       $_SESSION['username'] = $hasil['username'];
       header('location:index.php');
     }
   }
?>