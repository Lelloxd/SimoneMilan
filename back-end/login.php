<?php
//avvio la sessione
session_start();
require("connect_db.php");
if (isset($_POST["user"]) && isset($_POST["pwd"])) {
	// recupero i valori passati via POST
	$username = $_POST["user"];
	$password = $_POST["pwd"];
	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);

   $password = md5($password);
}
else {
	echo "username e password non inseriti";
}

// recupero i valori passati via POST
$username = trim($_POST["user"]);
$password = trim($_POST["pwd"]);

if (get_magic_quotes_gpc()){
		$username = stripslashes($username);
		$password = stripslashes($password);
}

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$password = md5($password);



//query per verificare la correttezza del login
$query = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $query);

//controllo che ci sia qualcosa dentro a $results
if ($result)
{
  $row = mysqli_fetch_array($result);
  if ($row) {
    // in caso di successo creo la sesione
    $_SESSION['userid'] = $row['username'];
    // e reindirizzo alla pagina di gestione
    header("location: progetti.php");
  }else{
    // se i dati sono sbagliati resetto la variabile di sessione e rimando al form di login
    $_SESSION['userid'] = "";
    session_destroy();
		//echo "errore";
    header('location: index.php');
  }
}else{
  // se non ci sono risultati reindirizzo al form di login
  echo "boiadio";
}
?>
