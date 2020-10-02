<?php
    $no_rekening = $_REQUEST['no_rekening'];
    include "../../controller/koneksi.php";

    if($no_rekening !== ""){
        $query=mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE no_rekening = '$no_rekening' ");
        $row = mysqli_fetch_array($query);
        $nama = $row["nama"];
        $meteran_awal = $row["meteran"];
        $id = $row["id"];
        $kode_pelanggan = $row["kode_pelanggan"];
    }

    $result = array("$nama","$meteran_awal","$id","$kode_pelanggan");
    $myJson = json_encode($result);

    echo $myJson;




?>