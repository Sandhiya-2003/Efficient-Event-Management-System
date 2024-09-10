<?php
    session_start();
    if(!isset($_SESSION["mobile"])) {
        header("Location: coord_login.php");
        exit();
    }
?>