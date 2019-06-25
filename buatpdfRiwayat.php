<?php
	require "fpdf.php";
	$db = new PDO('mysql:host=localhost;dbname=koperasi_artha','root','');

    class myPDF extends FPDF
    {
        function header(){
            $this->Image('Lkoperasi.png',10,10,-2800);
            $this->SetFont('Arial','B',14);
            $this->Cell(276,5,"Data Riwayat Anggota",0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',12);
            $this->Ln(20);
        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page',$this->PageNo().'/{nb}',0,0,'C');
        }
        function headerTable(){
        	$this->SetFont('Times','B',12);
        	$this->Cell(40,10,'No',1,0,'C');
        	$this->Cell(40,10,'Nama',1,0,'C');
        	$this->Cell(40,10,'Tanggal',1,0,'C');
        	$this->Cell(40,10,'Total',1,0,'C');
        	$this->Cell(50,10,'Bayar',1,0,'C');
        	$this->Ln();
        }
        function viewTable($db){
        	$this->SetFont('Times','',12);
        	$stmt = $db->query('select * from riwayat');
        	$nomor=1;
        	while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
        		$this->Cell(40,10,$nomor,1,0,'C');
	        	$this->Cell(40,10,$data->nama,1,0,'C');
	        	$this->Cell(40,10,$data->tanggal,1,0,'C');
	        	$this->Cell(40,10,$data->total,1,0,'C');
	        	$this->Cell(50,10,$data->bayar,1,0,'C');
	        	$this->Ln();
	        	$nomor++;
        	}
        }
    }

    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->viewTable($db);
    $pdf->Output();
?>