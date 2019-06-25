<?php
include "koneksi.php";
session_start();
if (isset($_POST['sent'])) {
  $user=$_POST['login'];
  $pass=$_POST['password'];
  $data=mysqli_query($con,"select * from admin where username='$user' and password=$pass") or die(mysql_error());
  while ($data2=mysqli_fetch_array($data)) {
    if ($user==$data2['username']&&$pass==$data2['password']) {
      $_SESSION['login']=$user;
     header("Location: index.php?page=home");
  }else{
    header("Location: login_free.php");
  }
}
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Koperasi Artha Mandiri</title>
  <link rel="icon" type="image/png" href="favicon.ico" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
      <style>
/*variables*/ 
/*general style*/
/*google font*/
@import "https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700)";
body {
  <?php
  $set="1bkc";
  sleep(3);
  $set="2bck";
    echo "background: url($set.jpeg) no-repeat center center fixed;";
  ?>
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
/*Login form style*/
/* === Logo === */
.logo {
  background-position: center;
  height: 60px;
  width: 140px;
  margin: 100px auto 30px auto;
}

/* === Form === */
.form {
  width: 100%;
}
.form .field {
  position: relative;
  margin: 0 50px;
}
.form .field i {
  font-size: 18px;
  left: 0px;
  top: 0px;
  position: absolute;
  height: 44px;
  width: 44px;
  color: #f7f3eb;
  background: #676056;
  text-align: center;
  line-height: 44px;
  transition: all 0.3s ease-out;
  pointer-events: none;
}

/* === Login styles === */
.login {
  position: relative;
  margin: 100px auto;
  width: 370px;
  height: 315px;
  background: white;
  border-radius: 3px;
}
.login:before {
  content: '';
  position: absolute;
  top: -8px;
  right: -8px;
  bottom: -8px;
  left: -8px;
  z-index: -1;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 4px;
}
.login h1 {
  line-height: 55px;
  font-size: 24px;
  font-weight: bold;
  font-family: 'Open Sans', sans-serif;
  text-transform: uppercase;
  color: #fff;
  text-align: center;
  background: #1abc9c;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.login .submit {
  text-align: center;
}
.login p:first-child {
  margin-top: 30px;
}
.login p .remember {
  float: left;
}
.login p .remember label {
  color: #a7a599;
  font-size: 12px;
  cursor: pointer;
}
.login p .forgot {
  float: right;
  margin-right: 50px;
}
.login p .forgot a {
  color: #a7a599;
  font-size: 12px;
  text-decoration: none;
  font-style: italic;
  transition: all 0.3s ease-out;
}
.login p .forgot a:hover {
  color: #f2672e;
}

/*input style*/
/* === Input Form === */
::-webkit-input-placeholder {
  color: #ded9cf;
  font-family: 'Open Sans';
}

:-moz-placeholder {
  color: #ded9cf !important;
  font-family: 'Open Sans';
}

.form input[type=text], input[type=password] {
  font-family: 'Open Sans', Calibri, Arial, sans-serif;
  font-size: 14px;
  font-weight: 400;
  padding: 10px 15px 10px 55px;
  position: relative;
  width: 200px;
  height: 24px;
  color: #676056;
  border: none;
  background: #f7f3eb;
  color: #777;
  transition: color 0.3s ease-out;
}

.form input[type=text] {
  margin-bottom: 15px;
}

.form input[type=text]:hover ~ i,
.form input[type=password]:hover ~ i {
  color: #27ae60;
}

.form input[type=text]:focus ~ i,
.form input[type=password]:focus ~ i {
  color: #27ae60;
}

.form input[type=text]:focus,
.form input[type=password]:focus,
.form button[type=submit]:focus {
  outline: none;
}

.form input[type=submit] {
  margin-top: 15px;
  width: 270px;
  text-align: center;
  font-size: 14px;
  font-family: 'Open Sans',sans-serif;
  font-weight: bold;
  padding: 12px 0;
  letter-spacing: 0;
  box-shadow: inset 0px 0px 0px 0px #1abc9c;
  color: #fff;
  background-color: #16a085;
  text-shadow: none;
  text-transform: uppercase;
  border: none;
  cursor: pointer;
  position: relative;
  margin-bottom: 0px;
  -webkit-animation: shadowFadeOut 0.4s;
  -moz-animation: shadowFadeOut 0.4s;
}


.daftar{
  margin-left: -135px;
  margin-top: 10px;
  width: 270px;
  text-align: center;
  font-size: 14px;
  font-family: 'Open Sans',sans-serif;
  font-weight: bold;
  padding: 10px 0;
  letter-spacing: 0;
  box-shadow: inset 0px 0px 0px 0px #1abc9c;
  color: #fff;
  background-color: #16a085;
  text-shadow: none;
  text-transform: uppercase;
  border: none;
  cursor: pointer;
  position: absolute;
  margin-bottom: 0px;
  -webkit-animation: shadowFadeOut 0.4s;
  -moz-animation: shadowFadeOut 0.4s;
}


.form input[type=submit]:hover, input[type=submit]:focus {
  color: #fff;
  box-shadow: inset 0px 46px 0px 0px #1abc9c;
  -webkit-animation: shadowFade 0.4s;
  -moz-animation: shadowFade 0.4s;
}

.daftar:hover{
  color: #fff;
  box-shadow: inset 0px 46px 0px 0px #1abc9c;
  -webkit-animation: shadowFade 0.4s;
  -moz-animation: shadowFade 0.4s;
}

/*keyframes for input animation*/
@keyframes shadowFade {
  0% {
    box-shadow: inset 0px 0px 0px 0px #1abc9c;
    color: #fff;
  }
  100% {
    box-shadow: inset 0px 46px 0px 0px #1abc9c;
    color: #fff;
  }
}
@keyframes shadowFadeOut {
  0% {
    box-shadow: inset 0px 46px 0px 0px #1abc9c;
    color: #fff;
  }
  100% {
    box-shadow: inset 0px 0px 0px 0px #1abc9c;
    color: #fff;
  }
}
@-webkit-keyframes shadowFade {
  0% {
    box-shadow: inset 0px 0px 0px 0px #1abc9c;
    color: #fff;
  }
  100% {
    box-shadow: inset 0px 46px 0px 0px #1abc9c;
    color: #fff;
  }
}
@-webkit-keyframes shadowFadeOut {
  0% {
    box-shadow: inset 0px 46px 0px 0px #1abc9c;
    color: #fff;
  }
  100% {
    box-shadow: inset 0px 0px 0px 0px #1abc9c;
    color: #fff;
  }
}
@-moz-keyframes shadowFade {
  0% {
    box-shadow: inset 0px 0px 0px 0px #1abc9c;
    color: #fff;
  }
  100% {
    box-shadow: inset 0px 46px 0px 0px #1abc9c;
    color: #fff;
  }
}
@-moz-keyframes shadowFadeOut {
  0% {
    box-shadow: inset 0px 44px 0px 0px #1abc9c;
    color: #fff;
  }
  100% {
    box-shadow: inset 0px 0px 0px 0px #1abc9c;
    color: #fff;
  }
}
/*continued styling for input */
.form input[type="checkbox"] {
  display: none;
}

.copyright {
  margin-top: 30px;
  text-align: center;
}
.copyright p, .copyright a {
  color: #828078;
  font-size: 12px;
  text-decoration: none;
  transition: color 0.3s ease-out;
}
.copyright p a:hover, .copyright a a:hover {
  color: #f2672e;
}

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>


</head>

<body>

  <div class="login">
    <h1>Login</h1>

    <form class="form" method="post" action="">

      <p class="field">
        <input type="text" name="login" placeholder="Username" required/>
        <i class="fa fa-user"></i>
      </p>

      <p class="field">
        <input type="password" name="password" placeholder="Password" required/>
        <i class="fa fa-lock"></i>
      </p>

      <p class="submit"><input type="submit" name="sent" value="Login"></p>
      <p class="submit"><a style="text-decoration: none;" href="daftar.php" class="daftar">Daftar</a></p>
    </form>
  </div> 
  <!--/ Login-->

<div class="copyright">
    <p>Copyright &copy; 2019. <a href="https://www.instagram.com/rov.aa/">Roffy</a></p>
</body>

</html>