<?php
session_start();
include 'koneksi.php';
include 'Navbar.php';
?>
<?php
if (isset($_SESSION["Dosen"])){
    echo $_SESSION["Dosen"]['Username'];
    $USR_DSN = $_SESSION["Dosen"]['Username'];
    $take = $koneksi->query("SELECT * FROM Dosen WHERE Username='$USR_DSN'");
    $take->execute();
    $isi = $take->fetch();
?>
    <form method="post" enctype="multipart/form-data ">
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Nama</label>
        <input type="text" class="form-control" name="namaUser" disabled value="<?php echo $isi['Nama_Dosen']; ?>">
    </div>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Alamt</label>
        <input type="text" class="form-control" name="alamatUser" disabled value="<?php echo $isi['Alamat']; ?>">
    </div>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Matakuliah Yang Diampu</label>
        <input type="text" class="form-control" name="kotaUser" disabled value="<?php echo $isi['Matakuliah_Pengampu']; ?>">
    </div>
    </form>
<?php
}else{
    $ID_User = $_SESSION["Username"]['Username'];
    $ambil = $koneksi->query("SELECT * FROM mahasiswa WHERE Username='$ID_User'");
    $ambil->execute();
    $pecah = $ambil->fetch();
        $ID_MHS = $pecah['ID_Mahasiswa'];
        $pecahmbil = $koneksi->query("SELECT dosen.Nama_Dosen FROM mahasiswa, wali, dosen
                                      WHERE mahasiswa.ID_Mahasiswa = wali.ID_Mahasiswa 
                                      AND wali.ID_Dosen = dosen.ID_Dosen
                                      AND wali.ID_Mahasiswa = '$ID_MHS'");
        $pecahmbil->execute();
        $wali = $pecahmbil->fetch();
?>
    <form method="post" enctype="multipart/form-data ">
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Nama</label>
        <input type="text" class="form-control" name="Nama" disabled value="<?php echo $pecah['Nama_Mahasiswa']; ?>">
    </div>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Prodi</label>
        <input type="text" class="form-control" name="Prodi" disabled value="<?php echo $pecah['Prodi']; ?>">
    </div>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Kota</label>
        <input type="text" class="form-control" name="Alamat" disabled value="<?php echo $pecah['Alamat']; ?>">
    </div>
    <?php
    if (isset($wali['Nama_Dosen'])) {
    ?>
        <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Dosen Wali</label>
        <input type="text" class="form-control" name="kotaUser" disabled value="<?php echo $wali['Nama_Dosen']; ?>">
    </div>
    <?php
    }else{
    ?>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Anda belum melakukan perwalian</label>
    </div>
    <?php
    }
    ?>
    </form>
<?php
}
?>