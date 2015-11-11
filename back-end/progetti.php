<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link href="../css/bootstrap.min.css" rel="stylesheet"/>
<link href="../css/main.css" rel="stylesheet"/>
<link href="../css/gallery.css" rel="stylesheet" />
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  </head>
  <body>
    <div id="upload_form" style="width:600px; height:210px; margin: 50px auto; border:1px solid black;">
      <form method="post" action="progetti.php" enctype="multipart/form-data">
        <div id="labels" style="float: left;">
          Scelta immagine Progetto:<input type="file" name="img" required><br><br>
          Nome Progetto:<input type="text" name="nome"><br><br>
          Descrizione Progetto:<input type="text" name="desc"><br><br>
          Larghezza massima:<input type="checkbox" name="dim1"><br><br>
          <input type="submit" value="upload">
        </div>
      </form>
    </div>
    <?php
    session_start();
    require_once("uploadp.php");?>
  </body>
</html>
