<?php try {
    $koneksi = new PDO('mysql:host=localhost;dbname=web','root','');
    $koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection error ".$e->getMessage();
}  
?>
