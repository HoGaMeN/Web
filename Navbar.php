<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
//koneksi database
include 'koneksi.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XClothes</title>
    <link rel="shortcut icon" type="image/png" href="icon/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php" style="font-family: Brush Script MT; font-size: 50;">Kemahasiswaan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="Jadwal.php">Jadwal</a>
            </li>
            <?php
            if (isset($_SESSION["Username"])) {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="Perwalian.php">Perwalian</a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="Mahasiswa.php">Mahasiswa</a>
            </li>
            <?php
            if (isset($_SESSION["Dosen"])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="jualproduk.php">Daftar Perwalian</a>
                </li>
            <?php } ?>
        </ul>
        <ul class="navbar-nav">
            
            <?php if (isset($_SESSION["Username"])) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION["Username"]['Username'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -80px;">
                        <a class="dropdown-item" href="Profil_User.php">Profile</a>
                        <?php
                        if (isset($_SESSION["Username"])) {
                        ?>
                            <a class="dropdown-item" href="Update_User.php?id=<?php echo $_SESSION["Username"]['Username'] ?>">Ubah Profil</a>
                        <?php
                        }else if (isset($_SESSION["Dosen"])) {
                            echo $_SESSION["Dosen"]['Username'];
                        ?>
                          <a class="dropdown-item" href="Update_User.php?id=<?php echo $_SESSION["Dosen"]['Username'] ?>">Ubah Profil</a>
                        <?php
                        }
                        ?>
                        
                        <a class="dropdown-item" href="Logout.php">Logout</a>
                    </div>
                </li>
            <?php else : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION["Dosen"]['Username'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -80px;">
                        <a class="dropdown-item" href="Profil_User.php">Profile</a>
                        <a class="dropdown-item" href="Logout.php">Logout</a>
                    </div>
                </li>
            <?php endif ?>
        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>