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



  $query = "INSERT INTO progetti(image, nome, descrizione, full_width) VALUES ('$img', '$nome', '$desc', '$dim')";
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
           <img style="height:100%;width:100%;" src="data:image/jpeg;base64,<?php echo base64_encode($imaggine['image']);?>">
           <div class="mask">

             <br><span style='color:white;'>Nome Progetto</span> <input type='text' value="<?php echo $imaggine["nome"];?>" name="<?php echo "nome".$imaggine["id"];?>">
             <br><span style='color:white;'>Descrizione Progetto</span> <input type='text' value="<?php echo $imaggine["descrizione"];?>" name="<?php echo "descrizione".$imaggine["id"];?>">
             <br><span style='color:white;'>Larghezza Massima</span> <input type='checkbox' name="<?php echo "full_width".$imaggine["id"];?>" <?php if($imaggine["full_width"]!=0) echo "checked";?>>
                     <br><a href="javascript:salva('<?php echo $imaggine["id"];?>','<?php echo "descrizione".$imaggine["id"];?>','<?php echo "nome".$imaggine["id"];?>','<?php echo "full_width".$imaggine["id"];?>')" class="info">Salva</a>
                     <br><a href="<?php echo "image_upload.php?elimina=1&id=".$imaggine["id"];?>" class="info">Cancella</a>
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
           <img style="height:100%;width:100%;" src="data:image/jpeg;base64,<?php echo base64_encode($imaggine['image']);?>">
               <div class="mask">

                 <br><span style='color:white;'>Nome Progetto</span> <input type='text' value="<?php echo $imaggine["nome"];?>" id="<?php echo "nome".$imaggine["id"];?>">
                 <br><span style='color:white;'>Descrizione Progetto</span> <input type='text' value="<?php echo $imaggine["descrizione"];?>" id="<?php echo "descrizione".$imaggine["id"];?>">
                 <br><span style='color:white;'>Larghezza Massima</span> <input type='checkbox' id="<?php echo "full_width".$imaggine["id"];?>" <?php if($imaggine["full_width"]!=0) echo "checked";?>>
                         <br><a href="javascript:salva('<?php echo $imaggine["id"];?>','<?php echo "descrizione".$imaggine["id"];?>','<?php echo "nome".$imaggine["id"];?>','<?php echo "full_width".$imaggine["id"];?>')" class="info">Salva</a>
                         <br><a href="<?php echo "image_upload.php?elimina=1&id=".$imaggine["id"];?>" class="info">Cancella</a>
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
