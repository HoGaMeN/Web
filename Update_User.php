<?php
session_start();
include 'koneksi.php';
include 'Navbar.php';
?>
<?php
if (isset($_SESSION["Dosen"])){
    $DSN = $_GET['id'];
    $hasil= $koneksi->query("SELECT * FROM dosen WHERE Username = '$DSN'")->fetch_array();
?>
    <form method="post" enctype="multipart/form-data ">
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Nama</label>
        <input type="text" class="form-control" name="Nama" disabled value="<?php echo $hasil['Nama_Dosen']; ?>">
    </div>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Alamat</label>
        <input type="text" class="form-control" name="Alamat" disabled value="<?php echo $hasil['Alamat']; ?>">
    </div>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Matakuliah Yang Diampu</label>
        <input type="text" class="form-control" name="Matakuliah" disabled value="<?php echo $hasil['Matakuliah_Pengampu']; ?>">
    </div>
    <button class="btn btn-primary" name="ubah" style="font-family: Copperplate;">Edit</button></p>
    </form>
    <?php
    if (isset($_POST['ubah'])) {

    $koneksi->query("UPDATE dosem SET Nama_Dosen='$_POST[Nama]', Alamat='$_POST[Alamat]', Matakuliah_Pengampu='$_POST[Matakuliah]' WHERE Username='$DSN'");

    echo "<script>alert('Data User Telah Diubah, Mohon Lakukan Login Ulang');</script>";
    echo "<script>location='Logout.php';</script>";
    }
?>
<?php
}else{
    $user = $_GET['id'];
    $hasil= $koneksi->query("SELECT * FROM mahasiswa WHERE Username = '$user'")->fetch();
?>
    <form method="post" enctype="multipart/form-data ">
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Nama</label>
        <input type="text" class="form-control" name="Nama" value="<?php echo $hasil['Nama_Mahasiswa'] ?>">
    </div>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Prodi</label>
        <input type="text" class="form-control" name="Prodi" value="<?php echo $hasil['Prodi']; ?>">
    </div>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
        <label>Kota</label>
        <input type="text" class="form-control" name="Alamat" value="<?php echo $hasil['Alamat']; ?>">
    </div>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
    <button class="btn btn-primary" name="ubah" style="font-family: Copperplate; width: 100%;">Edit</button></p>
    </div>
    </form>
<?php
    if (isset($_POST['ubah'])) {

    $koneksi->query("UPDATE mahasiswa SET Nama_Mahasiswa='$_POST[Nama]', Prodi='$_POST[Prodi]', Alamat='$_POST[Alamat]' WHERE Username='$user'");
    $koneksi->execute();

    echo "<script>alert('Data User Telah Diubah, Mohon Lakukan Login Ulang');</script>";
    echo "<script>location='Logout.php';</script>";
    }
}
?>