<?php include '../src/header.php'; ?>

<!-- Modal Aksi -->
<?php
include "../src/koneksi.php";
if (isset($_POST['update'])) {
  $id    = $_POST['id_kriteria'];
  $nama  = $_POST['nama_kriteria'];
  $ket   = $_POST['ket'];
  $bobot = $_POST['bobot'];

  $query = mysqli_query($koneksi, "UPDATE data_kriteria SET nama_kriteria='$nama',ket='$ket',bobot='$bobot' WHERE id_kriteria='$id'") or die(mysqli_error($koneksi));
  if ($query) :
    echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_kriteria.php">';
  else :
    echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>";
    echo '<meta http-equiv="Refresh" content="0; URL=data_kriteria.php">';
  endif;
}
?>
<!-- Tutup Modal Aksi -->

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Data Kriteria</b></h1>
  </div>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Kriteria</th>
              <th>Keterangan</th>
              <th>Bobot</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <?php
          $no = 1;
          $ambil = mysqli_query($koneksi, "SELECT * FROM data_kriteria");
          while ($data = mysqli_fetch_array($ambil)) {
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['nama_kriteria'] ?></td>
              <td><?= $data['ket'] ?></td>
              <td><?= $data['bobot'] ?></td>

              <!-- aksi modal edit -->
              <td class="align-middle text-center">
                <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' data-toggle="modal" data-target="#my<?php echo $data['id_kriteria']; ?>"><span aria-hidden="true"><i class="fas fa-pencil-alt"></i></span> Edit</button>
                <div class="modal fade" id="my<?php echo $data['id_kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="POST" role="form">
                          <div class="phAnimate">

                            <input type="hidden" name="id_kriteria" class="form-control" placeholder="Input Id User" value="<?php echo $data['id_kriteria']; ?>">
                          </div>
                          <div class="phAnimate">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" name="nama_kriteria" class="form-control" value="<?php echo $data['nama_kriteria']; ?>" readonly>
                          </div>
                          <div class="phAnimate">
                            <label for="ket">Keterangan</label>
                            <input type="text" name="ket" class="form-control" value="<?php echo $data['ket']; ?>" readonly>
                          </div>
                          <div class="phAnimate">
                            <label for="bobot">Bobot</label>
                            <input type="text" name="bobot" class="form-control" placeholder="Input Bobot Kriteria" value="<?php echo $data['bobot']; ?>" required>
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