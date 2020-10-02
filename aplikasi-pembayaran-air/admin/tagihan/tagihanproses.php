<?php

include "../../controller/koneksi.php";

$id =  $_POST['id'];
$no_pembayaran = $_POST['no_pembayaran'];
$kode_pelanggan = $_POST['kode_pelanggan'];
$no_rekening = $_POST['no_rekening'];
$nama = $_POST['nama'];
$meteran_awal = $_POST['meteran_awal'];
$tgl_bayar = $_POST['tgl_bayar'];
$meteran_akhir = $_POST['meteran_akhir'];
$jumlah_pemakaian = $_POST['jumlah_pemakaian'];
$harga_total = $_POST['harga_total'];
$bulan_bayar= $_POST['bulan_bayar'];
$kategori1= $_POST['kategori1'];
$kategori2= $_POST['kategori2'];
$kategori3= $_POST['kategori3'];
$harga1= $_POST['harga1'];
$harga2= $_POST['harga2'];
$harga3= $_POST['harga3'];
$denda= $_POST['denda'];
$tunggakan= $_POST['tunggakan'];
$status= $_POST['status'];


$update = mysqli_query($koneksi, "UPDATE tagihan SET

        no_pembayaran = '$no_pembayaran',
        kode_pelanggan = '$kode_pelanggan',
        no_rekening = '$no_rekening',
        nama = '$nama',
        meteran_awal = '$meteran_awal',
        meteran_akhir = '$meteran_akhir',
        jumlah_pemakaian = '$jumlah_pemakaian',
        kategori1 = '$kategori1',
        kategori2 = '$kategori2',
        kategori3 = '$kategori3',
        harga1 = '$harga1',
        harga2 = '$harga2',
        harga3 = '$harga3',
        denda = '$denda',
        tunggakan = '$tunggakan',
        tgl_bayar = '$tgl_bayar',
        bulan_bayar = '$bulan_bayar',
        harga_total = '$harga_total',
        status = '$status' WHERE id = '$id'
");

$update2 =  mysqli_query($koneksi, "UPDATE pelanggan set meteran ='$meteran_akhir' WHERE kode_pelanggan ='$kode_pelanggan'");

if($update && $update2){
    echo 
    "<script>
        alert('Sukses Update Data');
        document.location='tagihan.php';
    </script>";
}
else{
    mysqli_error($update);
}



?>