<?php

include "../../controller/koneksi.php";

$id =  htmlspecialchars($_POST['id']);
$no_pembayaran = htmlspecialchars($_POST['no_pembayaran']);
$kode_pelanggan = htmlspecialchars($_POST['kode_pelanggan']);
$no_rekening = htmlspecialchars($_POST['no_rekening']);
$nama = htmlspecialchars($_POST['nama']);
$meteran_awal = htmlspecialchars($_POST['meteran_awal']);
$tgl_bayar = htmlspecialchars($_POST['tgl_bayar']);
$meteran_akhir = htmlspecialchars($_POST['meteran_akhir']);
$jumlah_pemakaian = htmlspecialchars($_POST['jumlah_pemakaian']);
$harga_total = htmlspecialchars($_POST['harga_total']);
$jumlah_bayar = htmlspecialchars($_POST['jumlah_bayar']);
$kembalian = htmlspecialchars($_POST['kembalian']);


    $input = mysqli_query($koneksi, "INSERT INTO pembayaran VALUES('','$no_pembayaran','$kode_pelanggan','$no_rekening','$nama','$meteran_awal','$meteran_akhir','$jumlah_pemakaian','$tgl_bayar','$harga_total','$jumlah_bayar','Lunas')");

    $update =mysqli_query($koneksi, "UPDATE pelanggan set meteran ='$meteran_akhir' WHERE id ='$id'");
    

    if($input && $update){
        echo "<script> window.open('../struk/struk.php?no_pembayaran=".$no_pembayaran."','_blank')</script>";
    }

    

?>