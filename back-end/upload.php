<?php
  //session_start();
  require("connect_db.php");
  if(isset($_GET["progetto"]))
  {
    $idprogetto=$_GET["progetto"];
if(isset($_POST["nome"]))
{
  $quevy="SELECT * FROM images ORDER BY id DESC LIMIT 1";
  if (!$ult=mysqli_query($conn, $quevy)){
    echo "Error: Something went wrong :(";
  }
  else{
    $temp = explode(".", $_FILES["img"]["name"]);
    if($ultimoid = mysqli_fetch_array($ult))
    $newfilename = ($ultimoid["id"]+1) . '.' . end($temp);
    else
    $newfilename = round(microtime(true)) . '.' . end($temp);
    }

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["img"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  $type="";
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["img"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $type=$check;
          $uploadOk = 1;
      } else {
          echo "File is not an image.";

          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["img"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {


      if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir.$newfilename)) {
          echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
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


  //   $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
  $query = "INSERT INTO images(image, nome, descrizione, full_width, type, id_progetto) VALUES ('uploads/$newfilename', '$nome', '$desc', '$dim', '$type', '$idprogetto')";

  if (!mysqli_query($conn, $query)){
    echo "Error: Something went wrong :(";
  }
  else {
    require("thumb.php");
  }
}
  require("servizi.php");
  $query = "SELECT * FROM images WHERE id_progetto=$idprogetto ORDER BY id";
  $query=mysqli_query($conn,$query);
  $riga=0;
  if ($query) {
    while($imaggine = mysqli_fetch_array($query))
    {
    if(!$imaggine['full_width'])
    {
      if($riga==0)
      echo '<div class="row">';
    ?>

        <div class="col-md-6 imagecontainer">
           <div class=" view view-tenth" style="width:100%; height:auto;">
           <img style="height:100%;width:100%;" src="<?php echo $imaggine['image'];?>">
           <div class="mask">
             <br><span style='color:white;'>Nome</span> <input type='text' value="<?php echo $imaggine["nome"];?>" name="<?php echo "nome".$imaggine["id"];?>" id="<?php echo "nome".$imaggine["id"];?>">
             <br><span style='color:white;'>Descrizione</span> <input type='text' value="<?php echo $imaggine["descrizione"];?>" name="<?php echo "descrizione".$imaggine["id"];?>" id="<?php echo "descrizione".$imaggine["id"];?>">
             <br><span style='color:white;'>Larghezza Massima</span> <input type='checkbox' name="<?php echo "full_width".$imaggine["id"];?>" id="<?php echo "full_width".$imaggine["id"];?>" <?php if($imaggine["full_width"]!=0) echo "checked";?>>
                     <br><a href="javascript:salva('<?php echo $imaggine["id"];?>','<?php echo "descrizione".$imaggine["id"];?>','<?php echo "nome".$imaggine["id"];?>','<?php echo "full_width".$imaggine["id"];?>')" class="info">Salva</a>
                     <br><a href="<?php echo "image_upload.php?progetto=$idprogetto&elimina=1&id=".$imaggine["id"];?>" class="info">Cancella</a>
                   </div>
        </div>
      </div>
      <?php
      $riga++;
      if($riga==2)
      {
      echo "</div>";
      $riga=0;
      }
    }else{
      if($riga!=0)
        echo "</div>";
        ?>
        <div class="row">
        <div class="col-md-12 imagecontainer imagefull">
           <div class=" view view-tenth" style="width:100%;">
           <img style="height:100%;width:100%;" src="<?php echo $imaggine['image'];?>">
               <div class="mask">
                 <br><span style='color:white;'>Nome</span> <input type='text' value="<?php echo $imaggine["nome"];?>" name="<?php echo "nome".$imaggine["id"];?>" id="<?php echo "nome".$imaggine["id"];?>">
                 <br><span style='color:white;'>Descrizione</span> <input type='text' value="<?php echo $imaggine["descrizione"];?>" name="<?php echo "descrizione".$imaggine["id"];?>" id="<?php echo "descrizione".$imaggine["id"];?>">
                 <br><span style='color:white;'>Larghezza Massima</span> <input type='checkbox' name="<?php echo "full_width".$imaggine["id"];?>" id="<?php echo "full_width".$imaggine["id"];?>" <?php if($imaggine["full_width"]!=0) echo "checked";?>>
                         <br><a href="javascript:salva('<?php echo $imaggine["id"];?>','<?php echo "descrizione".$imaggine["id"];?>','<?php echo "nome".$imaggine["id"];?>','<?php echo "full_width".$imaggine["id"];?>')" class="info">Salva</a>
                         <br><a href="<?php echo "image_upload.php?progetto=$idprogetto&elimina=1&id=".$imaggine["id"];?>" class="info">Cancella</a>
                       </div>
        </div>
      </div>
    </div>

          <?php
    }


  }
}
}else {
echo "sei giunto in questa pagina in modo anomalo... torna <a href='index.php'>QUI</a>";
}

  echo'
  <script>
  function salva(id,desc,nom,f)
  {
    console.log("descrizione".concat(id));
    var descrizione=document.getElementById(desc).value;
    var nome=document.getElementById(nom).value;
    var fw=document.getElementById(f).checked;
    console.log(fw);
    console.log(descrizione);
    if(fw)
    location.href=("image_upload.php?progetto='.$idprogetto.'"+"&modifica=1&fw=1"+"&id="+id+"&desc="+encodeURIComponent(descrizione)+"&nom="+encodeURIComponent(nome));
    else
    location.href=("image_upload.php?progetto='.$idprogetto.'"+"&modifica=1&fw=0"+"&id="+id+"&desc="+encodeURIComponent(descrizione)+"&nom="+encodeURIComponent(nome));
  }
  </script>';
?>
