<?php
    include "../../template/navbar.php"; 
    include "../../controller/koneksi.php";

    $carikode = mysqli_query($koneksi,"select max(no_pembayaran) from tagihan");
    $datakode = mysqli_fetch_array($carikode);
    if ($datakode) {
        $nilaikode = substr($datakode[0], 3);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $hasilkode = "TGH".str_pad($kode, 5, "0", STR_PAD_LEFT);
    } else {
        $hasilkode = "TGH0001";
    }

    if(isset($_POST['submit'])){
        if(inputTagihan($_POST) > 0){

            echo "<script>
            alert('Sukses Menambahkan Tagihan');
            document.location='tagihan.php';
            </script>";

        }
        else{
            echo mysqli_error($koneksi);
        }
    }



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
                    <form action="#" method="post" name="input">
                    <div class="form">
                    <div class="form-group col-md-12">
                         <label>No Pembayaran</label>
                         <input type="hidden" name="id" id="id"/>
                        <input type="text" class="form-control" name="no_pembayaran" id="no_pembayaran" placeholder="No Pembayaran" value="<?php echo $hasilkode; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>No Rekening</label>
                        <input type="number" onkeyup="getDetails(this.value)" class="form-control" name="no_rekening" id="no_rekening" placeholder="No Rekening" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Kode Pelanggan</label>
                        <input type="text" class="form-control" name="kode_pelanggan" id="kode_pelanggan" placeholder="Kode Pelanggan" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pelanggan" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Meteran (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="meteran_awal" id="meteran_awal" placeholder="Meteran Awal" readonly>
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
                        <input type="text" class="form-control" name="tgl_bayar" id="tgl_bayar" placeholder="Tanggal Bayar" value="<?php echo date("d F yy") ?>" readonly>
                    </div>
                    </div>
                    <hr class="my-2 mx-3">
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Meteran Akhir (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="meteran_akhir" id="meteran_akhir" placeholder="Meteran Akhir">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Jumlah Pemakaian  (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" onblur="return hitungan();" name="jumlah_pemakaian" id="jumlah_pemakaian" placeholder="Jumlah Pemakaian" readonly>
                    </div>
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Kategori 1 (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="kategori1" id="kategori1" placeholder="Kategori" value="0">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Kategori 2 (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="kategori2" id="kategori2" placeholder="Kategori" value="0">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Kategori 3 (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="kategori3" id="kategori3" placeholder="Kategori" value="0">
                    </div>
                    </div>
               
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Harga (Rp.)</label>
                        <input type="number" class="form-control" onblur="return hitungan();" name="harga1" id="harga1" placeholder="Harga" value="0" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Harga (Rp.)</label>
                        <input type="number" class="form-control"  onblur="return hitungan();" name="harga2" id="harga2" placeholder="Harga" value="0" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Harga (Rp.)</label>
                        <input type="number" class="form-control"  onblur="return hitungan();" name="harga3" id="harga3" placeholder="Harga" value="0" readonly>
                    </div>
                    </div>
                    </div>
                    <hr class="my-2 mx-3">
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Denda (Rp.)</label>
                        <input type="number" class="form-control" onblur="return hitungan();" name="denda" id="denda" placeholder="Denda" value="0">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tunggakan Bulan Lalu (Rp.)</label>
                        <input type="number" class="form-control"  onblur="return hitungan();" name="tunggakan" id="tunggakan" placeholder="Tunggakan" value="0">
                    </div>
                    </div>

                    <hr class="my-2 mx-3">
                    <div class="form-group col-md-4">
                        <label>Harga Total (Rp.)</label>
                        <input type="hidden" name="bulan_bayar" value="<?php echo date('F'); ?>">
                        <input type="number" class="form-control" onblur="return hitungan();" name="harga_total" id="harga_total" placeholder="Harga Total" readonly>
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
          </div>
     
    </div>

    <script>

    function getDetails(str){
        if(str.length == 0){
            document.getElementById("nama").value = "";
            document.getElementById("meteran_awal").value = "";
            document.getElementById("id").value = "";
            document.getElementById("kode_pelanggan").value = "";
            return;
        }else{
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    var myObj =JSON.parse(this.responseText);
                    document.getElementById("nama").value = myObj[0];
                    document.getElementById("meteran_awal").value = myObj[1];
                    document.getElementById("id").value = myObj[2];
                    document.getElementById("kode_pelanggan").value = myObj[3];

                }
            }
            xmlhttp.open("GET", "../pembayaran/search.php?no_rekening=" + str, true);
            xmlhttp.send();
        }
    }



</script>

    <?php include "../../template/tempScript.php"; ?>
</body>
</html>
