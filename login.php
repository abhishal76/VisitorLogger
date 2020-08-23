<?php

  include 'users_database/config/database.php';

  $sql = "SELECT id, username, password , user_type FROM user WHERE username = ?";
  $statement = $conn->prepare($sql);
  $statement->bind_param('s', $_POST['username']);
  $statement->execute();
  $statement->store_result();
  $statement->bind_result($id, $username, $password, $user_type);
  $statement->fetch();

  if ($statement->execute()) {
    if(password_verify($_POST['password'], $password) and $user_type == "0") {
      $_SESSION['user_id'] = $id;
      $_SESSION['user_username'] = $username;
      $_SESSION['user_type'] = $user_type;

      header("Location: http://192.168.64.2/GuestLogger/home.php");
    exit();
    } elseif (password_verify($_POST['password'], $password) and $user_type == "1") {

      $_SESSION['user_id'] = $id;
      $_SESSION['user_username'] = $username;
      $_SESSION['user_type'] = $user_type;

      header("Location: http://192.168.64.2/GuestLogger/admin.php");
    }

    else {
      header("Location: http://192.168.64.2/GuestLogger/index.php?login_error=true");
    }
  } else {
    echo "Error: " . $conn->error;
  }

?>
