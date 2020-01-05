<?php
    session_start();
    echo isset($_SESSION['login']);
    if(isset($_SESSION['login'])) {
      header('LOCATION:resources'); die();
    }
?>
<!DOCTYPE html>
<html>
   <head>
     <meta http-equiv='content-type' content='text/html;charset=utf-8' />
     <title>Login</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <!-- font style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
   </head>
<body>
  <div class="container">
    <h3 class="text-center"><img src="img/logo_dark.png" alt="logo"></h3>
    <?php
      if(isset($_POST['loggedin'])){
        $username = $_POST['username']; $password = $_POST['password'];
        if($username === 'admin' && $password === 'fundmore'){
          $_SESSION['login'] = true; header('LOCATION:resources'); die();
        } {
          echo "<div class='alert alert-danger'>Username and Password do not match.</div>";
        }

      }
    ?>
    <form role="form" method="post" action="login.php" style="max-width: 50%; margin: auto;">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password" required>
      </div>
      <button type="submit" name="loggedin" class="btn grn_btn text-center">Login</button>
    </form>
  </div>
</body>
</html>