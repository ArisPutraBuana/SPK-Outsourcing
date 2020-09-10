<?php include '../src/header.php';

if (isset($_POST['simpan'])) {
  $nama  = $_POST['nama_outsourcing'];
  $k1    = $_POST['k1'];
  $k2    = $_POST['k2'];
  $k3    = $_POST['k3'];
  $k4    = $_POST['k4'];

  $query = mysqli_query($koneksi, "INSERT INTO data_nilai VALUES ('','$nama','$k1','$k2','$k3','$k4')") or die(mysqli_error($koneksi));
  if ($query) :
    echo "<script>alert('Gagal Simpan data'); window.location.href = 'data_nilai.php'</script>";
  else :
    echo "<script>alert('Data Berhasil Disimpan'); window.location.href = 'data_nilai.php'</script>";
  endif;
} elseif (isset($_POST['update'])) {
  $id    = $_POST['id_nilai'];
  $nama  = $_POST['nama_outsourcing'];
  $k1    = $_POST['k1'];
  $k2    = $_POST['k2'];
  $k3    = $_POST['k3'];
  $k4    = $_POST['k4'];

  $query = mysqli_query($koneksi, "UPDATE data_nilai SET nama_outsourcing='$nama',k1='$k1',k2='$k2',k3='$k3',k4='$k4' WHERE id_nilai='$id'") or die(mysqli_error($koneksi));
  if ($query) :
    echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_nilai.php">';
  else :
    echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_nilai.php">';
  endif;
} elseif (isset($_POST['hapus'])) {
  $id    = $_POST['id_nilai'];
  $query = mysqli_query($koneksi, "DELETE FROM data_nilai WHERE id_nilai='$id'") or die(mysqli_error($koneksi));
  if ($query) :
    echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di hapus!', 'success');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_nilai.php">';
  else :
    echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_nilai.php">';
  endif;
}
?>
<!-- Tutup Modal Aksi -->

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Data Nilai Outsourcing</b></h1>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <!-- Modal Tambah -->
      <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm' data-toggle="modal" data-target="#myModal"><span aria-hidden="true"><i class="fas fa-plus"></i></span> Tambah Data</button>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" role="form">
                <div class="form-group">
                  <?php
                  $amil1 = mysqli_query($koneksi, "SELECT max(id_nilai) AS hasil FROM data_nilai") or die(mysqli_error($koneksi));
                  $no = mysqli_fetch_array($amil1);
                  $noBaru = $no['hasil'] + 1;
                  ?>

                </div>

                <div class="form-group">
                  <label for="nama_outsourcing">Nama Outsourcing</label>
                  <select class="form-control" name="nama_outsourcing" required>
                    <option value="">-- Pilih Nama Outsourcing --</option>
                    <?php
                    $sql12 = mysqli_query($koneksi, "SELECT nama_outsourcing FROM data_outsourcing WHERE NOT EXISTS(SELECT nama_outsourcing FROM data_nilai WHERE data_nilai.nama_outsourcing = data_outsourcing.nama_outsourcing)");
                    while ($dt11 = mysqli_fetch_array($sql12)) {
                    ?> <option value="<?php echo $dt11['nama_outsourcing']; ?>"><?php echo $dt11['nama_outsourcing']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="k1">Biaya</label>
                  <input type="number" name="k1" min="1" max="100" class="form-control" placeholder="Input Nilai Biaya 0 - 100" required>
                </div>
                <div class="form-group">
                  <label for="k2">Manajemen Profesional</label>
                  <input type="number" name="k2" min="1" max="100" class="form-control" placeholder="Input Nilai Manajemen Profesional 0 - 100" required>
                </div>
                <div class="form-group">
                  <label for="k3">Daya Dukung</label>
                  <input type="number" name="k3" min="1" max="100" class="form-control" placeholder="Input Nilai Daya Dukung  0 - 100" required>
                </div>
                <div class="form-group">
                  <label for="k4">Kredibilitas</label>
                  <input type="number" name="k4" min="1" max="100" class="form-control" placeholder="Input Nilai Kredibilitas 0 - 100" required>
                </div>
                <div class="modal-footer">
                  <button type="reset" name="simpan" class="btn btn-primary">Reset</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" name="simpan" class="btn btn-primary">Tambah Data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Tutup Modal Tambah -->
      <a href="laporan/lap_nilai.php" target="_blank"><button class='d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm'><span class="fas fa-print"></span> Cetak</button></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>NO</th>
              <th>Nama Outsourcing</th>
              <th>Biaya</th>
              <th>Manajemen Profesional</th>
              <th>Daya Dukung</th>
              <th>Kredibilitas</th>
              <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $ambil = mysqli_query($koneksi, "SELECT * FROM data_nilai");
            while ($data = mysqli_fetch_array($ambil)) {
            ?>
          </thead>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nama_outsourcing'] ?></td>
            <td><?= $data['k1'] ?></td>
            <td><?= $data['k2'] ?></td>
            <td><?= $data['k3'] ?></td>
            <td><?= $data['k4'] ?></td>

            <!-- aksi modal edit -->
            <td class="text-center">
              <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' data-toggle="modal" data-target="#my<?php echo $data['id_nilai']; ?>"><span aria-hidden="true"><i class="fas fa-pencil-alt"></i></span> Edit</button>
              <div class="modal fade" id="my<?php echo $data['id_nilai']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST" role="form">
                        <div class="phAnimate">

                          <input type="hidden" name="id_nilai" class="form-control" value="<?php echo $data['id_nilai']; ?>">
                        </div>
                        <div class="phAnimate">
                          <label for="nama_outsourcing">Nama Outsourcing</label>
                          <input type="text" name="nama_outsourcing" class="form-control" value="<?php echo $data['nama_outsourcing']; ?>" readonly>
                        </div>
                        <div class="phAnimate">
                          <label for="k1">Biaya</label>
                          <input type="number" name="k1" class="form-control" min="1" max="100" placeholder="Input Nilai Biaya 10 - 100" value="<?php echo $data['k1']; ?>" required>
                        </div>
                        <div class="phAnimate">
                          <label for="k2">Manajemen Profesional</label>
                          <input type="number" name="k2" class="form-control" min="1" max="100" placeholder="Input Nilai Manajemen Profesional 10 - 100" value="<?php echo $data['k2']; ?>" required>
                        </div>
                        <div class="phAnimate">
                          <label for="k3">Daya Dukung</label>
                          <input type="number" name="k3" class="form-control" min="1" max="100" placeholder="Input Nilai Daya Dukung 10 - 100" value="<?php echo $data['k3']; ?>" required>
                        </div>
                        <div class="phAnimate">
                          <label for="k4">Kredibilitas</label>
                          <input type="number" name="k4" class="form-control" placeholder="Input Nilai Kredibilitas 10 - 100" value="<?php echo $data['k4']; ?>" required>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" name="update" class="btn btn-primary">Edit Data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--tutup modal edit -->

              <!-- Modal Hapus -->
              <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm' data-toggle="modal" data-target="#myy<?php echo $data['id_nilai']; ?>"><span aria-hidden="true"><i class="fas fa-trash"></i></span> Hapus</button>
              <div class="modal fade" id="myy<?php echo $data['id_nilai']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST" role="form">
                        <div class="phAnimate">

                          <input type="hidden" name="id_nilai" class="form-control" value="<?php echo $data['id_nilai']; ?>">
                        </div>
                        <div class="phAnimate">
                          <label for="nama_outsourcing">Nama Outsourcing</label>
                          <input type="text" name="nama_outsourcing" class="form-control" value="<?php echo $data['nama_outsourcing']; ?>" readonly>
                        </div>
                        <div class="phAnimate">
                          <label for="k1">Biaya</label>
                          <input type="text" name="k1" class="form-control" value="<?php echo $data['k1']; ?>" readonly>
                        </div>
                        <div class="phAnimate">
                          <label for="k2">Manajemen Profesional</label>
                          <input type="text" name="k2" class="form-control" value="<?php echo $data['k2']; ?>" readonly>
                        </div>
                        <div class="phAnimate">
                          <label for="k3">Daya Dukung</label>
                          <input type="text" name="k3" class="form-control" value="<?php echo $data['k3']; ?>" readonly>
                        </div>
                        <div class="phAnimate">
                          <label for="k4">Kredibilitas</label>
                          <input type="text" name="k4" class="form-control" value="<?php echo $data['k4']; ?>" readonly>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class=" btn btn-primary btn-danger" name="hapus">Hapus Data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Tutup Modal Hapus -->
            </td>
          </tr>
        <?php } ?>
        </tbody>
        </table>


      </div>
    </div>
  </div>
</div>
</div>
<?php include '../src/footer.php'; ?>