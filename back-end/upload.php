<?php
  //session_start();
  require("connect_db.php");
if(isset($_POST["nome"]))
{
  $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
  $type = mime_content_type ($_FILES['img']['tmp_name']);
  //all the fields are not required except img
  if (isset($_POST["nome"]))
    $nome = $_POST["nome"];
  else $nome = "photo_" + date("his");  //if no name is insert, we set by default photo_hhmmss
  if (isset($_POST["desc"]))
    $desc = $_POST["desc"];
  else $desc = "photo uploaded in date: " + date("l jS \of F Y h:i:s A");
  if (isset($_POST["dim1"]))
  {
    $dim = $_POST["dim1"];
    if($dim=="on")
      $dim=1;
  }
  else
    $dim=0;
  if (isset($_POST["peso"]))
    $peso = $_POST["peso"];   //the weight of an img is stored as INT where 1 unit represents 1 MB
  else $peso = "0";



  $query = "INSERT INTO images(image, nome, descrizione, full_width, type, weight) VALUES ('$img', '$nome', '$desc', '$dim', '$type', '$peso')";
  if (!mysqli_query($conn, $query)){
    echo "Error: Something went wrong :(";
  }
}

  $query = "SELECT * FROM images ORDER BY id DESC";
  $query=mysqli_query($conn,$query);
  if ($query) {
    while($imaggine = mysqli_fetch_array($query))
    {
    ?>
    <img src="data:image/jpeg;base64,<?php echo base64_encode($imaggine["image"]); ?>" alt="se funziona milena cadelli è mia moglie">
    <?php
  }
  }

?>
