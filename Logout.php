<?php
session_start();

//destroy
session_destroy();
echo"<script>alert('Anda Telah Logout');</script>";
echo"<script>location='Login.php';</script>";

?>