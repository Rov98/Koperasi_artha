<?php  
session_start();
if ($_SESSION['login']) {
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>Koperasi Artha Mandiri</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">KOPERASI ARTHA MANDIRI</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                        </li>

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="img/UM.png" alt="" class="user-avatar-md rounded-circle">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Admin </h5>
                                </div>
                                <a class="dropdown-item" href="?page=pengaturan"><i class="fas fa-cog mr-2"></i>Pengaturan</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                             <li class="nav-item">
                                <a name="home" class="nav-link" href="?page=home" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-1"><i class="fas fa-fw fa-home"></i>Home <span class="badge badge-secondary">New</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-server"></i>Master Data</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=anggota"> Anggota <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=paketan"> Paketan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-fw fa-columns"></i>Pinjaman</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=tambahpinjam"><span class="glyphicon glyphicon-plus">Pinjaman Baru</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=datapinjam">Data Pinjaman</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="?page=tagihanpinjam"> Tagihan Pinjaman Anggota</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Koperasi Artha Mandiri </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <?php 
                                                isset($_GET["page"])?$page=$_GET["page"]:$page="";
                                                if ($page=="home") {
                                                    echo "<li class='breadcrumb-item active' aria-current='page'>Home</li>";
                                                }elseif ($page=="anggota") {
                                                    echo "<li class='breadcrumb-item'><a href='#'' class='breadcrumb-link'>Master Data</a></li>";
                                                    echo "<li class='breadcrumb-item active' aria-current='page'>Anggota</li>";
                                                }elseif ($page=="datasimpan") {
                                                    echo "<li class='breadcrumb-item'><a href='#'' class='breadcrumb-link'>Simpanan</a></li>";
                                                    echo "<li class='breadcrumb-item active' aria-current='page'>Data Simpan</li>";
                                                }elseif ($page=="tambahpinjam") {
                                                    echo "<li class='breadcrumb-item'><a href='#'' class='breadcrumb-link'>Pinjaman</a></li>";
                                                    echo "<li class='breadcrumb-item active' aria-current='page'>Tambah Pinjaman</li>";
                                                }elseif ($page=="datapinjam") {
                                                    echo "<li class='breadcrumb-item'><a href='#'' class='breadcrumb-link'>Pinjaman</a></li>";
                                                    echo "<li class='breadcrumb-item active' aria-current='page'>Data Pinjaman</li>";
                                                }elseif ($page=="tagihanpinjam") {
                                                    echo "<li class='breadcrumb-item'><a href='#'' class='breadcrumb-link'>Pinjaman</a></li>";
                                                    echo "<li class='breadcrumb-item active' aria-current='page'>Tagihan Pinjaman</li>";
                                                }elseif ($page=="tambah") {
                                                    echo "<li class='breadcrumb-item'><a href='?page=anggota'' class='breadcrumb-link'>Anggota</a></li>";
                                                    echo "<li class='breadcrumb-item active' aria-current='page'>Tambah</li>";
                                                }elseif ($page=="paketan") {
                                                    echo "<li class='breadcrumb-item'><a href='#'' class='breadcrumb-link'>Master Data</a></li>";
                                                    echo "<li class='breadcrumb-item active' aria-current='page'>Paketan</li>";
                                                }
                                            ?>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <!--Dibawah Ini merupakan pemang gilan setiap file-->
                                <?php
                                include "koneksi.php";
                                isset($_GET["page"])?$page=$_GET["page"]:$page="";
                                if($page=="home"){
                                    include "home.php";
                                }elseif($page=="anggota"){
                                    include "anggota.php";
                                }elseif ($page=="datasimpan") {
                                    include "datasimpan.php";
                                }elseif ($page=="tambahpinjam") {
                                    include "tambahpinjam_baru.php";
                                }elseif ($page=="datapinjam") {
                                    include "datapinjam.php";
                                }elseif ($page=="tagihanpinjam") {
                                    include "tagihanpinjam.php";
                                }elseif ($page=="shu") {
                                    include "shu.php";
                                }elseif ($page=="pengaturan") {
                                    include "pengaturan.php";
                                }elseif ($page=="tambah") {
                                    include "tambahanggota.php";
                                }elseif ($page=="paketan") {
                                    include "paketan.php";
                                }
                                else{
                                    echo "Tidak Tersedia";
                                }
                                ?>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                        </div>
                        <div class="row">

                                <div class="card">

                            </div>
                        </div>
                            <!-- ============================================================== -->
                            <!-- end sales traffice country source  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>
<?php 
}
else{
    header("location: login_free.php");
}
?>