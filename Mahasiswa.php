<?php
session_start();
//koneksi database
include 'koneksi.php';
include 'navbar.php';
?>
<?php
if (isset($_SESSION["Dosen"])) {
?> 
    <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
    <h4 style="color:white; font-family: Brush Script MT;">Wali Dari</h4>

    </nav>
    <table class="table table-striped table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NRP</th>
                <th scope="col">Nama</th>
                <th scope="col">Prodi</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    <tbody class="tbody-gray">
    <?php
        $USR_DSN = $_SESSION["Dosen"]['Username'];
        $take = $koneksi->query("SELECT * FROM Dosen WHERE Username='$USR_DSN'");
        $isi = $take->fetch_assoc();
        $ID_DSN = $isi['ID_Dosen'];
        $ambil = $koneksi->query("SELECT mahasiswa.ID_Mahasiswa, mahasiswa.Username, mahasiswa.Nama_Mahasiswa, mahasiswa.Prodi, mahasiswa.Alamat
                                    FROM mahasiswa
                                    INNER JOIN
                                    wali
                                    ON
                                    mahasiswa.ID_Mahasiswa = wali.ID_Mahasiswa
                                    INNER JOIN
                                    dosen
                                    ON
                                    dosen.ID_Dosen = wali.ID_Dosen
                                    WHERE wali.ID_Dosen = '$ID_DSN'
                                    ORDER BY mahasiswa.Nama_Mahasiswa");
    ?>
    <?php foreach ($ambil as $a) : ?>
            <tr>
                <th><?php echo $a["Username"] ?></th>
                <td><?php echo $a["Nama_Mahasiswa"] ?></td>
                <td><?php echo $a["Prodi"] ?></td>
                <td><?php echo $a["Alamat"] ?></td>
                <td><a href="nota.php?id=<?php echo $a["ID_Mahasiswa"] ?>">Detail</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
    </body>

</html>
<?php
}else{
?>
    <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
    <h4 style="color:white; font-family: Brush Script MT; align-content: center;">Daftar Mahasiswa</h4>

</nav>
<table class="table table-striped table-dark">
    <thead class="thead-dark">
        <tr>
            <th scope="col">NRP</th>
            <th scope="col">Nama</th>
            <th scope="col">Prodi</th>
            <th scope="col">Alamat</th>
        </tr>
    </thead>
    <tbody class="tbody-gray">
        <?php
        $ambil = $koneksi->query("SELECT Username, Nama_Mahasiswa, Prodi, Alamat 
                                    FROM mahasiswa
                                    ORDER BY Username");
        ?>
        <?php foreach ($ambil as $a) : ?>
            <tr>
                <th><?php echo $a["Username"] ?></th>
                <td><?php echo $a["Nama_Mahasiswa"] ?></td>
                <td><?php echo $a["Prodi"] ?></td>
                <td><?php echo $a["Alamat"] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</body>

</html>
<?php
}
?>

<style>
    body {
        background-color: gray;
    }
    a:link {
        color: green;
        background-color: transparent;
        text-decoration: none;
    }

    a:visited {
        color: lime;
        background-color: transparent;
        text-decoration: none;
    }

    a:hover {
        color: cyan;
        background-color: transparent;
        text-decoration: underline;
    }

    a:active {
        color: yellow;
        background-color: transparent;
        text-decoration: underline;
    }

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

    th {
        font-family: Copperplate;
    }
</style>