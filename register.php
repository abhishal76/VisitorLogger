<?php
  include 'users_database/config/database.php';
  $user = $_POST['username'];
  $sql_u = "SELECT * FROM user where username = '$user'";
  $stmt = $conn->query($sql_u);
   $num = $stmt->num_rows;   
  if ($num >0) {
    header("Location: http://192.168.64.2/GuestLogger/index.php?register_error=true");
    exit();
  }
else{

  $sql = "INSERT INTO user (username, first_name, last_name, password) VALUES (?, ?, ?, ?)";
  $statement = $conn->prepare($sql);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $statement->bind_param('ssss', $_POST['username'] , $_POST['first_name'], $_POST['last_name'], $password);

  if ($statement->execute()) {
    header("Location: http://192.168.64.2/GuestLogger/index.php?registered=true");
    exit();
  } else {
    echo "Error: " . $conn->error;
  }

  $conn->close();

  }
