<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Simone Milan - <?php if(isset($_GET["id"])){ echo $_GET["nome"]; $idp=$_GET["id"];} ?></title>
<!-- must have -->
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,700italic,900italic' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<link href="css/main.css" rel="stylesheet"/>
<link href="css/gallery.css" rel="stylesheet" />
<?php
require_once("back-end/connect_db.php");
$query = "SELECT * FROM images WHERE id_progetto=$idp";
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
         <img style="height:100%;width:100%;" id="<?php echo $imaggine['id'];?>" src="data:image/jpeg;base64,<?php echo base64_encode($imaggine['image']);?>">
             <div class="mask">
                        <h2><?php echo $imaggine['nome'];?></h2>
                  <p><?php echo $imaggine['descrizione'];?></p>
                       <a href="javascript:fullscreen(<?php echo $imaggine['id'];?>)" class="info">Schermo intero</a>
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
         <img style="height:100%;width:100%;" id="<?php echo $imaggine['id'];?>" src="data:image/jpeg;base64,<?php echo base64_encode($imaggine['image']);?>">
             <div class="mask">
                        <h2><?php echo $imaggine['nome'];?></h2>
                  <p><?php echo $imaggine['descrizione'];?></p>
                       <a href="javascript:fullscreen(<?php echo $imaggine['id'];?>)" class="info">Schermo intero</a>
                      </div>
      </div>
    </div>
  </div>

        <?php
  }


}
}
?>
           <nav class="navbar navbar-inverse navbar-fixed-bottom">
             <div class="container-fluid">
                 <div class="navbar-header hidden-lg logo"><a class="navbar-brand" href="#">Simone Milan</a>
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                     </button>
                 </div>
                 <div class="collapse navbar-collapse navbar-menubuilder">
                     <ul class="nav navbar-nav navbar-left">
                         <li><a href="/">Home</a>
                         </li>
                         <li><a href="/products">Products</a>
                         </li>
                         <li><a href="/about-us">About Us</a>
                         </li>
                         <li><a href="/contact">Contact Us</a>
                         </li>
                     </ul>
                 </div>
             </div>

           </nav>
           <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script>
function fullscreen(id)
{
  var i = document.getElementById(id);
  window.idfull=id;
  $('#'+window.idfull).parent().removeClass('view-tenth');

  if (i.requestFullscreen) {
  	i.requestFullscreen();
  } else if (i.webkitRequestFullscreen) {
  	i.webkitRequestFullscreen();
  } else if (i.mozRequestFullScreen) {
  	i.mozRequestFullScreen();
  } else if (i.msRequestFullscreen) {
  	i.msRequestFullscreen();
  }
  //$('#'+id).parent().addClass('view-tenth');


}

if (document.addEventListener)
{
    document.addEventListener('webkitfullscreenchange', exitHandler, false);
    document.addEventListener('mozfullscreenchange', exitHandler, false);
    document.addEventListener('fullscreenchange', exitHandler, false);
    document.addEventListener('MSFullscreenChange', exitHandler, false);

}
function exitHandler()
{
    if (document.webkitIsFullScreen== false || document.mozFullScreen== false || document.msFullscreenElement == false)
      $('#'+window.idfull).parent().addClass('view-tenth');

}
</script>
</body>
</html>
