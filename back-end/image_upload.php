<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php
      session_start();
      if (!isset($_SESSION["userid"])) {
        session_destroy();
        header("location: form_login.php");
      }
    ?>
  </head>
  <body>
    <div id="upload_form" style="width:600px; height:210px; margin: 50px auto; border:1px solid black;">
      <form method="post" action="upload.php" enctype="multipart/form-data">
        <div id="labels" style="float: left;">
          Scelta immagine:<input type="file" name="img" required><br><br>
          Nome immagine:<input type="text" name="nome"><br><br>
          Descrizione immagine:<input type="text" name="desc"><br><br>
          Dimensioni immagine:<input type="number" type="dim1">X<input type="number" name="dim2"><br><br>
          Peso immagine:<input type="range" name="peso" min="0" max="20" value="0"><br><br>
          <input type="submit" value="upload">
        </div>
      </form>
    </div>
  </body>
</html>
