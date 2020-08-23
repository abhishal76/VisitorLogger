<?php
include 'users_database/config/database.php';

    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Data not found.');
    $query = "DELETE FROM visitor WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if($stmt->execute()){
        header('Location: admin.php?action=deleted');
    }else{
        die('Unable to Delete record.');
  }
?>
