<?php include '../src/header.php'; ?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Dashboard</b> </h1>
  </div>
  <hr>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data User</div>
              <?php
              $sql = mysqli_query($koneksi, "SELECT count(id_user) as user FROM data_user");
              $dtU = mysqli_fetch_array($sql);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dtU['user'] ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Kriteria</div>
              <?php
              $sql1 = mysqli_query($koneksi, "SELECT count(id_kriteria) as kriteria FROM data_kriteria");
              $dtK  = mysqli_fetch_array($sql1);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dtK['kriteria'] ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-server fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Outsourcing</div>
              <?php
              $sql1 = mysqli_query($koneksi, "SELECT count(id_outsourcing) as outsourcing FROM data_outsourcing");
              $dtK  = mysqli_fetch_array($sql1);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dtK['outsourcing'] ?></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Hasil SAW</div>
              <?php
              $sql1 = mysqli_query($koneksi, "SELECT count(id_hasil) as hasil FROM data_hasil");
              $dtK  = mysqli_fetch_array($sql1);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dtK['hasil'] ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-th-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table>
          <h1 align="center">SELAMAT DATANG DI APLIKASI PEMILIHAN PERUSAHAAN OUTSOURCING DENGAN METODE SAW</h1>
          <h3 align="center"><img src="../assets/img/1.png" width="1000" height="750"></h3>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

<?php include '../src/footer.php'; ?>