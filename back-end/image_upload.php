<?php
  session_start();
  if (!isset($_SESSION["userid"])) {
    session_destroy();
    header("location: form_login.php");
  }
  if(isset($_GET["progetto"]))
    $progid=$_GET["progetto"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link href="../css/bootstrap.min.css" rel="stylesheet"/>
<link href="../css/main.css" rel="stylesheet"/>
<link href="../css/gallery.css" rel="stylesheet" />
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  </head>
  <body>
<a href="progetti.php">TORNA A GESTIONE PROGETTI</a>
    <div id="upload_form" style="width:600px; height:210px; margin: 50px auto; border:1px solid black;">
      <form method="post" action="image_upload.php?progetto=<?php echo $progid;?>" enctype="multipart/form-data">
        <div id="labels" style="float: left;">
          Scelta immagine:<input type="file" name="img" required><br><br>
          Nome immagine:<input type="text" name="nome"><br><br>
          Descrizione immagine:<input type="text" name="desc"><br><br>
          Larghezza massima:<input type="checkbox" name="dim1"><br><br>
          <input type="submit" value="upload">
        </div>
      </form>
    </div>
    <?php require_once("upload.php");?>
  </body>
</html>
