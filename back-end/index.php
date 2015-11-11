<!-- Pagina di login -->
<?php

require("login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Admin Login</title>

    </script>
  </head>

  <body>

  	<div>
  			<div align="center">
  				<h1>LOGIN</h1> <br>
  				<form method="POST" onsubmit="index.php">
  						Username: <input type="text" name="user" placeholder="username" required><br><br>
  						Password: <input type="password" name="pwd" placeholder="********" required><br><br>
  					  <input name="submit" type="submit" value="Login">
          </from>
  			</div>
  	</div>
  </body>
</html>
