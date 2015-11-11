<?php
//avvio la sessione
session_start(); //indispensabile per usare variabili di sessione
if (isset($_SESSION['userid'])) {
	header('location: progetti.php');
}
require("connect_db.php");
if (isset($_POST["submit"])) {
	// recupero i valori passati via POST
	echo "entro";
	$username = $_POST["user"];
  $password = md5($_POST["pwd"]);
//query per verificare la correttezza del login
$query = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";
echo $query;
$result = mysqli_query($conn, $query);

//controllo che ci sia qualcosa dentro a $results
if ($result)
{
session_start();
$_SESSION['userid'] = 1;
  if ( $row = mysqli_fetch_array($result)) {
    // in caso di successo creo la sesione
		echo "sono giusto";

    header('location: progetti.php');
  }else{
    // se i dati sono sbagliati resetto la variabile di sessione e rimando al form di login
    $_SESSION['userid'] = "";
    session_destroy();
		echo "errore";
    header('location: index.php');
  }
}else{
  // se non ci sono risultati reindirizzo al form di login
  echo "Errore interno";
}
}else {
}

?>
