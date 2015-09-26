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
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "root";
$db_name = "simonemilan";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


<<<<<<< HEAD
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



//query per verificare la correttezza del login
$query = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";
=======
//query per verificare la correttezza del login
$query("SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'");
>>>>>>> origin/master
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
<<<<<<< HEAD
		echo "errore";
		//header('location:form_login.php');
=======
    header('location: form_login.php'):
>>>>>>> origin/master
  }
}else{
  // se non ci sono risultati reindirizzo al form di login
  echo "boiadio";
}
?>
