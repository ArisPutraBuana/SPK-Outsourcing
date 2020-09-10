<?php include '../src/header.php';

if (isset($_POST['simpan'])) {
  $nama  = $_POST['nama_outsourcing'];
  $almt  = $_POST['alamat'];
  $ntlp  = $_POST['no_tlp'];
  $query = mysqli_query($koneksi, "INSERT INTO data_outsourcing VALUES ('','$nama','$almt','$ntlp')") or die(mysqli_error($koneksi));
  if ($query) :
    echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_outsourcing.php">';
  else :
    echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_outsourcing.php">';
  endif;
} elseif (isset($_POST['update'])) {
  $id    = $_POST['id_outsourcing'];
  $nama  = $_POST['nama_outsourcing'];
  $almt  = $_POST['alamat'];
  $ntlp  = $_POST['no_tlp'];
  $query = mysqli_query($koneksi, "UPDATE data_outsourcing SET nama_outsourcing='$nama',alamat='$almt',no_tlp='$ntlp' WHERE id_outsourcing='$id'") or die(mysqli_error($koneksi));
  if ($query) :
    echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_outsourcing.php">';
  else :
    echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_outsourcing.php">';
  endif;
} elseif (isset($_POST['hapus'])) {
  $id    = $_POST['id_outsourcing'];
  $query = mysqli_query($koneksi, "DELETE FROM data_outsourcing WHERE id_outsourcing='$id'") or die(mysqli_error($koneksi));
  if ($query) :
    echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di hapus!', 'success');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_outsourcing.php">';
  else :
    echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_outsourcing.php">';
  endif;
}
?>
<!-- Tutup Modal Aksi -->

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Data Outsourcing</b></h1>
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
                  $amil1 = mysqli_query($koneksi, "SELECT max(id_outsourcing) AS hasil FROM data_outsourcing") or die(mysqli_error($koneksi));
                  $no = mysqli_fetch_array($amil1);
                  $noBaru = $no['hasil'] + 1;
                  ?>
                </div>

                <div class="form-group">
                  <label for="nama_outsourcing">Nama Outsourcing</label>
                  <input type="text" name="nama_outsourcing" class="form-control" placeholder="input Nama outsourcing" required>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Outsourcing</label>
                  <input type="text" name="alamat" class="form-control" placeholder="input Alamat outsourcing" required>
                </div>
                <div class="form-group">
                  <label for="no_tlp">No HP</label>
                  <input type="number" name="no_tlp" class="form-control" placeholder="input No HP" required>
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
      <a href="laporan/lap_outsourcing.php" target="_blank"><button class='d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm'><span class="fas fa-print"></span> Cetak</button></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Outsourcing</th>
              <th>Alamat</th>
              <th>No HP</th>
              <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $ambil = mysqli_query($koneksi, "SELECT * FROM data_outsourcing");
            while ($data = mysqli_fetch_array($ambil)) {
            ?>
          </thead>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nama_outsourcing'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['no_tlp'] ?></td>

            <!-- aksi modal edit -->
            <td class="align-middle text-center">
              <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' data-toggle="modal" data-target="#my<?php echo $data['id_outsourcing']; ?>"><span aria-hidden="true"><i class="fas fa-pencil-alt"></i></span> Edit</button>
              <div class="modal fade" id="my<?php echo $data['id_outsourcing']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST" role="form">
                        <div class="phAnimate">
                          <input type="hidden" name="id_outsourcing" class="form-control" value="<?php echo $data['id_outsourcing']; ?>">
                        </div>
                        <div class="phAnimate">
                          <label for="nama_outsourcing">Nama outsourcing</label>
                          <input type="text" name="nama_outsourcing" class="form-control" placeholder="Input Nama outsourcing" value="<?php echo $data['nama_outsourcing']; ?>" required>
                        </div>
                        <div class="phAnimate">
                          <label for="alamat">Alamat outsourcing</label>
                          <input type="text" name="alamat" class="form-control" placeholder="Input Alamat outsourcing" value="<?php echo $data['alamat']; ?>" required>
                        </div>
                        <div class="phAnimate">
                          <label for="no_tlp">No HP</label>
                          <input type="number" name="no_tlp" class="form-control" placeholder="Input No HP" value="<?php echo $data['no_tlp']; ?>" required>
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
              <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm' data-toggle="modal" data-target="#myy<?php echo $data['id_outsourcing']; ?>"><span aria-hidden="true"><i class="fas fa-trash"></i></span> Hapus</button>
              <div class="modal fade" id="myy<?php echo $data['id_outsourcing']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST" role="form">
                        <div class="phAnimate">

                          <input type="hidden" name="id_outsourcing" class="form-control" value="<?php echo $data['id_outsourcing']; ?>">
                        </div>
                        <div class="phAnimate">
                          <label for="nama_outsourcing">Nama outsourcing</label>
                          <input type="text" name="nama_outsourcing" class="form-control" value="<?php echo $data['nama_outsourcing']; ?>" readonly>
                        </div>
                        <div class="phAnimate">
                          <label for="alamat">Alamat outsourcing</label>
                          <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" readonly>
                        </div>

                        <div class="phAnimate">
                          <label for="no_tlp">No HP</label>
                          <input type="text" name="no_tlp" class="form-control" value="<?php echo $data['no_tlp']; ?>" readonly>
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