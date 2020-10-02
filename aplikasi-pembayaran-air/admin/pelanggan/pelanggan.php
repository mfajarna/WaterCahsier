<?php
    include "../../template/navbar.php";
    include "../../controller/koneksi.php";

    $dataPelanggan = queryPelanggan("SELECT * FROM pelanggan");
?>

<div class="container-fluid">
            <div class="col-xl-12 col-lg-10">
              <div class="card shadow mb-4">
              
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
                </div>
                <div class="card-body">
                  <div class="table-resposive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Pelanggan</th>
                                  <th>No Rekening</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>No Telepon</th>
                                  <th>Bulan</th>
                                  <th>Meteran (M<sup>3</sup>)</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php 
                $i = 1;
                foreach ($dataPelanggan as $pelanggan): 
                ?>
                              <tr>
                                  <?php $pelanggan['id']; ?>
                                  <td><?= $i; ?></td>
                                  <td><?= $pelanggan['kode_pelanggan']; ?></td>
                                  <td><?= $pelanggan['no_rekening']; ?></td>
                                  <td><?= $pelanggan['nama']; ?></td>
                                  <td><?= $pelanggan['alamat']; ?></td>
                                  <td><?= $pelanggan['no_telp']; ?></td>
                                  <td><?= $pelanggan['bulan']; ?></td>
                                  <td><?= $pelanggan['meteran']; ?></td>
                                  <td><a href="ubahpelanggan.php?id=<?php echo $pelanggan['id'];?>"><i class="far fa-edit"></i> </a> | <a href="hapuspelanggan.php?id=<?php echo $pelanggan['id'];?>"><i class="fas fa-trash-alt"></i></a></td>
                              </tr>
                              <?php $i++; ?>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  </div>
                 
                </div>
              </div>
              <a href="tambahPelanggan.php" class="btn btn-success btn-icon-split ">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
              </a>
          </div>
        </div>



<?php include "../../template/tempScript.php"; ?>

</body>
</html>