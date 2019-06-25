<?php
if ($_SESSION['login']) {
    include "koneksi.php";
?>
<head>
    <script src="js/accounting.js"></script>
    <script type="text/javascript">
        function jutaan(bulanan){
            var jml = document.getElementById('paket').value;
            var semua = document.getElementById('total').value;
            var int_jml = parseInt(jml)*1000000;
            var int_bunga = parseFloat(semua)*1000000;
            var total,bunga;
            if (bulanan=="6bln") {
                total=int_jml/6;
                bunga=int_bunga-int_jml;
                document.getElementById('bulan').value=accounting.formatMoney(total,"","0",".",",");;
                document.getElementById('bg').value=accounting.formatMoney(bunga,"","0",".",",");
                
            }else if(bulanan=="12bln"){
                total=int_jml/12;
                bunga=int_bunga-int_jml;
                document.getElementById('bulan').value=accounting.formatMoney(total,"","0",".",",");
                document.getElementById('bg').value=accounting.formatMoney(bunga,"","0",".",",");
            }
            document.getElementById('ket').value="Belum Lunas";
        }
    </script>
</head>
<body>
</body>
</html>
<form method="POST" >
		<div class="row">

        <div class="col-md-8 col-xl-9 form form-control" >
            <form id="form" name="form" method="POST" >

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="tgl" class="">Tanggal</label>
                            <input type="date" id="tgl" name="tgl" class="form-control" required>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="agt" class="">Anggota</label>
                            <select id="agt" name="agt" class="form-control" required>
                                <?php
                                include "koneksi.php";
                                $data = mysqli_query($con,"select Nama from anggota")or die(mysql_error());
                                while ($dataA=mysqli_fetch_array($data)) {
                                    echo "<option value='$dataA[Nama]'>$dataA[Nama]</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <!--Grid column-->
                    <?php  

                        $data2=mysqli_query($con,"select * from paketan");
                    ?>
                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="paket" class="">Jumlah</label>
                            <select name="paket" id="paket" class="form-control" onchange="document.getElementById('total').value=this.value;" required>
                                <option value="">Pilih...</option>
                                <?php
                                while ($dataR=mysqli_fetch_array($data2)) {
                                        $total = $dataR[Jumlah]+$dataR[Bunga];
                                        echo "<option value=";
                                        echo number_format("$total",'0','.','.').">";
                                        echo number_format("$dataR[Jumlah]",'0','.','.').("</option>");

                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="bg">Bunga(Rp)</label>
                            <input type="text" id="bg" name="bg" class="form-control" readonly>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="jw">Jangka Waktu(Bulan)</label>
                            <select class="form-control" id="jw" name="jw"onchange="jutaan(this.value)" required>
                                <option value="">Pilih...</option>
                                <option value="6bln">6 Bulan</option>
                                <option value="12bln">12 Bulan</option>
                            </select>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="bulan">Perbulan(Rp)</label>
                            <input type="text" id="bulan" name="bulan" class="form-control" readonly>
                        </div>
                    </div>


                    <!--Grid column-->
                    <div class="col-md-6" style="margin-top: 24px">
                        <div class="md-form">
                            <button id="kirim" name="kirim" style="margin-bottom: 5px" class="btn form-control btn-success btn-md">Kirim</button>
                            <button class="btn form-control btn-success btn-md" onclick="location.reload();">Bersihkan</button>
                        </div>
                    </div>

                    <!-- Grid Total -->
                    <div  class="col-md-6">
                        <div class="md-form">
                            <label for="total">Total (Rp)</label>
                            <input type="text" id="total" name="total" class="form-control" readonly>
                        </div>
                    </div>
                    <!-- Grid Total -->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                </div>
                <!--Grid row-->
                <div style="margin: 10px; padding: 10px">
            </div>
            </form>            
    </div>
	</form>
    <?php

        if (isset($_POST['kirim'])) {
            $tgl=$_POST['tgl'];
            $nama=$_POST['agt'];
            $paket=$_POST['paket'];
            $bunga=$_POST['bg'];
            $perbulan=$_POST['bulan'];
            $jw=$_POST['jw'];
            $ket= "Belum Lunas";
            
            $int_paket = intval($paket)*1000000; 
            $int_bunga = intval($bunga)*1000;
            $total=intval($paket)*1000000+intval($bunga)*1000;
            $total_int=intval($total);


            mysqli_query($con,"insert into data_pinjam values ('$tgl','$nama',$int_paket,$int_bunga,'$jw','$perbulan',$total,'$ket')")or die(mysql_error());
            echo '<script>document.location="index.php?page=datapinjam";</script>';
        }
    ?>
<?php
}else{
    header("location: login_free.php");
}
?>