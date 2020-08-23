<!DOCTYPE HTML>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    body { background-image: url(./image.png);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: 100% 100%;
        max-width:100%;
        height:auto; }
    </style>
</head>
<body>
    <div class="container">

        <div class="page-header">
            <h1 class="text-center">Welcome To Visitor LogBook!</h1>
        </div>
<?php
  if(isset($_SESSION['user_id'])) {
    $url = "/home.php";
    header("Location: http://192.168.64.2/GuestLogger/home.php" );
    exit();
  }
?>
<main class="container">
  <?php if(isset($_GET['registered'])): ?>
    <div class="alert alert-success">
      <p><i class='glyphicon glyphicon-ok-circle'></i> Account created successfully! Use your username and password to login.</p>
    </div>
  <?php endif; ?>

  <?php if(isset($_GET['register_error'])): ?>
    <div class="alert alert-danger">
      <p><i class='glyphicon glyphicon-ban-circle'></i> Username Already Exists! Please Try Different Username</p>
    </div>
  <?php endif; ?>

  <?php if(isset($_GET['login_error'])): ?>
    <div class="alert alert-danger">
      <p><i class='glyphicon glyphicon-ban-circle'></i> Invalid username or password!</p>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-6">
      <h4>Login</h4>

      <form method="post" action="login.php">
        <div class="form-group has-feedback">
          <input class="form-control" type="text" name="username" placeholder="Username" required>
          <i class="form-control-feedback glyphicon glyphicon-user"></i>
        </div>

         <div class="form-group has-feedback">
         <input type="password" class="form-control" name="password" placeholder="Password" data-toggle="password" required>
        </div>

        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="login" value="Login">
        </div>
      </form>

    </div>
    <div class="col-md-6">
      <h4>Don't have an account yet? Register!</h4>

      <form method="post" action="register.php">
        <div class="form-group has-feedback">
          <input class="form-control" type="text" name="username" placeholder="Prefered Username" required>
          <i class="form-control-feedback glyphicon glyphicon-user"></i>
        </div>

        <div class="form-group">
          <input class="form-control" type="text" name="first_name" placeholder="First Name" required>
        </div>
        <div class="form-group">
          <input class="form-control" type="text" name="last_name" placeholder="Last Name" required>
        </div>

        <div class="form-group">
          <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group has-feedback-left">
          <input class="btn btn-success" type="submit" name="register" value="Register">
        </div>
      </form>
    </div>
  </div>

<script type="text/javascript">
$("#password").password('toggle');
</script>

</main>
</body>
</html>
