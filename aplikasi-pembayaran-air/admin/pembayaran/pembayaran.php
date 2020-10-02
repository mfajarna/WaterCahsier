<?php 
    include "../../template/navbar.php"; 
    include "../../controller/koneksi.php";
    

    if(isset($_POST['submit'])){
        if(inputPembayaran($_POST) > 0){
            echo "<script>
            alert('Sukses Membayar');
            document.location='../adminpanel.php';
            </script>";
        }
        else{
            echo mysqli_error($koneksi);
        }
    }
    $data1 = "TRF001";
    
?>

<script>

      function hitungan(){

      var meteran_akhir = document.forms.input.meteran_akhir.value;
      var meteran_awal =  document.forms.input.meteran_awal.value;
      
      var jumlah_bayar = document.forms.input.jumlah_bayar.value
      var kembalian = document.forms.input.kembalian.value;
      var harga_total = document.forms.input.harga_total.value;

      var finalMeteran = meteran_akhir - meteran_awal;

      var kategori1 = document.forms.input.kategori1.value;
      var kategori2 = document.forms.input.kategori2.value;
      var kategori3 = document.forms.input.kategori3.value;

      var total_kategori = kategori1+kategori2+kategori3;      

      var jumlah_pemakaian = document.forms.input.jumlah_pemakaian.value = meteran_akhir-meteran_awal;
      var jumlah_akhir = jumlah_pemakaian/3;
      
          
          if(jumlah_pemakaian <= 10){
          
          var jumlah_pemakaian = document.forms.input.jumlah_pemakaian.value = meteran_akhir-meteran_awal;
          var harga = 6000;
          var beban = 20000;

          document.forms.input.harga_total.value = jumlah_pemakaian*harga+20000;
          }
          else if (jumlah_pemakaian > 10 && jumlah_pemakaian < 20){
          
          var jumlah_pemakaian = document.forms.input.jumlah_pemakaian.value = meteran_akhir-meteran_awal;
          var harga = 6400;
          var beban = 20000;

          document.forms.input.harga_total.value = jumlah_pemakaian*harga+20000;
          }
          if (jumlah_pemakaian >= 20){
          
          var jumlah_pemakaian = document.forms.input.jumlah_pemakaian.value = meteran_akhir-meteran_awal;
          var harga = 7000;
          var beban = 20000;

          document.forms.input.harga_total.value = jumlah_pemakaian*harga+20000;
          }


      }



  </script>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">FORM PEMBAYARAN</h1>
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
                        <input type="text" class="form-control" name="no_pembayaran" id="no_pembayaran" placeholder="No Pembayaran" readonly>
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
                    <div class="row ml-1">
                    <div class="form-group col-md-12">
                        <label>Tanggal Bayar</label>
                        <input type="hidden" name="bulan_bayar" id="bulan_bayar" value="<?php echo date('F'); ?>">
                        <input type="text" class="form-control" name="tgl_bayar"  id="tgl_bayar" placeholder="Tanggal Bayar" readonly>
                    </div>
                    </div>
                    <hr class="my-2 mx-3">
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Meteran Akhir (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="meteran_akhir" onblur="return hitungan();" id="meteran_akhir" placeholder="Meteran Akhir" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Jumlah Pemakaian  (M<sup>3</sup>)</label>
                        <input type="number" class="form-control"  name="jumlah_pemakaian" onblur="return hitungan();" id="jumlah_pemakaian" placeholder="Jumlah Pemakaian" readonly>
                    </div>
                    </div>
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Kategori 1 (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="kategori1" id="kategori1" placeholder="Kategori" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Kategori 2 (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="kategori2" id="kategori2" placeholder="Kategori" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Kategori 3 (M<sup>3</sup>)</label>
                        <input type="number" class="form-control" name="kategori3" id="kategori3" placeholder="Kategori" readonly>
                    </div>
                    </div>
                    </div>
                    <hr class="my-2 mx-3">
                    <div class="form-group col-md-4">
                        <label>Harga Total (Rp.)</label>
                        <input type="number" class="form-control"  name="harga_total" id="harga_total" onblur="return hitungan();" placeholder="Harga Total" readonly>
                    </div>
                    <div class="row ml-1">
                    <div class="form-group col-md-4">
                        <label>Jumlah Bayar (Rp.)</label>
                        <input type="number" class="form-control" name="jumlah_bayar" id="jumlah_bayar" onblur="return hitungan();" placeholder="Jumlah Bayar">
                    </div>  
                    </div>
                    <div class="form-group col-md-4">
                    <input type="submit" name="submit" class="btn btn-primary col-md-5" value="Bayar">
                    <input type="reset" name="reset" class="btn btn-danger col-md-5" value="Batal">
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </form>
          </div>
     
    </div>
<?php include "../../template/tempScript.php"; ?>

<script>

    function getDetails(str){
        if(str.length == 0){
            document.getElementById("nama").value = "";
            document.getElementById("meteran_awal").value = "";
            document.getElementById("id").value = "";
            document.getElementById("kode_pelanggan").value = "";
            document.getElementById("tgl_bayar").value = "";
            document.getElementById("meteran_akhir").value = "";
            document.getElementById("jumlah_pemakaian").value = "";
            document.getElementById("harga_total").value = "";
            document.getElementById("no_pembayaran").value = "";
            document.getElementById("kategori1").value = "";
            document.getElementById("kategori2").value = "";
            document.getElementById("kategori3").value = "";
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
                    document.getElementById("tgl_bayar").value = myObj[4];
                    document.getElementById("meteran_akhir").value = myObj[5];
                    document.getElementById("jumlah_pemakaian").value = myObj[6];
                    document.getElementById("harga_total").value = myObj[7];
                    document.getElementById("no_pembayaran").value = myObj[8];
                    document.getElementById("kategori1").value = myObj[9];
                    document.getElementById("kategori2").value = myObj[10];
                    document.getElementById("kategori3").value = myObj[11];

                }
            }
            xmlhttp.open("GET", "search2.php?no_rekening=" + str, true);
            xmlhttp.send();
        }
    }



</script>

</body>
</html>
