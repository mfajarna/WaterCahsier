<?php

    include "../controller/koneksi.php";

    $id = $_POST['id'];
    $kode_air= $_POST['kode_air'];
    $nama_tarif = $_POST['nama_tarif'];
    $ukuran_awal = $_POST['ukuran_awal'];
    $ukuran_akhir = $_POST['ukuran_akhir'];
    $harga = $_POST['harga'];
    $beban = $_POST['beban'];

    $update = mysqli_query($koneksi, "UPDATE tarif_air SET
                kode_air ='$kode_air',
                nama_tarif ='$nama_tarif',
                ukuran_awal = '$ukuran_awal',
                ukuran_akhir = '$ukuran_akhir',
                harga ='$harga',
                beban ='$beban'
                WHERE id = '$id'");

    if($update){
        echo 
        "<script>
            alert('Sukses Update Data');
            document.location='tarifAir.php';
        </script>";
    }
    else{
        mysqli_error($update);
    }



?>