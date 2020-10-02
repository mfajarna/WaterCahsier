<?php

        include "../../controller/koneksi.php";


        $id = $_POST['id'];
        $kode_pelanggan= $_POST['kode_pelanggan'];
        $no_rekening = $_POST['no_rekening'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $bulan = $_POST['bulan'];
        $meteran = $_POST['meteran'];

        $update = mysqli_query($koneksi, "UPDATE pelanggan SET
        kode_pelanggan ='$kode_pelanggan',
        no_rekening ='$no_rekening',
        nama = '$nama',
        alamat = '$alamat',
        no_telp ='$no_telp',
        bulan ='$bulan',
        meteran = '$meteran'
        WHERE id = '$id'");


            if($update){
                echo 
                "<script>
                    alert('Sukses Update Data');
                    document.location='pelanggan.php';
                </script>";
            }
            else{
                mysqli_error($update);
            }



?>