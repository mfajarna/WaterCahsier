<?php

    include "../../template/navbar.php"; 
    include "../../controller/koneksi.php";


    $dataPelanggan = queryTagihan("SELECT * FROM tagihan WHERE status='BelumLunas'");



?>

<div class="container-fluid">
            <div class="col-xl-12 col-lg-10">
              <div class="card shadow mb-4">
              
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tagihan</h6>
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
                                  <th>Harga Total</th>
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
                                  <td><a href="../struk/struk.php?no_pembayaran=<?php echo $pelanggan['no_pembayaran']; ?>" target="_blank"><i class="fa fa-print" aria-hidden="true"> Print Struk | </i> <a href="tagihanEdit.php?id=<?php echo $pelanggan['id']; ?>"><i class="fa fa-edit" aria-hidden="true"> Edit</i> </a>|<br> <a href="hapusTagihan.php?id=<?php echo $pelanggan['id'];?>"><i class="fas fa-trash-alt"> Hapus</i></a></td>
                                  
                              </tr>
                              <?php $i++; ?>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  </div>
                 
                </div>
              </div>
              <a href="tambahTagihan.php" class="btn btn-success btn-icon-split ">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Tagihan</span>
              </a>
          </div>
        </div>


        <?php include "../../template/tempScript.php"; ?>
</body>
</html>