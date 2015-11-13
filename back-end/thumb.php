<?php
require_once("connect_db.php");
error_reporting(E_ALL);
function create_thumb($src,$dest,$desired_width)
{
  $exten=substr($src,-4);
  $errore=0;
  if($exten == ".jpg" || $exten=="jpeg" || $exten=="JPEG" || $exten==".JPG"  )
  $source_image=imagecreatefromjpeg($src);

  else if($exten==".png" || $exten==".PNG")
  $source_image=imagecreatefrompng($src);
  else
  {
  $errore=1;
  echo "tipo di file non supportato";
  }
  if(!$errore)
  {
  $width=imagesx($source_image);
  $height=imagesy($source_image);
  $desired_height=floor($height*($desired_width/$width));
  $virtual_image= imagecreatetruecolor($desired_width,$desired_height);
  imagecopyresampled($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
  if($exten==".png" || $exten==".PNG")
  {
  imagepng($virtual_image,$dest);
  echo "Thumbnail CREATO !";
  }else
  imagejpeg($virtual_image,$dest);
  }
}
$query = "SELECT * FROM images";
$query=mysqli_query($conn,$query);
if ($query) {
  while($imaggine = mysqli_fetch_array($query))
  {
    $ext=substr($imaggine["image"],-4);
    if($ext=="jpeg" || $ext=="JPEG")
    echo $ext;
    if(!$imaggine["full_width"])
    create_thumb($imaggine["image"],"thumb/".$imaggine["image"],960);
  }
}
?>
