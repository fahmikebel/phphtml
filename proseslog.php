<?php session_start();
require_once("config.php");
$username = $_POST['username'];
$pass = ($_POST['password']);
$cekuser = mysqli_query($koneksi, "SELECT * FROM t_pelanggan WHERE username = '$username'");
$jumlah = mysqli_num_rows($cekuser);
$hasil = mysqli_fetch_array($cekuser);

if ($jumlah == 0) {
    echo "<script language='javascript'>";
    echo "alert('Maaf akun belum terdaftar !')"; //not showing an alert box.
    echo "</script>";
    echo "<a href='index.php'>Back</a>";
} else

if ($pass === $hasil['password']) {
    // $_SESSION['username'] = $hasil['username'];
    // die(print_r($hasil['password']));
    // header('location:about.php');


    if ($hasil['role'] == "admin") {

        // buat session login dan username
        $_SESSION['username'] = $hasil['username'];
        $_SESSION['role'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:admin.php");
        // cek jika user login sebagai pegawai
    }
    if ($hasil['role'] == "user") {
        // buat session login dan username
        $_SESSION['username'] = $hasil['username'];
        $_SESSION['role'] = "user";
        // alihkan ke halaman dashboard pengurus
        header("location:user.php");
    }
} else {
    echo "<script language='javascript'>";
    echo "alert('Maaf password yang anda masukan salah !')"; //not showing an alert box.
    echo "</script>";
    echo "<a href='index.php'>Back</a>";
}
