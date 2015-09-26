<!-- Pagina di login -->
<?php
  session_start(); //indispensabile per usare variabili di sessione
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Admin Login</title>
  </head>

  <body>
  <?php
    if (isset($_SESSION['userid'])) {
      $_SESSION['userid']="";
			session_destroy();
			header('location: form_login.php');
    }
  ?>

  	<div>
  			<div align="center">
  					<h1>LOGIN</h1> <br>
  					<form id="login_form" method="POST" action="login.php">
  						Username: <input type="text" name="user" placeholder="username" required=""/><br><br>
  						Password: <input type="password" name="pwd" placeholder="********" required=""/><br><br>
  					<input type="submit" value="Login"/>
            <span> <?php echo $error; ?> </span>
  					</form>

  			</div>
  	</div>
  </body>
</html>
