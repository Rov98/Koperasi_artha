<?php
if ($_SESSION['login']) {
    include "koneksi.php";
?>
<head>

</head>
<body>
</body>
</html>
<form method="POST">
        <div class="row">

        <div class="col-md-8 col-xl-9">
            <form id="form" name="form" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label  class="">Password Lama</label>
                            <input type="Password" id="pass" name="pass" class="form-control" required>
                        </div>
                    </div>
                    <!--Grid column-->


                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form">
                            <label >Password Baru</label>
                            <input type="password" id="passB" name="passB" class="form-control" required>
                        </div>
                    </div>
                    <!--Grid column-->
                    <div class="col-md-12">
                        
                    </div>

                    <div class="col-md-6">
                        <div class="md-form">
                            <label >Konfirmasi Password</label>
                            <input type="password" id="passR" name="passR" class="form-control" required>
                        </div>
                    </div>

                </div>
                    <div class="md-form" style="margin-top: 30px;">
                            <button id="kirim" name="kirim" class="btn btn-success btn-md">Kirim</button>
                            <button id="Kembali" class="btn btn-success btn-md">Kembali</button>
                        </div>

                <!--Grid row-->
            </form>            
    </div>
    </form>
<?php
    if (isset($_POST['kirim'])) {
        $user = $_SESSION['login'];
        $pass=$_POST['pass'];
        $passB=$_POST['passB'];
        $passR=$_POST['passR'];
        if ($passB==$passR) {
            mysqli_query($con,"update admin set password=$passB where username='$user' and password='$pass'");
            echo '<script type="text/javascript">alert("Berhasil");</script>';
        }
        else{
            echo '<script type="text/javascript">alert("Password Tidak Sama");</script>';

        }
     } 
}else{
    header("location: login_free.php");
}
?>