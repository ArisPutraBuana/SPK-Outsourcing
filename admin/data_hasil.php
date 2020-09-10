<?php include '../src/header.php'; ?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <H4 align="center">NILAI BOBOT OUTSOURCING</H4>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="0%" cellspacing="0" border="1">
          <tr>
            <th>NO</th>
            <th>Nama Outsourcing</th>
            <th>Biaya</th>
            <th>Manajemen Profesional</th>
            <th>Daya Dukung</th>
            <th>Kredibilitas</th>
          </tr>
          <?php
          $no = 1;
          $ambil = mysqli_query($koneksi, "SELECT * FROM data_nilai");
          while ($data = mysqli_fetch_array($ambil)) {
          ?>
            <tbody>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama_outsourcing'] ?></td>
                <td><?= $data['k1'] ?></td>
                <td><?= $data['k2'] ?></td>
                <td><?= $data['k3'] ?></td>
                <td><?= $data['k4'] ?></td>
              </tr>
            <?php } ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <H4 align="center">TAHAP NORMALISASI</H4>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Outsourcing</th>
              <th>Biaya</th>
              <th>Manajemen Profesional</th>
              <th>Daya Dukung</th>
              <th>Kredibilitas</th>
            </tr>

            <?php
            $crMax = mysqli_query($koneksi, "SELECT max(k1) as maxK1, max(k2) as maxK2, max(k3) as maxK3, max(k4) as maxK4 FROM data_nilai");
            $max = mysqli_fetch_array($crMax);

            $sql2 = mysqli_query($koneksi, "SELECT * FROM data_nilai");
            $no = 1;
            while ($data1 = mysqli_fetch_array($sql2)) {
            ?>
          </thead>
          <tbody>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data1['nama_outsourcing'] ?></td>
              <td><?= round($data1['k1'] / $max['maxK1'], 2) ?></td>
              <td><?= round($data1['k2'] / $max['maxK2'], 2) ?></td>
              <td><?= round($data1['k3'] / $max['maxK3'], 2) ?></td>
              <td><?= round($data1['k4'] / $max['maxK4'], 2) ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="laporan/lap_hasil.php" target="_blank"><button class='d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm'><span class="fas fa-print"></span> Cetak</button></a>
    </div>
    <div class="card-body">
      <H4 align="center">TAHAP PERANKINGAN</H4>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="0%" cellspacing="0" border="1">
          <thead>
            <tr>
              <th>Nama Outsourcing</th>
              <th>Hasil SAW</th>
              <th>Ranking</th>
              <th>Rata - Rata</th>
              <th>Kredit (%)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $bobot = array(0.4, 0.2, 0.2, 0.2);

            $crMax = mysqli_query($koneksi, "SELECT max(k1) as maxK1, max(k2) as maxK2, max(k3) as maxK3, max(k4) as maxK4 FROM data_nilai");
            $max = mysqli_fetch_array($crMax);
            $hapus = mysqli_query($koneksi, "TRUNCATE TABLE data_hasil");
            $sql3 = mysqli_query($koneksi, "SELECT * FROM data_nilai");
            $no = 1;
            while ($data2 = mysqli_fetch_array($sql3)) {
              $rangking = round(
                (($data2['k1'] / $max['maxK1']) * $bobot[0]) +
                  (($data2['k2'] / $max['maxK2']) * $bobot[1]) +
                  (($data2['k3'] / $max['maxK3']) * $bobot[2]) +
                  (($data2['k4'] / $max['maxK4']) * $bobot[3]),
                3
              );

              $input1 = mysqli_query($koneksi, "INSERT INTO data_hasil VALUES('$no++','$data2[nama_outsourcing]','$data2[k1]','$data2[k2]','$data2[k3]','$data2[k4]','$rangking')") or die(mysqli_error($koneksi));

              $no++;
            }
            $sql5 = mysqli_query($koneksi, "SELECT * FROM data_hasil ORDER BY hasil DESC");
            $r = 1;
            while ($rank = mysqli_fetch_array($sql5)) {
              $sql21 = mysqli_query($koneksi, "SELECT * FROM data_nilai WHERE nama_outsourcing = '$rank[nama_outsourcing]'");
              $rata = mysqli_fetch_array($sql21);

              $rata2 = (($rata['k1'] * $bobot[0]) + ($rata['k2'] * $bobot[1]) + ($rata['k3'] * $bobot[2]) + ($rata['k4'] * $bobot[3]));

              if ($rata2 < 65) {
                $ket = "Tidak di rekomendasikan";
              } else {
                $ket = "Di rekomendasikan";
              }
            ?>
              <tr>
                <td><?= $rank['nama_outsourcing'] ?></td>
                <td><?= $rank['hasil'] ?></td>
                <td><?= $r++ ?></td>
                <td><?= $rata2 ?></td>
                <td><?= $ket ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include '../src/footer.php'; ?>