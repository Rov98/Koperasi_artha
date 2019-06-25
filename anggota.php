<?php
if ($_SESSION['login']) {

?>

<link rel="stylesheet" href="css/pop_up.css">
<script type="text/javascript">
    function hapus(nama){
        var jawab=confirm("Ingin Menghapus "+nama+"?");
        if (jawab==true) {
            document.location="proses_hapus.php?nama="+nama;
        }else{
            location.reload();
        }
    }
</script>
<div class="col-xl-12 col-lg-12 col-md-8 col-sm-12 col-12">
                                <div class="card">
                                    <h4 class="card-header">Anggota</h4>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <div id="custom-search" class="top-search-bar" style="margin-left: 10px">
                                                    <form method="POST">
                                                        <input name="crF" class="form-control-sm form-control-borderless" type="text" placeholder="Search..">
                                                        <button name="cr" class="btn btn-outline-default btn-sm"><span class="fa fa-search"></span></button>
                                                        <button style="margin-left: 550px" name="excel" class="bnt btn-outline-default btn-sm" onclick="window.open('buatexcelAnggota.php','_blank')"><span class="fa fa-file-excel"></span>Ekspor</button>
                                                        <button name="pdf" class="bnt btn-outline-default btn-sm" onclick="window.open('buatpdfAnggota.php','_blank')"><span class="fa fa-file-pdf"></span>Ekspor</button>
                                                    </form>
                                                <div>
                                                    <button class="btn btn-outline-info btn-sm" style="margin: 5px; margin-left: 0px;" onclick="document.getElementById('tmbh').style.display='block'"><span class="fa fa-address-book"></span> Tambah</button>
                                                    <button class="btn btn-outline-info btn-sm" style="margin: 5px; margin-left: 0px;" onclick="document.location('index.php?page=anggota');"><span class="fa fa-newspaper"></span> Refresh</button>
                                                </div>
                                                </div> 
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">No</th>
                                                        <th class="border-0">Nama Anggota</th>
                                                        <th class="border-0">Tempat, Tanggal Lahir</th>
                                                        <th class="border-0">Jenis Kelamin</th>
                                                        <th class="border-0">Alamat</th>
                                                        <th class="border-0">Telepon</th>
                                                        <th class="border-0">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $nomer=1;
                                                        include "koneksi.php";
                                                        if (isset($_POST['cr'])) {
                                                            $cari=$_POST['crF'];
                                                            $data=mysqli_query($con, "select * from anggota where Nama LIKE '%$cari%'") or die(mysql_error());
                                                        }else{
                                                            $data=mysqli_query($con, "select * from anggota") or die(mysql_error());
                                                        }
                                                        
                                                        while ($data2=mysqli_fetch_array($data)) {
                                                            echo "<tr><td>$nomer</td><td>$data2[Nama]</td><td>$data2[ttl]</td><td>$data2[JK]</td><td>$data2[Alamat]</td><td>$data2[Hp]</td>";
                                                            ?>
                                                            <td>
                                                                <button class="btn btn-warning btn-sm" onclick="hapus(<?php echo "'$data2[Nama]'"; ?>);"><span class="far fa-trash-alt"></span>Hapus</button>
                                                                <button class="btn btn-warning btn-sm" onclick="document.getElementById('<?=$data2['Nama']; ?>').style.display='block'"><span class="far fa-edit"></span>Edit</button>
                                                                <!-- Edit Form -->
                                                                    <div id="<?= $data2['Nama']; ?>" class="modal pop_up">
                                                                      <span onclick="document.getElementById('id<?= $data2['Nama']; ?>').style.display='none'" 
                                                                    class="close" title="Close Modal" >&times;</span>

                                                                      <!-- Modal Content -->
                                                                      <form method="POST" class="form-sm form-control ">
                                                                        <label >Nama</label>
                                                                        <input class="form-control" type="text" name="namaB" value="<?=$data2['Nama']; ?>" required><br>
                                                                        <label >Tanggal Lahir</label>
                                                                        <input class="form-control" type="text" name="ttlB" value="<?=$data2['ttl']?>" required><br>
                                                                        <label >Jenis Kelamin</label>
                                                                        <input type="text" class="form-control" name="jkB" value="<?=$data2['JK']?>" readonly="">
                                                                        <label >Alamat</label>
                                                                        <input class="form-control" type="text" name="alamatB" value="<?=$data2['Alamat']?>" required><br>
                                                                        <label >No.Hp</label>
                                                                        <input class="form-control" type="text" value="<?=$data2['Hp']?>" name="hpB"><br>
                                                                        <input class="form-control" type="submit" name="sbm" value="Submit">
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            <?php
                                                            echo "</tr>";
                                                            $nomer++;
                                                        }
                                                        include "koneksi.php";
                                                        if (isset($_POST['sbm'])) {
                                                            $namaBaru=$_POST['namaB'];
                                                            $ttl=$_POST['ttlB'];
                                                            $jk=$_POST['jkB'];
                                                            $alamat=$_POST['alamatB'];
                                                            $hp=$_POST['hpB'];
                                                            mysqli_query($con,"update anggota set Nama='$namaBaru',ttl='$ttl',JK='$jk',Alamat='$alamat',Hp=$hp where Nama='$namaBaru'") or die(mysql_error());
                                                            echo '<script type="text/javascript">document.location="index.php?page=anggota";</script>';
                                                        }
                                                        
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- Tambah Form -->
                            <div id="tmbh" class="modal pop_up">
                              <span onclick="document.getElementById('tmbh').style.display='none'" 
                            class="close" title="Close Modal" style="margin-right: 10px;">&times;</span>

                              <!-- Modal Content -->
                              <form method="POST" class="form-sm form-control ">
                                <label >Nama</label>
                                <input class="form-control" type="text" name="Tnama" required><br>
                                <label >Tanggal Lahir</label>
                                <input class="form-control" type="date" name="Tttl" required><br>
                                <label >Jenis Kelamin</label>
                                <select class="form-control" name="Tjk" required><br> 
                                    <option selected disabled hidden>Pilih...</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <label >Alamat</label>
                                <input class="form-control" type="text" name="Talamat" required><br>
                                <label >No.Hp</label>
                                <input class="form-control" type="text" name="Thp"><br>
                                <input class="form-control" type="submit" name="Btmb" value="Submit">
                                </form>
                            </div> 
                            <?php
                                include "koneksi.php";
                                if (isset($_POST['Btmb'])) {
                                    $nama=$_POST['Tnama'];
                                    $ttl=$_POST['Tttl'];
                                    $jk=$_POST['Tjk'];
                                    $alamat=$_POST['Talamat'];
                                    $hp=$_POST['Thp'];

                                    mysqli_query($con,"insert into anggota values ('$nama','$ttl','$jk','$alamat',$hp)") or die(mysql_error());
                                    echo '<script>document.location="index.php?page=anggota";</script>';
                                }
                            ?>
<?php
isset($_GET["page"])?$page=$_GET["page"]:$page=""; 
if ($page=="tambah") {
    include "pop_up_tambahA.php";
}
?>
<?php  
}else{
header("location: login_free.php");
}
?>
