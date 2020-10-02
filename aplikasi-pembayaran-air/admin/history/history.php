<?php

    include "../../template/navbar.php"; 
    include "../../controller/koneksi.php";

    $dataPelanggan = queryPelanggan("SELECT * FROM pembayaran");


?>

<div class="container-fluid">
            <div class="col-xl-12 col-lg-10">
              <div class="card shadow mb-4">
              
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">History Transaksi</h6>
                </div>
                <div class="card-body">
                  <div class="table-resposive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No Pembayaran</th>
                                  <th>Kode Pelanggan</th>
                                  <th>No Rekening</th>
                                  <th>Nama Pelanggan</th>
                                  <th>Meteran Awal (M<sup>3</sup>)</th>
                                  <th>Meteran Akhir (M<sup>3</sup>)</th>
                                  <th>Jumlah Pemakaian (M<sup>3</sup>)</th>
                                  <th>Tanggal Bayar</th>
                                  <th>Total Harga Rp.</th>
                                  <th>Jumlah Bayar Rp.</th>
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
                                  <td><?= $pelanggan['no_pembayaran']; ?></td>
                                  <td><?= $pelanggan['kode_pelanggan']; ?></td>
                                  <td><?= $pelanggan['no_rekening']; ?></td>
                                  <td><?= $pelanggan['nama']; ?></td>
                                  <td><?= $pelanggan['meteran_awal']; ?></td>
                                  <td><?= $pelanggan['meteran_akhir']; ?></td>
                                  <td><?= $pelanggan['jumlah_pemakaian']; ?></td>
                                  <td><?= $pelanggan['tgl_bayar']; ?></td>
                                  <td><?= $pelanggan['harga_total']; ?></td>
                                  <td><?= $pelanggan['jumlah_bayar']; ?></td>
                                  <td><a href="hapusHistory.php?id=<?php echo $pelanggan['id'];?>"><i class="fas fa-trash-alt"></i></a></td>
                                  
                              </tr>
                              <?php $i++; ?>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  </div>
                 
                </div>
              </div>
          </div>
        </div>







<?php include "../../template/tempScript.php"; ?>
</body>
<html>