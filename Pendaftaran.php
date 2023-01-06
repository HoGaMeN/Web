<?php
session_start();
//koneksi database
include 'koneksi.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/jpg" href="IMG/20221219_043422.jpg" />
</head>


<body class="bg-dark">
    <img style="position:absolute;width:100%;height:100%;opacity:40%;" src="IMG\school_rooftop_by_arsenixc_dakmnys.jpg">
    <form method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card bg-dark" style="width: 25rem; margin-left:380px;margin-top:10px;">
                        <div class="card-body">
                            <h4 style="color:white;">Register Mahasiswa</h4>
                            <input style="color:white;" type="text" class="form-control bg-dark my-3" name="Username" placeholder="NRP" required>
                            <input style="color:white;" type="password" class="form-control bg-dark my-3" name="Password" placeholder="Password" required>
                            <input style="color:white;" type="text" class="form-control bg-dark my-3" name="Nama" placeholder="Nama" required>
                            <select style="color:white;" class="form-control bg-dark my-4" name="Prodi" required>
                                <option>Teknik Informatika</option>
                                <option>Sistem Informatika</option>
                                <option>Manajemen Informatika</option>
                                <option>DKV</option>
                            </select>
                            <input style="color:white;" type="text" class="form-control bg-dark my-3" name="Alamat" placeholder="Alamat" required>
                            <button name="daftar" style="opacity:60%;background-color:#32E832;width:100%;height:37px;margin-bottom:15px;
                                    padding-top:2px;text-align:center;color:#141414;font-size:15px;border:0px;border-radius:2px;">
                                <B>REGISTER</B>
                            </button>
                            <a href="login.php">
                                <div style="opacity:80%;background-color:transparent;width:100%;height:37px;margin-bottom:15px;
                                padding-top:9px;text-align:center;color:#AEAEAE;font-size:15px;border: 1px solid #AEAEAE;">
                                    ALREADY HAVE AN ACCOUNT?
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST["daftar"])) {
        // cek username dah digunakan or no
        $ambil = $koneksi->query("SELECT * FROM user WHERE Username='$_POST[Username]'");
        $yangcocok = $ambil->num_rows;
        if ($yangcocok == 1) {
            echo "<script>alert('Gagal, Username sudah digunakan');</script>";
            echo "<script>location='register.php';</script>";
        } else {
            // insert ke table
            $koneksi->query("INSERT INTO user
                                    (Username,Password,Level)

                                    VALUES('$_POST[Username]','$_POST[Password]','Mahasiswa')")->fetch();
            $koneksi->query("INSERT INTO mahasiswa (Username, Nama_Mahasiswa, Prodi, Alamat)

                                    VALUES('$_POST[Username]','$_POST[Nama]','$_POST[Prodi]','$_POST[Alamat]')")->fetch();

            echo "<script>alert('Daftar berhasil, Silakan Login');</script>";
            echo "<script>location='Login.php';</script>";
        }
    }
    ?>
    </tr>
</body>

</html>

<style scoped lang="scss">
    a:link {
        text-decoration: none;
    }

    a:visited {
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
    }

    a:active {
        text-decoration: none;
    }
</style>