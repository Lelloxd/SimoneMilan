<?php
  //session_start();
  require("connect_db.php");
if(isset($_POST["nome"]))
{
  $quevy="SELECT * FROM progetti ORDER BY id DESC LIMIT 1";
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

  $target_dir = "uploads/progetti/";
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
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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



  $query = "INSERT INTO progetti(image, nome, descrizione, full_width) VALUES ('uploads/progetti/$newfilename', '$nome', '$desc', '$dim')";
  if (!mysqli_query($conn, $query)){
    echo "Error: Something went wrong :(";
  }
}
  require("servizip.php");
  $query = "SELECT * FROM progetti ORDER BY id";
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

             <br><span style='color:white;'>Nome Progetto</span> <input type='text' value="<?php echo $imaggine["nome"];?>" name="<?php echo "nome".$imaggine["id"];?>">
             <br><span style='color:white;'>Descrizione Progetto</span> <input type='text' value="<?php echo $imaggine["descrizione"];?>" name="<?php echo "descrizione".$imaggine["id"];?>">
             <br><span style='color:white;'>Larghezza Massima</span> <input type='checkbox' name="<?php echo "full_width".$imaggine["id"];?>" <?php if($imaggine["full_width"]!=0) echo "checked";?>>
                     <br><a href="javascript:salva('<?php echo $imaggine["id"];?>','<?php echo "descrizione".$imaggine["id"];?>','<?php echo "nome".$imaggine["id"];?>','<?php echo "full_width".$imaggine["id"];?>')" class="info">Salva</a>
                     <br><a href="<?php echo "progetti.php?elimina=1&id=".$imaggine["id"];?>" class="info">Cancella</a>
                     <br><a href="image_upload.php?progetto=<?php echo $imaggine["id"];?>" class="info">Modifica foto del progetto</a>
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

                 <br><span style='color:white;'>Nome Progetto</span> <input type='text' value="<?php echo $imaggine["nome"];?>" id="<?php echo "nome".$imaggine["id"];?>">
                 <br><span style='color:white;'>Descrizione Progetto</span> <input type='text' value="<?php echo $imaggine["descrizione"];?>" id="<?php echo "descrizione".$imaggine["id"];?>">
                 <br><span style='color:white;'>Larghezza Massima</span> <input type='checkbox' id="<?php echo "full_width".$imaggine["id"];?>" <?php if($imaggine["full_width"]!=0) echo "checked";?>>
                         <br><a href="javascript:salva('<?php echo $imaggine["id"];?>','<?php echo "descrizione".$imaggine["id"];?>','<?php echo "nome".$imaggine["id"];?>','<?php echo "full_width".$imaggine["id"];?>')" class="info">Salva</a>
                         <br><a href="<?php echo "progetti.php?elimina=1&id=".$imaggine["id"];?>" class="info">Cancella</a>
                         <br><a href="image_upload.php?progetto=<?php echo $imaggine["id"];?>" class="info">Modifica foto del progetto</a>
                        </div>
        </div>
      </div>
    </div>

          <?php
    }


  }
  }
  echo'
  <script>
  function salva(id,desc,nom,f)
  {
    console.log(desc);
    console.log(id);
    console.log(nom);
    console.log(f);
    var descrizione=document.getElementById(desc).value;
    var nome=document.getElementById(nom).value;
    var fw=document.getElementById(f).checked;
    console.log(fw);
    console.log(descrizione);
    if(fw)
    location.href=("progetti.php?"+"modifica=1&fw=1"+"&id="+id+"&desc="+encodeURIComponent(descrizione)+"&nom="+encodeURIComponent(nome));
    else
    location.href=("progetti.php?"+"modifica=1&fw=0"+"&id="+id+"&desc="+encodeURIComponent(descrizione)+"&nom="+encodeURIComponent(nome));
  }
  </script>';
  ?>
