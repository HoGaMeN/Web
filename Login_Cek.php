<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$Username = $_POST['Username'];
$Password = $_POST['Password'];


// menyeleksi data user dengan username dan passwordUser yang sesuai
$ambil = $koneksi->prepare("SELECT * FROM user WHERE Username='$Username' AND Password='$Password'");
$ambil->execute();

$akun = $ambil->fetch();

    // cek jika user login sebagai admin
    if ($akun['Level'] == "Dosen") {

        // buat session login dan username
        $_SESSION['Dosen'] = $akun;
        // alihkan ke halaman dashboard admin
        header("location:Profil_User.php");

        // cek jika user login sebagai pembeli
    } else if ($akun['Username']) {
        // buat session login dan username
        $_SESSION['Username'] = $akun;
        // alihkan ke halaman dashboard pembeli
        header("location:Profil_User.php");
    } else {

        // alihkan ke halaman login kembali
        header("location:Login.php");
    }
