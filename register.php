<?php

	$_db_host = "localhost";
	$_db_datenbank = "d024f4ae";
	$_db_username = "d024f4ae";
	$_db_password = "Andre1337!";


session_start();


$connection = mysql_connect($_db_host, $_db_username, $_db_password);



if(isset($_POST['submit'])){

	$error = false;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$email = $_POST['email'];

	if (empty($username)) {
		$error = true;
		echo 'Bitte geben Sie ein Benutzernamen ein.';
	} else if (strlen($username) < 3) {
		$error = true;
		echo 'Ihr Benutzername muss aus mindestens 3 Buchstaben bestehen.';
	} 
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo 'Bitte geben Sie eine korrekte E-Mail-Adresse an.';
		$error = true;
		
	} 

	if(strlen($password) == 0) {
		$error = true;
		echo 'Bitte geben Sie ein Passwort ein.';
		
	} else if(strlen($password) < 6) {
		$error = true;
		echo 'Ihr Passwort muss aus mindestens 6 Buchstaben bestehen.';
	}

	if($password != $password2) {
		$error = true;
		echo 'Die Passw�rter stimmen nicht �berein!';
		
	}
	

	if(!$error){
	mysql_select_db($_db_datenbank);
	$query = "INSERT INTO users(username, password, password2, email) VALUES('$username', '$password', '$password2', '$email')";
	$res = mysql_query($query);


	if($res) {
		header ("Locaton: profile.php");
		
		unset($username);
		unset($password);
		unset($password2);
		unset($email);
		
	} else {
		$error = true;
		echo 'Fehler bei der Registrierung! Versuchen Sie es erneut.';
		
	}


 }
}
?>


<!DOCTYPE html>

<html>
<title>Fachinformatik</title>
<link rel="shortcut icon" href="/enis/title.ico" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" href="http:/enis/css/button.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/button.css3button1.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/button.css3button2.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/css3button.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/cssmenu2.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/felder.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/gradient.css">

<link rel="stylesheet" type="text/css" href="http:/enis/css/submit.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/text.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/background.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/mainbox.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/textbox.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/footer.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/divboxen.css">
<link rel="stylesheet" type="text/css" href="http:/enis/css/register.css">


<link href="/enis/menu_source/styles.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type='text/javascript' src='/enis/menu_source/menu_jquery.js'></script>

<head>

<div class="logo">
<img src="/enis/bilder/logo.png">
</div>

<div id='cssmenu2'>
<ul>
	<li class='has-sub'><a href='/enis/kontakt.php'><span>Kontakt</span></a></li>
</ul>
</div>

<div style="position:absolute; margin-left: 130px; margin-top: 65px;">
<div id='cssmenu2'>
<ul>
	<li class='has-sub'><a href='/enis/impressum.php'><span>Impressum</span></a></li>
</ul>
</div></div>



<style type="text/css">
/*<![CDATA[*/
 
.nivoSlider {
    position: absolute;
    width:100px;
    height:100px;
	margin-left: auto;
    overflow: hidden;
	
}
.nivoSlider img {
    position:absolute;
    top:0px;
    left:0px;
    max-width: none;
    display: none;
}
.nivo-main-image {
    display: block !important;
    position: relative !important;
    width: 100% !important;
}

.nivoSlider a.nivo-imageLink {
    position:absolute;
    top:0px;
    left:0px;
    width:100%;
    height:100%;
    border:0;
    padding:0;
    margin:0;
    z-index:6;
    display:none;
}

.nivo-slice {
    border-radius: 5px;
    display:block;
    position:absolute;
    z-index:5;
    height:100%;
    top:0;
}
.nivo-box {
    display:block;
    position:absolute;
    z-index:5;
    overflow:hidden;
}
.nivo-box img { display:block; }

.nivo-caption {
    position:absolute;
    left:0px;
    bottom:0px;
    background:#000;
    text-align: center;
    color:#fff;
    width:100%;
    z-index:8;
    padding: 5px 10px;
    opacity: 0.8;
    overflow: hidden;
    display: none;
    -moz-opacity: 0.8;
    filter:alpha(opacity=8);
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;    
    box-sizing: border-box;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    -moz-border-radius-bottomleft: 5px;
    -moz-border-radius-bottomright: 5px;
        
}
.nivo-caption p {
    padding:5px;
    margin:0;
}
.nivo-caption a {
    display:inline !important;
}
.nivo-html-caption {
    display:none;
}

.nivo-directionNav a {
    position:absolute;
    top:45%;
    z-index:9;
    cursor:pointer;
}
.nivo-prevNav {
    left:0px;
}
.nivo-nextNav {
    right:0px;
}

.nivo-controlNav {
    text-align:center;
    padding: 15px 0;
}
.nivo-controlNav a {
    cursor:pointer;
}
.nivo-controlNav a.active {
    font-weight:bold;
}

