<?php
//avvio la sessione
session_start();

// recupero i valori passati via POST
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
/*if (get_magic_quotes_gpc()){
		$username = stripslashes($username);
		$password = stripslashes($password);
}*/

$username = mysqli_real_escape_string($conn, $username;
$password = mysqli_real_escape_string($conn, $password);

$password = md5($password);

// mi connetto al MySQL definendo host, user, pwd e nome del db
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "simonemilan";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//parte della connessione da spostare in un file connect_db.php

//query per verificare la correttezza del login
$query("SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'");
$result = mysqli_query($conn, $query);
//controllo che ci sia qualcosa dentro a $results
if ($result)
{
  $row = mysqli_fetch_array($result);
  if ($row) {
    // in caso di successo creo la sesione
    $_SESSION['userid'] = $row['username'];
    // e reindirizzo alla pagina di gestione
    header("location: management.php");
  }else{
    // se i dati sono sbagliati resetto la variabile di sessione e rimando al form di login
    $_SESSION['userid'] = "";
    session_destroy();
    header('location: form_login.php'):
  }
}else{
  // se non ci sono risultati stampo zero
  echo "boiadio";
}
?>
