<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- row ux-->
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2 bg-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Anggota</div>
              <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelUser->getUserWhere(['role_id' => 2])->num_rows(); ?></div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-users fa-3x text-warning"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2 bg-warning">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Kapster</div>
              <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelBuku->getKapsterWhere(['role_kapster' => 0])->num_rows(); ?>
              </div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('buku/kapster'); ?>"><i class="fas fa-hand-scissors fa-3x text-primary"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2 bg-info">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Service</div>
              <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelBuku->getKategoriWhere(['role_kategori' => 0])->num_rows(); ?>
              </div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('buku/kategori'); ?>"><i class="fas fa-cut fa-3x text-dark"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div> 

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2 bg-success">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-md font-weight-bold text-white text-uppercase mb-1">Data Transaksi Booking</div>
              <div class="h1 mb-0 font-weight-bold text-white">
                <?php
                $where = ['dibooking !=0'];
                $totaldibooking = $this->ModelBuku->total('dibooking', $where);
                echo $totaldibooking;
                ?>
              </div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('user'); ?>"><i class="fas fa-shopping-cart fa-3x text-danger"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end row ux-->

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- row table-->
  <div class="row">
    <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
      <div class="page-header">
        <span class="fas fa-users text-primary mt-2 "> Data User</span>
        <a class="text-danger" href="<?php echo base_url('user/anggota'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
      </div>
      <table class="table mt-3">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Anggota</th>
            <th>Email</th>
            <th>Role ID</th>
            <th>Aktif</th>
            <th>Member Sejak</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($anggota as $a) { ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $a['nama']; ?></td>
              <td><?= $a['email']; ?></td>
              <td><?= $a['role_id']; ?></td>
              <td><?= $a['is_active']; ?></td>
              <td><?= date('Y', $a['tanggal_input']); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>


    <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
      <div class="page-header">
        <span class="fas fa-book text-warning mt-2"> Data Barbershop</span>
        <a href="<?= base_url('buku'); ?>"><i class="fas fa-search text-primary mt-2 float-right"> Tampilkan</i></a>
      </div>
      <div class="table-responsive">
        <table class="table mt-3" id="table-datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>Service</th>
              <th>Nama Pemesan</th>
              <th>Kapster</th>
              <th>Tanggal Pemesanan</th>
              <th>Jam Pemesanan</th>
              <th>Pembayaran</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($buku as $b) { ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $b['kategori']; ?></td>
                <td><?= $b['pemesan']; ?></td>
                <td><?= $b['kapster']; ?></td>
                <td><?= $b['tgl_pesan']; ?></td>
                <td><?= $b['jam_pesan']; ?></td>
                <td><?= $b['pembayaran']; ?></td>
                <td><?= $b['harga']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
      <div class="page-header">
        <span class="fas fa-book text-warning mt-2"> Data Kategori Service</span>
        <a href="<?= base_url('buku/kategori'); ?>"><i class="fas fa-search text-primary mt-2 float-right"> Tampilkan</i></a>
      </div>
      <div class="table-responsive">
        <table class="table mt-3" id="table-datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>Service</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($kategori as $k) { ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $k['kategori']; ?></td>
                <td><?= $k['harga']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
      <div class="page-header">
        <span class="fas fa-book text-warning mt-2"> Data Kapster</span>
        <a href="<?= base_url('buku/kategori'); ?>"><i class="fas fa-search text-primary mt-2 float-right"> Tampilkan</i></a>
      </div>
      <div class="table-responsive">
        <table class="table mt-3" id="table-datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>Service</th>
              <th>Alamat</th>
              <th>Telpon</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($kapster as $k) { ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $k['kapster']; ?></td>
                <td><?= $k['alamat']; ?></td>
                <td><?= $k['telpon']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>


  </div>
  <!-- end of row table-->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->