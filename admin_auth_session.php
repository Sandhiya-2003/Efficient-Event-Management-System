<?php
    session_start();
    if(!isset($_SESSION["adminid"])) {
        header("Location: admin_login.php");
        exit();
    }
?>