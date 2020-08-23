<?php
    include 'users_database/config/database.php';
    session_destroy();
    header("Location: " . "http://192.168.64.2/GuestLogger/index.php"); 
?>
