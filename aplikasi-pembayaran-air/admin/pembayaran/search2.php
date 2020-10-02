<?php
    $no_rekening = $_REQUEST['no_rekening'];
    include "../../controller/koneksi.php";

    if($no_rekening !== ""){
        $query=mysqli_query($koneksi,"SELECT * FROM tagihan WHERE no_rekening = '$no_rekening' AND status='BelumLunas' ORDER BY status='BelumLunas'");
        $row = mysqli_fetch_array($query);
        $id = $row["id"];
        $no_pembayaran = $row["no_pembayaran"];
        $kode_pelanggan = $row["kode_pelanggan"];
        $nama = $row["nama"];
        $meteran_awal = $row["meteran_awal"];
        $meteran_akhir = $row["meteran_akhir"];
        $jumlah_pemakaian = $row["jumlah_pemakaian"];
        $tgl_bayar = $row["tgl_bayar"];
        $harga_total = $row["harga_total"];
        $status = $row["status"];
        $kategori1 = $row["kategori1"];
        $kategori2 = $row["kategori2"];
        $kategori3 = $row["kategori3"];
        

    }

    $result = array("$nama","$meteran_awal","$id","$kode_pelanggan","$tgl_bayar","$meteran_akhir","$jumlah_pemakaian","$harga_total","$no_pembayaran","$status","$kategori1","$kategori2","$kategori3");
    $myJson = json_encode($result);

    echo $myJson;




?>