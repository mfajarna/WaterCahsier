<?php
    include "../../template/navbar.php";
    include "../../controller/koneksi.php";
    
    $carikode = mysqli_query($koneksi,"select max(kode_pelanggan) from pelanggan");
    $datakode = mysqli_fetch_array($carikode);
    if ($datakode) {
        $nilaikode = substr($datakode[0], 3);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $hasilkode = "USR".str_pad($kode, 3, "0", STR_PAD_LEFT);
    } else {
        $hasilkode = "USR001";
    }

    if(isset($_POST['submit'])){
        if(inputPelanggan($_POST) > 0){
            echo "<script>
                        alert('Sukses Menambahkan Data');
                        document.location='pelanggan.php';
                  </script>";
        }
        else{
            echo mysqli_error($koneksi);
        }
    }
?>

<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Pelanggan</h1>
        </div>
        </div>
        <br>
        <div class="container">
        <form action="#" method="post">
            <div class="form">
            <div class="form-group">
                <label>Kode</label>
                <input type="text" class="form-control" name="kode_pelanggan" id="kode_pelanggan" placeholder="kode_pelanggan" value="<?php echo $hasilkode; ?>" readonly>
            </div>
            <div class="form-group">
                <label>No Rekening</label>
                <input type="number" class="form-control" name="no_rekening" id="no_rekening" placeholder="No Rekening" required>
            </div>
            <div class="row">
            <div class="form-group col-md-6">
                <label>Nama Pelanggan</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pelanggan" required>
            </div>
            <div class="form-group col-md-6">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
            </div>
            </div>  
            <div class="form-group">
                <label>No Telepon</label>
                <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" required>
            </div>
            <div class="form-group">
                <label>Bulan</label>
                <select id="bulan" name="bulan" class="form-control" placeholder="Bulan">
                <option selected name="bulan"> <?php echo date("F"); ?></option>
                <option value='January'>January</option>
                <option value='February'>February</option>
                <option value='March'>March</option>
                <option value='April'>April</option>
                <option value='May'>May</option>
                <option value='April'>June</option>
                <option value='July'>July</option>
                <option value='August'>August</option>
                <option value='September'>September</option>
                <option value='October'>October</option>
                <option value='November'>November</option>
                <option value='December'>December</option>
                </select>
            </div>
            <div class="form-group">
                <label>Meteran M(<sup>3</sup>)</label>
                <input type="number" class="form-control" name="meteran" id="meteran" placeholder="Meteran" required>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Tambah Data">  
        </form>
        </div>






<?php include "../../template/tempScript.php"; ?>

</body>
</html>