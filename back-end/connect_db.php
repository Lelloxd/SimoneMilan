<?php
// mi connetto al MySQL definendo host, user, pwd e nome del db
$db_host = "sql.simonemilanfoto.it";
$db_user = "simonemi98972";
$db_pass = "Simone$2015";
$db_name = "simonemi98972";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
	