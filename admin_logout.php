<?php
session_start();
session_unset();
echo "<script>location.assign('adminLogin.php')</script>";
?>