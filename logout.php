<?php

    session_start();
    session_unset();
    echo "<script>location.assign('home.php')</script>";
?>