.nivoSlider {
    position:relative;
    background:#fff url(http://u.jimdo.com/www52/o/s2ba029df7f23bf1c/userlayout/img/loading.gif) no-repeat 50% 50%;
    width:40%;
    height:40%;
    margin-bottom:10px;
    border-radius: 5px;
    box-shadow: 0px 3px 6px 2px rgba(0, 0, 0, 0.6);
	margin-left: 565px;
	margin-top: 70px;

}
.nivoSlider img {
    position:absolute;
    top:0px;
    left:0px;
    display:none;
    border-radius: 5px;
    box-shadow: 0px 3px 6px 2px rgba(0, 0, 0, 0.6);

}
.nivoSlider a {
    border:0;
    display:block;
}


}
/*]]>*/
</style>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js">
</script>
<script type="text/javascript" src="http://u.jimdo.com/www52/o/s2ba029df7f23bf1c/userlayout/js/jquery-nivo-slider-pack-neu.js">
</script>
<script type="text/javascript">
//<![CDATA[
  var $j = jQuery.noConflict();
        $j(window).load(function() {
        $j('#slider').nivoSlider({
        effect:'fade', //Specify sets like: 'fold,fade,sliceDown'
        slices:15,
        animSpeed:500, //Slide transition speed
        pauseTime:3000,
        startSlide:0, //Set starting Slide (0 index)
        directionNav:false, //Next & Prev
        directionNavHide:true, //Only show on hover
        controlNav:false, //1,2,3...
        controlNavThumbs:false, //Use thumbnails for Control Nav
        controlNavThumbsFromRel:false, //Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', //Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
        keyboardNav:true, //Use left & right arrows
        pauseOnHover:false, //Stop animation while hovering
        manualAdvance:false, //Force manual transitions
        captionOpacity:0.8, //Universal caption opacity
        beforeChange: function(){},
        afterChange: function(){},
        slideshowEnd: function(){}, //Triggers after all slides have been shown
        lastSlide: function(){}, //Triggers when last slide is shown
        afterLoad: function(){} //Triggers when slider has loaded
   });
});
//]]>  
</script>







</head>

<body class="multi-bgs">


<div id="slider" class="nivoSlider">
	<img src="/enis/bilder/mann.png">
	<img src="/enis/bilder/mann2.png">
	<img src="/enis/bilder/teamwork.png">
</div>
	

<div style="position:absolute; margin-left: 100px;">
<div id='cssmenu'>
<ul>
   <li class='active'><a href='/enis/index.php'><span>Startseite</span></a></li>
 
  <li class='has-sub'><a href='/enis/index.php'><span>�ber uns</span></a>
      <ul>
         <li class='last'><a href='/enis/ueberuns_eg.php'><span>Enis Gedikli - JS, HTML Programmierer</span></a></li>
     <li class='last'><a href='/enis/ueberuns_mm.php'><span>Max Mustermann - CSS Designer</span></a></li>
	 </ul>
   </li>

  
   
   <li class='has-sub'><a href='/enis/index.php'><span>Programme</span></a>
      <ul>
        <li class='last'><a href='/enis/telefonbuch.php'><span>Telefonbuch</span></a></li>
	 </ul>
   </li>
  <li class='active'><a href='/enis/schule.php'><span>Schulische Laufbahn</span></a></li>
  <li class='active'><a href='/enis/Freizeit.php'><span>Freizeit</span></a></li>
  

</ul>
  </div></div>


	<div class="textbox">
<div style="position:absolute; margin-top: 0px; margin-left:10px;">
<h1>Registrieren</h1>
<br/>
	<div id="registr">
		<form action="?registr=1" method="post">
			<label>Username</label>
				<input id="name" name="username" placeholder="Username" type="text">
			<label>Passwort</label>
				<input id="password" name="password" placeholder="**********" type="password">
			<label>Passwort wiederholen</label>
				<input id="password2" name="password2" placeholder="**********" type="password">
			<label>E-Mail</label>
				<input id="email" name="email" placeholder="test@web.de" type="email">
			<input name="submit" type="submit" value=" Registrieren ">
				<span>
					<?php
						echo $error;
					?>
					Test
				</span>
				
		</form>
	</div>
</div></div></div>



<div style="position:absolute; margin-top: 230px; margin-left: 500px;">
<h2 style="color:white; font-family: tahoma;">Sonstiges</h2>
<p style="color:white; font-family: tahoma;">Ich hoffe euch gef�llt die Seite<br/> und ihr hinterlasst mir per E-Mail<br/> Verbesserungsvorschl�ge, um<br/> diese Seite zu verbessern.<br/><br/><br/> Mit freundlichen Gr��en</p>
</div>


</body>
</head>
</html>
