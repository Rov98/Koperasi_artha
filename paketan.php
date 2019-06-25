<?php
if ($_SESSION['login']) {
?>
<link rel="stylesheet" href="css/pop_up.css">
<script type="text/javascript">
    function hapus(jml){
        var jawab=confirm("Menghapus?");
        if (jawab==true) {
            document.location="proses_hapus_paket.php?jml="+jml;
            alert("Hapus Berhasil");
        }else{
            location.reload();
        }
    }
</script>
	<div class="col-xl-12 col-lg-12 col-md-8 col-sm-12 col-12">
		<div class="card">
                                    <h4 class="card-header">Paketan</h4>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                </div>
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">No</th>
                                                        <th class="border-0">Jumlah</th>
                                                        <th class="border-0">Bunga</th>
                                                        <th class="border-0">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $nomer=1;
                                                        include "koneksi.php";
                                                        $data=mysqli_query($con, "select * from paketan") or die(mysql_error());
                                                        while ($data2=mysqli_fetch_array($data)) {
                                                            echo "<tr><td>$nomer</td><td>";
                                                            echo number_format("$data2[Jumlah]");
                                                            echo "</td><td>";
                                                            echo number_format("$data2[Bunga]");
                                                            echo "</td>";
                                                            ?>
                                                            <td>
                                                                <button class="btn btn-warning btn-sm" onclick="hapus(<?php echo "'$data2[Jumlah]'"; ?>);"><span class="far fa-trash-alt"></span>Hapus</button>
                                                            <?php
                                                            echo "</tr>";
                                                            $nomer++;
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-warning btn-md" name="tambah Paketan" onclick="document.getElementById('id01').style.display='block';">Tambah</button>
                                </div>
                                 <div id="id01" class="modal pop_up">
                              <span onclick="document.getElementById('id01').style.display='none'" 
                            class="close" title="Close Modal" style="margin-right: 10px">&times;</span>

                              <!-- Modal Content -->
                              <form method="POST" class="form-sm form-control">
                                <label >Jumlah</label>
                                <input class="form-control" type="text" name="jmlB" required><br>
                                <label >Bunga(%)</label>
                                <input class="form-control" type="text" name="BB" required><br>
                                <input class="form-control" type="submit" name="sbm" value="Submit">
                                </form>
                            </div>
                            </div>

<?php
    include "koneksi.php";
    if (isset($_POST['sbm'])) {
        $jml=$_POST['jmlB'];
        $B=$_POST['BB'];
        
        mysqli_query($con,"insert into paketan values($jml , $B)") or die(mysql_error());
        echo '<script type="text/javascript">document.location="index.php?page=paketan";</script>';      
    }
?>
<?php
}else{
	header("login_free.php");
}
?>