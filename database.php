<?php
session_start();
// used to connect to the database
	global $conn;
    $db_server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "users_database";

    // create a connection
    $conn = new mysqli($db_server, $username, $password, $db_name);

    // check connection for errors
    if ($conn->connect_error) {
      die("Error: " . $conn->connect_error);
    }
?>