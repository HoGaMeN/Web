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
    <h4 style="color:white; font-family: Brush Script MT;">Jadwal Mengajar</h4>

    </nav>
    <table class="table table-striped table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Hari</th>
                <th scope="col">Jam</th>
                <th scope="col">Matakuliah</th>
                <th scope="col">Dosen</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    <tbody class="tbody-gray">
    <?php
        $USR_DSN = $_SESSION["Dosen"]['Username'];
        $take = $koneksi->query("SELECT * FROM Dosen WHERE Username='$USR_DSN'");
        $isi = $take->fetch_assoc();
        $ID_DSN = $isi['ID_Dosen'];
        $ambil = $koneksi->query("SELECT jadwal.ID_Jadwal, jadwal.Hari, jadwal.Jam, jadwal.Matakuliah, dosen.Nama_Dosen
                                    FROM jadwal
                                    INNER JOIN
                                    dosen
                                    ON
                                    jadwal.ID_Dosen = dosen.ID_Dosen
                                    WHERE jadwal.ID_Dosen = '$ID_DSN'
                                    ORDER BY jadwal.Jam;");
    ?>
    <?php foreach ($ambil as $a) : ?>
            <tr>
                <th><?php echo $a["Hari"] ?></th>
                <td><?php echo $a["Jam"] ?></td>
                <td><?php echo $a["Matakuliah"] ?></td>
                <td><?php echo $a["Nama_Dosen"] ?></td>
                <td><a href="nota.php?id=<?php echo $a["ID_Jadwal"] ?>">Detail</a></td>
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
    <h4 style="color:white; font-family: Brush Script MT; align-content: center;">Jadwal Matakuliah</h4>

</nav>
<table class="table table-striped table-dark">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Hari</th>
            <th scope="col">Jam</th>
            <th scope="col">Matakuliah</th>
            <th scope="col">Dosen</th>
        </tr>
    </thead>
    <tbody class="tbody-gray">
        <?php
        $ambil = $koneksi->query("SELECT jadwal.Hari, jadwal.Jam, jadwal.Matakuliah, dosen.Nama_Dosen 
                                    FROM jadwal, dosen
                                    WHERE jadwal.ID_Dosen = dosen.ID_Dosen
                                    ORDER BY jadwal.Jam");
        ?>
        <?php foreach ($ambil as $a) : ?>
            <tr>
                <th><?php echo $a["Hari"] ?></th>
                <td><?php echo $a["Jam"] ?></td>
                <td><?php echo $a["Matakuliah"] ?></td>
                <td><?php echo $a["Nama_Dosen"] ?></td>
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