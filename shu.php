<?php
if ($_SESSION['login']) {
?>
<html>
<head>
</head>
<body>
<form action="" method="post">
	
	<div style="margin-left: 15px">
		<input class="fomr form-control-sm" type="text" name="tekscari" size="24" />
		<button class="btn-sm btn-outline-dark" name="cari">Cari</button>
		<button class="btn-sm btn-outline-dark" onclick="cetak(<?php echo "'$data2[nama]',$data2[nim]"; ?>)">cetak</button>
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
                     <th class="border-1">Nama Anggota</th>
                       <th class="border-1">Simpanan</th>
                        <th class="border-1">Pilihan</th>
                       <th class="border-1">SHU Simpanan</th>
                    <th class="border-1">Total SHU</th> 
                </tr>
            </thead>
        </table>
    </div>
</div>
</div>
</div>
</body>
</html>
<?php  
}else{
    die("Akses Illegal");
}
?>