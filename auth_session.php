<?php
    session_start();
    if(!isset($_SESSION["mobile"])) {
        header("Location: user_login.php");
        exit();
    }
?>