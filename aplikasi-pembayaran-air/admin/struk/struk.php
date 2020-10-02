<?php

include "fpdf/fpdf.php";
include "../../controller/koneksi.php";

error_reporting(0);
session_start();


$id = $_GET['no_pembayaran'];


$pdf = new FPDF('L','mm');
$pdf-> AddPage('');

$pdf->SetFont('Arial','B',14);
$pdf->Cell(27,5,'',0,0);
$pdf->Cell(184,5,'SUMBER HURIP ABADI',0,0);
$pdf->Cell(80,5,'INVOICE',0,1);



$pdf->SetFont('Arial','',12);
$pdf->Cell(27,5,'',0,0);
$pdf->Cell(200,5,'Kp.pulokapuk RT.02/RW.005',0,0);
$pdf->Cell(59,5,'',0,1);
$pdf->Cell(27,5,'',0,0);
$pdf->Cell(200,5,'Desa Mekarmukti',0,0);
$pdf->Cell(59,5,'',0,1);

$sql = mysqli_query($koneksi, "SELECT * FROM tagihan WHERE no_pembayaran = '$id'");
while($data = mysqli_fetch_array($sql)){
$pdf->Cell(27,5,'',0,0);
$pdf->Cell(183,5,'Kabupaten Bekasi Jawa Barat 17835',0,0);
$pdf->Cell(35,5,'Tanggal',0,0);
$pdf->Cell(34,5,$data['tgl_bayar'],0,1);


$pdf->Cell(210,5,'',0,0);
$pdf->Cell(35,5,'Costumer id',0,0);
$pdf->Cell(34,5,$data['kode_pelanggan'],0,1);

$pdf->Cell(210,5,'',0,0);
$pdf->Cell(35,5,'No Pembayaran',0,0);
$pdf->Cell(34,5,$data['no_pembayaran'],0,1);


// Data
$pdf->Cell(189,10,'Kepada yang terhormat,',0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(80,5,'Pelanggan Atas Nama,',0,1);
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(80,5,$data["nama"],0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,'',0,1);


// ------------------------------------------------
$pdf->SetFont('Arial','B',12);

$pdf->Cell(100,5,'Pemakaian Air Bersih',1,0,'C');
$pdf->Cell(150,5,'Rincian Tagihan',1,0,'C');
$pdf->Cell(34,5,'',0,1);


$pdf->SetFont('Arial','',12);
$pdf->Cell(55,5,'CATATAN METER',1,0,'C');
$pdf->Cell(45,5,'PEMAKAIAN',1,0,'C');
$pdf->Cell(50,5,'0-10 M3',1,0,'C');
$pdf->Cell(50,5,'11-20 M3',1,0,'C');
$pdf->Cell(50,5,'> 21 M3',1,0,'C');
$pdf->Cell(34,5,'',0,1);

$pdf->Cell(34,5,'AWAL',1,0,'C');
$pdf->Cell(34,5,'AKHIR',1,0,'C');
$pdf->Cell(32,5,'M3',1,0,'C');
$pdf->Cell(50,5,'KATEGORI',1,0,'C');
$pdf->Cell(50,5,'TARIF',1,0,'C');
$pdf->Cell(50,5,'JUMLAH',1,0,'C');
$pdf->Cell(34,5,'',0,1);

$pdf->Cell(34,40,$data['meteran_awal'],1,0,'C');
$pdf->Cell(34,40,$data['meteran_akhir'],1,0,'C');
$pdf->Cell(32,40,$data['jumlah_pemakaian'],1,0,'C');
$pdf->Cell(50,10,$data['kategori1'],1,0,'C');
$pdf->Cell(50,10,'Rp. 6000',1,0,'C');
$pdf->Cell(50,10,'Rp. '.$data['harga1'],1,0,'R');
$pdf->Cell(30,10,'',0,1);

$pdf->Cell(34,20,'',0,0,'C');
$pdf->Cell(34,20,'',0,0,'C');
$pdf->Cell(32,20,'',0,0,'C');
$pdf->Cell(50,10,$data['kategori2'],1,0,'C');
$pdf->Cell(50,10,'Rp. 6400',1,0,'C');
$pdf->Cell(50,10,'Rp. '.$data['harga2'],1,0,'R');
$pdf->Cell(30,10,'',0,1);

$pdf->Cell(34,10,'',0,0,'C');
$pdf->Cell(34,10,'',0,0,'C');
$pdf->Cell(32,10,'',0,0,'C');
$pdf->Cell(50,10,$data['kategori3'],1,0,'C');
$pdf->Cell(50,10,'Rp. 7000',1,0,'C');
$pdf->Cell(50,10,'Rp. '.$data['harga3'],1,0,'R');
$pdf->Cell(30,10,'',0,1);

$pdf->Cell(34,10,'',0,0,'C');
$pdf->Cell(34,10,'',0,0,'C');
$pdf->Cell(32,10,'',0,0,'C');
$pdf->Cell(50,10,$data['jumlah_pemakaian'],1,0,'R');
$pdf->Cell(50,10,'',1,0,'R');
$pdf->Cell(50,10,$data['harga1']+$data['harga2']+$data['harga3'],1,0,'R');
$pdf->Cell(30,10,'',0,1);

$pdf->Cell(34,5,'',0,0,'C');
$pdf->Cell(34,5,'',0,0,'C');
$pdf->Cell(32,10,'',0,0,'C');
$pdf->Cell(80,6,'Abondemen',1,0,'C');
$pdf->Cell(70,6,'Rp. 20000',1,0,'C');
$pdf->Cell(30,6,'',0,1);

$pdf->Cell(34,5,'',0,0,'C');
$pdf->Cell(34,5,'',0,0,'C');
$pdf->Cell(32,10,'',0,0,'C');
$pdf->Cell(80,6,'Tunggakan Bulan Lalu',1,0,'C');
$pdf->Cell(70,6,'Rp. '.$data['tunggakan'],1,0,'C');

$pdf->Cell(30,6,'',0,1);
$pdf->Cell(34,5,'',0,0,'C');
$pdf->Cell(34,5,'',0,0,'C');
$pdf->Cell(32,10,'',0,0,'C');
$pdf->Cell(80,6,'Denda',1,0,'C');
$pdf->Cell(70,6,'Rp. '.$data['denda'],1,0,'C');

$pdf->Cell(30,6,'',0,1);
$pdf->Cell(34,5,'',0,0,'C');
$pdf->Cell(34,5,'',0,0,'C');
$pdf->Cell(32,10,'',0,0,'C');
$pdf->Cell(80,6,'TOTAL',1,0,'C');

$pdf->Cell(70,6,'Rp. '.$data['harga_total'],1,0,'C');

$date = date('d F yy', strtotime('+2 month'));
$pdf->Cell(30,8,'',0,1);
$pdf->Cell(34,5,'',0,0,'C');
$pdf->Cell(34,5,'',0,0,'C');
$pdf->Cell(32,10,'',0,0,'C');
$pdf->Cell(164,6,'Bayar Paling Telat tangal '.$date.'. 2 bulan tidak bayar diadakan pemutusan',0,0,'C');

$pdf->Cell(30,8,'',0,1);

$pdf->Cell(100,6,$data['tgl_bayar'],0,0,'C');




}



$pdf->Ln(20);

$pdf->SetFont('Arial','B',11);
$pdf->Ln(10);
$pdf->Cell(100,5,'(H. SADIM BAHRUDIN, HR, SKM)',0,1,'C');

$pdf->Image('logos.jpg',10,10,25);


$pdf->Output();




?>