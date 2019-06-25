<?php  
if ($_SESSION['login']) {
	include "koneksi.php";
?>

<style type="text/css">
	td{
		text-align: center;
	}
</style>

<link rel="stylesheet" type="text/css" href="css/chart.css">
<div class="container">
	<div class="row">
		<div class="container">
	<div class="row">
	    <div class="col-md-4">
    		<div class="card mb">
              <img class="card-img-top" src="A_timbang.jpg" alt="Card image cap">
              <div class="card-body mb">
                <h5 class="card-title">Sejarah</h5>
                <p class="card-text">Koperasi adalah badan usaha yang mengorganisir pemanfaatan dan pendayagunaan sumber daya ekonomi para anggotanya atas dasar prinsip-prinsip Koperasi dan kaidah usaha ekonomi untuk meningkatkan.</p>
                <button type="button" class="btn btn-primary mb" onclick="document.getElementById('sjr').style.display='block'">Selanjutnya</button>
              </div>
            </div>
        </div>
        <div class="col-md-6 form">
        	<dl>
        	<table class="table">
        		<tr>
        			<th>Jumlah Anggota Aktif</th>
        			<th>Jumlah Admin Aktif</th>
        		</tr>
        		<?php
        			$data=mysqli_query($con,"select count(nama) as Jumlah from anggota");
        			$dataR=mysqli_query($con,"select count(username) as Aktif from admin");
        			while ($result=mysqli_fetch_array($data)) {
        				echo "<tr><td>$result[Jumlah]</td>";
        			}while ($result_R=mysqli_fetch_array($dataR)) {
        				echo "<td>$result_R[Aktif]</td>";
        			}
        			echo "</tr>";
        		?>
        	</table>
              <div class="card-body mb">
              </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal" id="sjr">
<div class="jumbotron" style="">
	<span class="close " onclick="document.getElementById('sjr').style.display='none'"><a>X</a></span>
  <h1>Koperasi Artha Mandiri</h1> 
  <p align="justify">Koperasi adalah badan usaha yang mengorganisir pemanfaatan dan pendayagunaan sumber daya ekonomi para anggotanya atas dasar prinsip-prinsip Koperasi dan kaidah usaha ekonomi untuk meningkatkan taraf hidup anggota pada khususnya dan masyarakat daerah kerja pada umumnya, dengan demikian koperasi merupakan gerakan ekonomi rakyat dan koperasi melandaskan kegiatan berdasarkan prinsip gerakan ekonomi rakyat yang berdasarkan asas kekeluargaan.<br>
Sejarah koperasi pada awalnya dimulai pada abad ke-20 . Pada umumnya sejarah koperasi dimulai dari hasil usaha kecil yang spontan dan dilakukan oleh rakyat kecil. Kemampuan ekonomi yang rendah mendorong para usaha kecil untuk terlepas dari penderitaan .Secara spontan mereka ingin merubah hidupnya.<br>
Di Indonesia  ide - ide perkoperasian diperkenalkan oleh, R. Aria Wiraatmadja yang pada tahun 1896 yang mendirikan sebuah Bank untuk para Pegawai Negeri. Karena semangat yang tinggi perkoperasian pun selanjutnya diteruskan oleh De Wolffvan Westerrode.<br>
Pada tahun 1908, Dr. Sutomo mendirikan Budi Utomo . Dr Sutomo sangat memiliki peranan bagi garakan koperasi untuk memperbaiki dan mensejahtrakan kehidupan rakyat. <br>
Pada tahun 1915 dibuat peraturan-peraturan Verordening op de Cooperatieve Vereeniging dan pada tahun 1927 Regeling Inlandschhe Cooperatiev.<br>
Pada tahun 1927 dibentuklah Serikat Dagang Islam. Dengan tujuan untuk memperjuangkan kedudukan ekonomi para pengusah-pengusaha pribumi. pada tahun 1929 berdiri Partai Nasional Indonesia yang memberikan dan memperjuangkan semangat untuk penyebaran koperasi di Indonesia.<br>
Pada tahun 1942 negara Jepang menduduki Indonesia.Lalu jepang mendirikan koperasi yang diberi nama koperasi kumiyai.
Setelah bangsa Indonesia merdeka tanggal 12 Juli 1947. Gerakan koperasi di Indonesia mengadakan Kongres Koperasi pertama kalinya di Tasikmalaya.Hari itu kemudian ditetapkanlah sebagai Hari Koperasi Indonesia. <br>
Koperasi ARTHA MANDIRI merupakan koperasi yang bergerak di bidang peminjaman modal usaha bagi masyarakat yang membutuhkan modal untuk usaha. Dimana di koperasi ini bunga yang diberikan relevan sedikit dibandingkan dengan koperasi-koperasi yang lainnya.
</p>
</div>
</div>


 <div class="reserved-bot">
	<p class="text-center">Copyright © <?= date('Y');?> <a href="https://www.instagram.com/rov.aa/">Roffy</a>,Tugas Akhir Pemrograman Web</p>
</div>
<?php  
}else{
	header("location: login_free.php");
}
?>