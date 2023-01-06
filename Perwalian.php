<?php
session_start();
include 'koneksi.php';
include 'Navbar.php';

// Mendapatkan data mahasiswa dari session
$ID_User = $_SESSION["Username"]['Username'];
$ambil = $koneksi->query("SELECT * FROM mahasiswa WHERE Username='$ID_User'");
$pecah = $ambil->fetch_assoc();
$ID_MHS = $pecah['ID_Mahasiswa'];

// Mendapatkan data wali dari database
$pecahmbil = $koneksi->query("SELECT * FROM wali WHERE ID_Mahasiswa = '$ID_MHS'");
$pecahmbil->execute();
$wali = $pecahmbil->fetch();

if (empty($wali)) {
  // Menampilkan form untuk mengubah data wali
  ?>
  <form method="post" enctype="multipart/form-data ">
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
      <select style="color:white;" class="form-control bg-dark my-4" name="Dosen" required>
        <option>Pilih Dosen</option>
        <?php
        $query = "SELECT Nama_Dosen FROM Dosen";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_array($result)) {
          ?>
          <option value="<?php echo $row['Nama_Dosen']; ?>"><?php echo $row['Nama_Dosen']; ?></option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group my-3 ml-3" style="margin-right:70%; font-family: Copperplate;">
      <button class="btn btn-primary" name="ubah" style="font-family: Copperplate; width: 100%;">Edit</button>
    </div>
  </form>
  <?php
  if (isset($_POST['ubah'])) {
    $dosen = $_POST['Dosen'];
    $get = $koneksi->query("SELECT ID_Dosen FROM Dosen WHERE Nama_Dosen = '$dosen'");
    $get->execute();
    $ID_DSN = $get->fetch();
    $koneksi->query("INSERT wali SET ID_Dosen='$ID_DSN[ID_Dosen]', ID_Mahasiswa='$ID_MHS', Status='Belum Tervalidasi'");

    echo "<script>alert('Data User Telah Diubah, Mohon Lakukan Login Ulang');</script>";
    echo "<script>location='Logout.php';</script>";
  }
    ?>
<?php
}else if ($wali['Status'] == "Belum Tervalidasi") {
    echo "<script>alert('Mohon bersabar untuk menunggu validasi dari dosen, Jika belum divalidasi silakan hubungin dosen wali yang bersangkutan');</script>";
    echo "<script>location='Profil_User.php';</script>";

}else{
    echo "<script>alert('Anda sudah melakukan perwalian');</script>";
    echo "<script>location='Profil_User.php';</script>";   
}
?>