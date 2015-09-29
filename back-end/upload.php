<?php
  session_start();

  $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
  $type = file_get_contents($_FILES['type']['mime']);
  //all the fields are not required except img
  if (isset($_POST["nome"]))
    $nome = $_POST["nome"];
  else $nome = "photo_" + date("his");  //if no name is insert, we set by default photo_hhmmss
  if (isset($_POST["desc"]))
    $desc = $_POST["desc"];
  else $desc = "photo uploaded in date: " + date("l jS \of F Y h:i:s A");
  if (isset($_POST["dim1"]) && isset($_POST["dim2"]))
    $dim = $_POST["dim1"] + "x" + $_POST["dim2"];
  else $dim = "0x0";
  if (isset($_POST["peso"]))
    $peso = $_POST["peso"];   //the weight of an img is stored as INT where 1 unit represents 1 MB
  else $peso = "0";

  require("connect_db.php");

  $query = "INSERT INTO images(image, name, description, dimensions, type, weight) VALUES ('$img', '$nome', '$desc', '$dim', '$type', '$peso')";
  if (!mysqli_query($conn, $query)){
    echo "Error: Something went wrong :(";
  }


  /*$query = "SELECT image FROM images WHERE name = 'prova'";
  if (mysqli_query($query)) {
    $imaggine = mysqli_fetch_object(mysqli_query($query));
    ?>
    <img src="<?php $imaggine; ?>" alt="se funziona milena cadelli è mia moglie">
    <?php
  }*/

?>
