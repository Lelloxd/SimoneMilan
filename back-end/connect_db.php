<?php
// mi connetto al MySQL definendo host, user, pwd e nome del db
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "simonemilan";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
