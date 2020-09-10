<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "SELECT * FROM data_user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
	$data = mysqli_fetch_array($query);
	$_SESSION['id_user'] = $data['id_user'];
    $_SESSION['status'] = "login";

    echo "<script>alert('Selamat Datang'); window.location.href = '../admin/index.php'</script>";
}else{
	echo "<script>alert('Username atau Password yang Anda Masukkan Salah'); window.location.href = '../index.php'</script>";
}
?>