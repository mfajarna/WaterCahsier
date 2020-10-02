<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $namadB = "db_pembayaran_air";

    $koneksi = mysqli_connect($servername,$username,$password,$namadB);

    if($koneksi){

    }
    else{
        mysqli_error($koneksi);
    }

    // Input Tarif Air
    function inputAir($data){
        global $koneksi;
    
        $kode_air = htmlspecialchars($data['kode_air']);
        $nama_tarif = htmlspecialchars($data['nama_tarif']);
        $harga = htmlspecialchars($data['harga']);
        $ukuranawal = htmlspecialchars($data['ukuran_awal']);
        $ukuranakhir = htmlspecialchars($data['ukuran_akhir']);
        $beban = htmlspecialchars($data['beban']);
    
    
            mysqli_query($koneksi, "INSERT INTO tarif_air VALUES('','$kode_air','$nama_tarif','$ukuranawal','$ukuranakhir','$harga','$beban')");
            return mysqli_affected_rows($koneksi);
    }

    function inputPelanggan($data){
        global $koneksi;
    
        $kode_pelanggan = htmlspecialchars($data['kode_pelanggan']);
        $no_rekening = htmlspecialchars($data['no_rekening']);
        $nama = htmlspecialchars($data['nama']);
        $alamat = htmlspecialchars($data['alamat']);
        $no_telp = htmlspecialchars($data['no_telp']);
        $bulan = htmlspecialchars($data['bulan']);
        $meteran = htmlspecialchars($data['meteran']);
        


        $result = mysqli_query($koneksi,"SELECT no_rekening FROM pelanggan WHERE no_rekening ='$no_rekening'");

        if(mysqli_num_rows($result) > 0){
            echo "
            <script>
            alert('Nomor Rekening Sudah Terdaftar');            
            </script>";
            return false;
        }
    
        mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('','$kode_pelanggan','$no_rekening','$nama','$alamat','$no_telp','$bulan','$meteran')");
        return mysqli_affected_rows($koneksi);
    
    
    }

    function inputPembayaran($data){
        global $koneksi;
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
        $bulan_bayar =htmlspecialchars($_POST['bulan_bayar']);
        $kategori1= htmlspecialchars($_POST['kategori1']);
        $kategori2= htmlspecialchars($_POST['kategori2']);
        $kategori3= htmlspecialchars($_POST['kategori3']);


            mysqli_query($koneksi, "INSERT INTO pembayaran VALUES('','$no_pembayaran','$kode_pelanggan','$no_rekening','$nama','$meteran_awal','$meteran_akhir','$jumlah_pemakaian','$kategori1','$kategori2','$kategori3','$tgl_bayar','$bulan_bayar','$harga_total','$jumlah_bayar')");
            mysqli_query($koneksi, "UPDATE tagihan set status ='Lunas' WHERE id ='$id'");

            return mysqli_affected_rows($koneksi);


           
    
    }

    function inputTagihan($data){
        global $koneksi;
        $id =  htmlspecialchars($_POST['id']);
        $no_pembayaran = htmlspecialchars($_POST['no_pembayaran']);
        $kode_pelanggan = htmlspecialchars($_POST['kode_pelanggan']);
        $no_rekening = htmlspecialchars($_POST['no_rekening']);
        $nama = htmlspecialchars($_POST['nama']);
        $meteran_awal = htmlspecialchars($_POST['meteran_awal']);
        $tgl_bayar = htmlspecialchars($_POST['tgl_bayar']);
        $meteran_akhir = htmlspecialchars($_POST['meteran_akhir']);
        $jumlah_pemakaian = htmlspecialchars($_POST['jumlah_pemakaian']);
        $harga_total = htmlspecialchars($_POST['harga_total']);;
        $bulan_bayar =htmlspecialchars($_POST['bulan_bayar']);
        $kategori1= htmlspecialchars($_POST['kategori1']);
        $kategori2= htmlspecialchars($_POST['kategori2']);
        $kategori3= htmlspecialchars($_POST['kategori3']);
        $harga1= htmlspecialchars($_POST['harga1']);
        $harga2= htmlspecialchars($_POST['harga2']);
        $harga3= htmlspecialchars($_POST['harga3']);
        $denda= htmlspecialchars($_POST['denda']);
        $tunggakan= htmlspecialchars($_POST['tunggakan']);



            mysqli_query($koneksi, "INSERT INTO tagihan VALUES('','$no_pembayaran','$kode_pelanggan','$no_rekening','$nama','$meteran_awal','$meteran_akhir','$jumlah_pemakaian','$kategori1','$kategori2','$kategori3','$harga1','$harga2','$harga3','$denda','$tunggakan','$tgl_bayar','$bulan_bayar','$harga_total','BelumLunas')");

            mysqli_query($koneksi, "UPDATE pelanggan set meteran ='$meteran_akhir' WHERE kode_pelanggan ='$kode_pelanggan'");
            return mysqli_affected_rows($koneksi);


           
    
    }

    // Lihat Data Tarif Air
    function queryAir($query){
        global $koneksi;
        $result = mysqli_query($koneksi,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function hapusAir($id){
        global $koneksi;
    
        mysqli_query($koneksi, "DELETE FROM tarif_air WHERE id = '$id'");
        return mysqli_affected_rows($koneksi);
    }


    function queryPelanggan($query){
        global $koneksi;
        $result = mysqli_query($koneksi,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function queryHistory($query){
        global $koneksi;
        $result = mysqli_query($koneksi,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function queryTagihan($query){
        global $koneksi;
        $result = mysqli_query($koneksi,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
   
    function hapusPelanggan($id){
        global $koneksi;
    
        mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id = '$id'");
        return mysqli_affected_rows($koneksi);
    }

    function hapusTransaksi($id){
        global $koneksi;
    
        mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id = '$id'");
        return mysqli_affected_rows($koneksi);
    }

    function hapusTagihan($id){
        global $koneksi;
    
        mysqli_query($koneksi, "DELETE FROM tagihan WHERE id = '$id'");
        return mysqli_affected_rows($koneksi);
    }
?>