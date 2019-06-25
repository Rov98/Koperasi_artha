<?php
if ($_SESSION['login']) {
?>
    <link rel="stylesheet" type="text/css" href="css/pop_up.css">
<form method="POST">
	
	<div style="margin-left: 15px">
		<input class="fomr form-control-sm" type="text" name="tekscari" size="24" />
		<button class="btn-sm btn-outline-dark" name="cari"><span class="fa fa-search"></span></button>
		<button class="btn-sm btn-outline-dark" onclick="document.location('index.php?page=tagihanpinjam');"><span class="fa fa-retweet"></span> Refresh</button>
	</div>

	</form>
	<div class="col-xl-12 col-lg-12 col-md-8 col-sm-12 col-12">
    <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                    <thead class="bg-light">
                    <tr class="border-1">
                    <th class="border-1">No</th>            
                    <th class="border-1">Tanggal</th>
                    <th class="border-1">Nama Anggota</th>
                    <th class="border-1">Total</th> 
                    <th class="border-1">Perbulan</th>
                    <th class="border-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $nomer=1;
                    include "koneksi.php";
                    if (isset($_POST['cari'])) {
                        $cari=$_POST['tekscari'];
                        $data=mysqli_query($con, "select * from data_pinjam where nama = '$cari'") or die(mysql_error());
                    }else{
                        $data=mysqli_query($con, "select * from data_pinjam") or die(mysql_error());
                    }
                    while ($data2=mysqli_fetch_array($data)) {
                        echo "<tr><td>$nomer</td><td>$data2[tanggal]</td><td>$data2[nama]";
                        echo "</td><td>Rp";
                        echo number_format("$data2[total]",'0','.','.');
                        echo "</td><td>Rp$data2[perbulan]</td>";                        
                        ?>
                        <td>
                            <button name="sbm" class="btn btn-warning btn-sm" onclick="document.getElementById('byr<?= $data2['nama']; ?>').style.display='block'">Bayar</button>
                        <div id="byr<?= $data2['nama']; ?>" class="modal pop_up">
                        <span style="margin-right: 10px" onclick="document.getElementById('byr<?=$data2['nama']?>').style.display='none'" 
                        class="close" title="Close Modal" >&times;</span>

                        <!-- Modal Content -->
                        <form method="POST" class="form-sm form-control">
                            <label >Nama</label>
                            <input class="form-control" type="text" name="namaB" value="<?=$data2['nama']?>" readonly><br>
                            <label >Sisa Pinjaman</label>
                            <input class="form-control" type="text" name="jmlB" value="<?=$data2['total']?>" readonly><br>
                            <label >Jumlah Pembayaran</label>
                            <input class="form-sm form-control" type="text" name="bayarB" required><br>
                            <input class="form-control" type="submit" name="sbmI" value="Submit">
                            </form>
                        </div>
                        </td>
                        <?php
                        $nomer++;
                        echo "</tr>";
                    }
                    if (isset($_POST['sbmI'])) {
                        $nama=$_POST['namaB'];
                        $tanggal=date("Y-m-d");
                        $total=$_POST['jmlB'];
                        $bayar=$_POST['bayarB'];
                        $int_bayar=intval($bayar);
                        $Pbayar=$total-$bayar;
                        $ket;
                        if ($Pbayar<=0) {
                            $ket="Lunas";
                            $Pbayar=0;
                        }else{
                            $ket="Belum Lunas";
                        }
                        mysqli_query($con,"insert into riwayat values ('$nama','$tanggal','$total','$bayar')")or die(mysql_error());
                        mysqli_query($con,"update data_pinjam set total=$Pbayar,ket='$ket' where nama = '$nama'");
                        echo '<script type="text/javascript">document.location="index.php?page=tagihanpinjam"</script>';

                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<?php  
}else{
    header("location: login_free.php");
}
?>