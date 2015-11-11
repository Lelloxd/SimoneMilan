<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Simone Milan - Contatti</title>
<!-- must have -->
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,700italic,900italic' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<link href="css/main.css" rel="stylesheet"/>
<link href="css/contatti.css" rel="stylesheet" />
<img src="images/logo.png" class="logo-centered">

<form id='contactForm'>
<div id="contentmail">
<ul class="form-style-1">
    <li><label>Nome & Cognome <span class="required">*</span></label><input type="text" name="field1" id="nome" class="field-divided" placeholder="Nome" required>&nbsp;<input type="text" name="field2" id="cognome" class="field-divided" placeholder="Cognome" /></li>
    <li>
        <label>Email <span class="required">*</span></label>
        <input type="email" name="field3" id="email" class="field-long" required>
    </li>
    <li>
        <label>Oggetto</label>
        <input type='text' name="field4" id="oggetto" class="field-select" required>
    </li>
    <li>
        <label>Il tuo Messaggio <span class="required">*</span></label>
        <textarea name="field5" id="messaggio" class="field-long field-textarea"></textarea>
    </li>
    <li>
        <input class='submit' type="submit" value="Invia"/>
    </li>
</ul>
</div>
<div id="sendloading">
  <div class="sk-cube-grid">
    <div class="sk-cube sk-cube1"></div>
    <div class="sk-cube sk-cube2"></div>
    <div class="sk-cube sk-cube3"></div>
    <div class="sk-cube sk-cube4"></div>
    <div class="sk-cube sk-cube5"></div>
    <div class="sk-cube sk-cube6"></div>
    <div class="sk-cube sk-cube7"></div>
    <div class="sk-cube sk-cube8"></div>
    <div class="sk-cube sk-cube9"></div>
  </div>
  <b class='logo-centered'>Invio Mail in Corso ...</b>
</div>
</form>
 <div class='social'><img src='img/instagram.png'><img src='img/facebook.png'><img src='img/twitter.png'></div>
  <div class='divcontatti'>
    <div><img src='img/email-icon.png'><b><a href='mailto:simone@simonemilanfoto.it'>Simone@SimoneMilanFoto.it</a></b></div>
    <div><img src='img/iPhone-icon.png'><b>347 597 4981</b></div>
    <div><a href='http://lelloxd.altervista.org'><img src='img/web-icon.png'></a><b>Website Designed By <a href='http://lelloxd.altervista.org'>Antonello Fraioli</a></b></div>
  </div>

<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
      <div class="navbar-header hidden-lg logo"><a class="navbar-brand" href="#">Simone Milan</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
      </div>
      <div class="collapse navbar-collapse navbar-menubuilder">
          <ul class="nav navbar-nav navbar-left">
              <li><a href="index.html">Home</a>
              </li>
              <li><a href="gallery.php">Progetti</a>
              </li>
              <li><a href="chisono.html">Chi sono</a>
              </li>
              <li><a href="contatti.php">Contattami</a>
              </li>
          </ul>
      </div>
  </div>

</nav>
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$('#contactForm').submit(function () {
 invia();
 return false;
});
function invia()
{
    var name=document.getElementById("nome").value;
    var surname=document.getElementById("cognome").value;
	var email=document.getElementById("email").value;
  var oggetto=document.getElementById("oggetto").value;
	var comments=document.getElementById("messaggio").value;
(function($)
{
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#contentmail').hide();
                $('#sendloading').show();
            },
            complete: function() {
                $('#sendloading').hide();
                $('#contentmail').show();
            },
            success: function() {
                $('#sendloading').hide();
                $('#contentmail').show();
            }
        });
        var $container = $("#contentmail");
        if(surname!="")
        $container.load("back-end/sendmail.php?email="+email+"&nome="+encodeURIComponent(name)+"&comments="+ encodeURIComponent(comments)+"&oggetto="+encodeURIComponent(oggetto)+"&cognome="+encodeURIComponent(surname));
        else
          $container.load("back-end/sendmail.php?email="+email+"&nome="+encodeURIComponent(name)+"&comments="+ encodeURIComponent(comments)+"&oggetto="+encodeURIComponent(oggetto));
})(jQuery);
}
</script>
</body>
</html>
