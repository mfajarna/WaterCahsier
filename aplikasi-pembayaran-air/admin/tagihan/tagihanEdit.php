<?php
    include "../../template/navbar.php"; 
    include "../../controller/koneksi.php";

    $id = $_GET['id']; 
    $data = mysqli_query($koneksi, "SELECT * FROM tagihan WHERE id ='$id'");

    while($tagihan = mysqli_fetch_array($data)){

        




?>

    <script>

      function hitungan(){

      var meteran_akhir = parseInt(document.forms.input.meteran_akhir.value);
      var meteran_awal =  parseInt(document.forms.input.meteran_awal.value);
      var kategori1 = parseInt(document.forms.input.kategori1.value);
      var kategori2 = parseInt(document.forms.input.kategori2.value);
      var kategori3 = parseInt(document.forms.input.kategori3.value);

      var denda = parseInt(document.forms.input.denda.value);
      var tunggakan = parseInt(document.forms.input.tunggakan.value);

      var harga1 = document.forms.input.harga1.value = kategori1 * 6000;
      var harga2 = document.forms.input.harga2.value = kategori2 * 6400;
      var harga3 = document.forms.input.harga3.value = kategori3 * 7000;



      
      
      var harga_total = document.forms.input.harga_total.value;


      var jumlah_pemakaian = document.forms.input.jumlah_pemakaian.value = meteran_akhir-meteran_awal;
      
      
    if(jumlah_pemakaian <= 10){
          
          var jumlah_pemakaian = document.forms.input.jumlah_pemakaian.value = meteran_akhir-meteran_awal;
          var harga1 = kategori1*6000; 
          var beban = 20000;

          if(denda == "" && tunggakan == ""){
          document.forms.input.harga_total.value = harga1+beban;
          }
          else if(denda == ""){
          document.forms.input.harga_total.value = harga1+beban+tunggakan;
          }
          else if(tunggakan == ""){
          document.forms.input.harga_total.value = harga1+beban+denda;
          }else{
            document.forms.input.harga_total.value = harga1+beban+denda+tunggakan;
          }
          
          
          }
          else if (jumlah_pemakaian > 10 && jumlah_pemakaian < 20){
          
          var jumlah_pemakaian = document.forms.input.jumlah_pemakaian.value = meteran_akhir-meteran_awal;
          var harga1 = kategori1*6000;
          var harga2 = kategori2*6400;
          var total = harga1+harga2;
          var beban = 20000;

          
          if(denda == "" && tunggakan == ""){
          document.forms.input.harga_total.value = total+beban;
          }
          else if(denda == ""){
          document.forms.input.harga_total.value = total+beban+tunggakan;
          }
          else if(tunggakan == ""){
          document.forms.input.harga_total.value = total+beban+denda;
          }else{
            document.forms.input.harga_total.value = total+beban+denda+tunggakan;
          }
          
          }
          if (jumlah_pemakaian >= 20){
          
          var jumlah_pemakaian = document.forms.input.jumlah_pemakaian.value = meteran_akhir-meteran_awal;
          var harga1 = kategori1*6000;
          var harga2 = kategori2*6400;
          var harga3 = kategori3*7000;
          var total = harga1+harga2+harga3;
          
          var beban = 20000;

          
          if(denda == "" && tunggakan == ""){
          document.forms.input.harga_total.value = total+beban;
          }
          else if(denda == ""){
          document.forms.input.harga_total.value = total+beban+tunggakan;
          }
          else if(tunggakan == ""){
          document.forms.input.harga_total.value = total+beban+denda;
          }else{
            document.forms.input.harga_total.value = total+beban+denda+tunggakan;
          }
          
          }
          
      }



  </script>




<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">FORM Tagihan</h1>
        </div>
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="tagihanproses.php" method="post" name="input">
                    <div class="form">
                    <div class="form-group col-md-12">
                         <label>No Pembayaran</label>
                         <input type="hidden" name="id" id="id" value="<?= $tagihan["id"]; ?>" />
                        <input type="text" class="form-control" name="no_pembayaran" id="no_pembayaran" placeholder="No Pembayaran" value="<?php echo $tagihan['no_pembayaran']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>No Rekening</label>
                        <input type="number"  class="form-control" name="no_rekening" id="no_rekening" placeholder="No Rekening" value="<?php echo $tagihan['no_rekening']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Kode Pelanggan</label>
                        <input type="text" class="form-control" name="kode_pelanggan" id="kode_pelanggan" placeholder="Kode Pelanggan" value="<?php echo $tagihan['kode_pelanggan']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pelanggan" value="<?php echo $tagihan['nama']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Meteran (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="meteran_awal" id="meteran_awal" placeholder="Meteran Awal" value="<?php echo $tagihan['meteran_awal']; ?>" readonly >
                    </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Bayar Pelanggan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="form">
                    <div class="form-group col-md-12">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" name="tgl_bayar" id="tgl_bayar" placeholder="Tanggal Bayar" value="<?php echo $tagihan['tgl_bayar']; ?>" readonly>
                    </div>
                    </div>
                    <hr class="my-2 mx-3">
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Meteran Akhir (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="meteran_akhir" id="meteran_akhir" onblur="return hitungan();" placeholder="Meteran Akhir" value="<?php echo $tagihan['meteran_akhir']; ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Jumlah Pemakaian  (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="jumlah_pemakaian" id="jumlah_pemakaian" onblur="return hitungan();" placeholder="Jumlah Pemakaian" value="<?php echo $tagihan['jumlah_pemakaian']; ?>" readonly>
                    </div>
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Kategori 1 (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="kategori1" id="kategori1" placeholder="Kategori" onblur="return hitungan();" value="<?php echo $tagihan['kategori1']; ?>" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Kategori 2 (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="kategori2" id="kategori2" placeholder="Kategori" onblur="return hitungan();" value="<?php echo $tagihan['kategori2']; ?>" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Kategori 3 (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="kategori3" id="kategori3" placeholder="Kategori" onblur="return hitungan();" value="<?php echo $tagihan['kategori3']; ?>" >
                    </div>
                    </div>
               
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Harga (Rp.)</label>
                        <input type="number" class="form-control" name="harga1" id="harga1" placeholder="Harga" onblur="return hitungan();" value="<?php echo $tagihan['harga1']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Harga (Rp.)</label>
                        <input type="number" class="form-control"  name="harga2" id="harga2" placeholder="Harga" onblur="return hitungan();" value="<?php echo $tagihan['harga2']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Harga (Rp.)</label>
                        <input type="number" class="form-control"  name="harga3" id="harga3" placeholder="Harga" onblur="return hitungan();" value="<?php echo $tagihan['harga3']; ?>" readonly>
                    </div>
                    </div>
                    </div>
                    <hr class="my-2 mx-3">
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Denda (Rp.)</label>
                        <input type="number" class="form-control" name="denda" id="denda" placeholder="Denda" onblur="return hitungan();" value="<?php echo $tagihan['denda']; ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tunggakan Bulan Lalu (Rp.)</label>
                        <input type="number" class="form-control"  name="tunggakan" id="tunggakan" placeholder="Tunggakan" onblur="return hitungan();" value="<?php echo $tagihan['denda']; ?>" required>
                    </div>
                    </div>

                    <hr class="my-2 mx-3">
                    <div class="form-group col-md-4">
                        <label>Harga Total (Rp.)</label>
                        <input type="hidden" name="bulan_bayar" value="<?php echo $tagihan['bulan_bayar']; ?>">
                        <input type="hidden" name="status" value="<?php echo $tagihan['status']; ?>">
                        <input type="number" class="form-control" name="harga_total" id="harga_total" placeholder="Harga Total" onblur="return hitungan();" value="<?php echo $tagihan['harga_total']; ?>" required>
                    </div>
                   
                    <div class="form-group col-md-4">
                    <input type="submit" name="submit" class="btn btn-primary col-md-5" value="Input">
                    <input type="reset" name="reset" class="btn btn-danger col-md-5" value="Batal">
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </form>
    <?php } ?>
          </div>
     
    </div>

    <script>




</script>

    <?php include "../../template/tempScript.php"; ?>
</body>
</html>
