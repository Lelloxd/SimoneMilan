<?php
if(isset($_GET["elimina"]) && isset($_GET["id"]))
{
  $id_risorsa=$_GET["id"];
  $sql="DELETE FROM images WHERE id_progetto=$id_risorsa";
  $query=mysqli_query($conn,$sql);
$sql="DELETE FROM progetti WHERE id=$id_risorsa";
$query=mysqli_query($conn,$sql);

}
if(isset($_GET["id"]) && isset($_GET["nom"]) && isset($_GET["desc"]) && isset($_GET["fw"]) )
{
$iz=$_GET["id"];
$nomis=$_GET["nom"];
$descris=$_GET["desc"];
$fw=$_GET["fw"];
$sql="UPDATE progetti SET nome='$nomis', descrizione ='$descris', full_width = '$fw' WHERE id = $iz;";
$query=mysqli_query($conn,$sql);
}
