<?php
session_start();
//koneksi database
include 'koneksi.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="font-family: Brush Script MT;">Kemahasiswaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/jpg" href="IMG/20221219_043422.jpg" />
</head>

<body class="bg-light" background="IMG/demkhc6-5dcff316-d7c2-46a1-8e49-e6873eb81704.jpg">
    
    <form action="Login_Cek.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card bg-dark" style="width: 25rem; margin-left:380px;margin-top:150px;">
                        <div class="card-body">
                            <h4 style="color:white;">Log In Kemahasiswaan</h4>
                            <input style="color:white;" type="text" class="form-control bg-dark my-3"   name="Username" placeholder="Username" required>
                            <input style="color:white;" type="password" class="form-control bg-dark my-3" name="Password" placeholder="Password" required>
                            <button style="opacity:60%;background-color:#32E832;width:100%;height:37px;margin-bottom:15px;margin-top:80px; 
                                padding-top:2px;text-align:center;color:#141414;font-size:15px;border:0px;border-radius:2px;" value="LOGIN">
                                <B>LOG IN</B>
                            </button>
                            <a href="Pendaftaran.php">
                                <div style="opacity:80%;background-color:transparent;width:100%;height:37px;margin-bottom:15px;
                                padding-top:9px;text-align:center;color:#AEAEAE;font-size:15px;border: 1px solid #AEAEAE;">
                                    REGISTER MAHASISWA
                                </div>
                            </a>
                            <a href="Pendaftaran_Dosen.php">
                                <div style="opacity:80%;background-color:transparent;width:100%;height:37px;margin-bottom:15px;
                                padding-top:9px;text-align:center;color:#AEAEAE;font-size:15px;border: 1px solid #AEAEAE;">
                                    REGSITER DOSEN
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    ?>
</body>

</html>
<style>
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