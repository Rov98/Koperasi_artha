<?php
if ($_SESSION['login']) {
?>
<head>
    <script src="js/accounting.js"></script>
    <script type="text/javascript">
        
        var total;

        function jutaan(){
            var pkt = document.getElementById('paket').value;
            var jw = document.getElementById('jw').value;
            if (pkt=='1jt') {
                document.getElementById('bg').value='0.03';
                if (jw=='6bln') {
                    total=171.667*6;

                    document.getElementById('bulan').value='Rp.171.667,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else if(jw=='12bln'){
                    total=85.834*12;

                    document.getElementById('bulan').value='Rp.85.834,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else{
                    document.getElementById('bulan').value='';
                }
            }else if(pkt=='5jt'){
                document.getElementById('bg').value='0.03';
                if (jw=='6bln') {
                    total=858.334*6;
                    document.getElementById('bulan').value='Rp.858.334,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else if(jw=='12bln'){
                    total=429.200*12;
                    document.getElementById('bulan').value='Rp.429.200,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else{
                    document.getElementById('bulan').value='';
                }
            }else if(pkt=='7jt'){
                document.getElementById('bg').value='0.03';
                if (jw=='6bln') {
                    total=1201.667*6;
                    document.getElementById('bulan').value='Rp.1.201.667,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else if(jw=='12bln'){
                    total=600.900*12;
                    document.getElementById('bulan').value='Rp.600.900,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else{
                    document.getElementById('bulan').value='';
                }
            }else if(pkt=='9jt'){
                document.getElementById('bg').value=    '0.03';            
                if (jw=='6bln') {
                    total=1575.000*6
                    document.getElementById('bulan').value='Rp.1.575.000,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else if(jw=='12bln'){
                    total=787.500*12;
                    document.getElementById('bulan').value='Rp.787.500,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else{
                    document.getElementById('bulan').value='';
                }
            }else if(pkt=='12jt'){
                document.getElementById('bg').value='0.03';
                if (jw=='6bln') {
                    total=2100.000*6;
                    document.getElementById('bulan').value='Rp.2.100.000,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else if(jw=='12bln'){
                    total=1050.000*12;
                    document.getElementById('bulan').value='Rp.1.050.000,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else{
                    document.getElementById('bulan').value='';
                }
            }else if(pkt=='15jt'){
                document.getElementById('bg').value='0.03';
                if (jw=='6bln') {
                    total=2625.000*6;
                    document.getElementById('bulan').value='Rp.2.625.000,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else if(jw=='12bln'){
                    total=1312.500*12;
                    document.getElementById('bulan').value='Rp.1.312.500,-';
                    document.getElementById('total').value="Rp"+total.toFixed(3);
                }else{
                    document.getElementById('bulan').value='';
                }
            }else{
                document.getElementById('bg').value='';
            }
            
        }

    </script>
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
                            <label for="tgl" class="">Tanggal</label>
                            <input type="date" id="tgl" name="tgl" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="agt" class="">Anggota</label>
                            <select id="agt" name="agt" class="form-control">
                                <?php
                                include "koneksi.php";
                                $data = mysqli_query($con,"select Nama from anggota")or die(mysql_error());
                                while ($data2=mysqli_fetch_array($data)) {
                                    echo "<option value='$data2[Nama]'>$data2[Nama]</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="paket" class="">Jumlah</label>
                            <select name="paket" id="paket" class="form-control" onchange="jutaan()">
                                <option value="">Pilih...</option>
                                <option value="1jt">Rp.1.000.000,-</option>
                                <option value="5jt">Rp.5.000.000,-</option>
                                <option value="7jt">Rp.7.000.000,-</option>
                                <option value="9jt">Rp.9.000.000,-</option>
                                <option value="12jt">Rp.12.000.000,-</option>
                                <option value="15jt">Rp.15.000.000,-</option>
                            </select>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="bg">Bunga(%)</label>
                            <input type="text" id="bg" name="bg" class="form-control" readonly>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <label for="jw">Jangka Waktu(Bulan)</label>
                            <select class="form-control" id="jw" name="jw"onchange="jutaan()">
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
                            <label for="bulan">Perbulan</label>
                            <input type="text" id="bulan" name="bulan" class="form-control" readonly>
                        </div>
                    </div>
                    <!--Grid column-->
                    <!-- Grid Total -->
                    <div style="margin-left: 424px" class="col-md-6">
                        <div class="md-form">
                            <label for="total">Total</label>
                            <input type="text" id="total" name="total" class="form-control" readonly>
                        </div>
                    </div>
                    <!-- Grid Total -->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="ket">Keterangan</label>
                            <textarea type="text" id="ket" name="ket" rows="2" class="form-control md-textarea"></textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row-->
                <div class="center-on-small-only">
                <button id="kirim" name="kirim" class="btn btn-success btn-md">Kirim</button>
                <button class="btn btn-success btn-md">Kembali</button>
            </div>
            </form>            
    </div>
	</form>
    <?php
    include "Koneksi.php";
        if (isset($_POST['kirim'])) {
            $tgl=$_POST['tgl'];
            $nama=$_POST['agt'];
            $paket=$_POST['paket'];
            $bunga=$_POST['bg'];
            $jw=$_POST['jw'];
            $bulan=$_POST['bulan'];
            $ket=$_POST['ket'];
            $total=$_POST['total'];
            mysqli_query($con,"insert into data_pinjam values ('$tgl','$nama','$paket','$bunga','$jw','$bulan','$total','$ket')")or die(mysql_error());
        }
    ?>
<?php
}else{
    die("Akses Illegal");
}
?>