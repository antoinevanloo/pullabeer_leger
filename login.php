<?php 
	include_once('fonctions.php');
?>

<!DOCTYPE html>
<html>

  <head>
	<!-- meta: UTF8 & scale view port bootstrap -->
   <?php linkmeta(); ?>
	
    <!-- import CSS: styles.css & bootstrap-->
    <?php linkcss(); ?>
	
	<!--import JS:  jquery-->
	<?php linkjs(); ?>
	
	<!-- Apport API Google-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.orange-indigo.min.css" />
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- FAVICON -->
	<link rel="icon" href="favicon.ico" />
   
   <!-- Nom du site -->
   <title>PULLABEER</title>
   
  </head>
  <body id="body-login" style="background:url('http://le-cartel.fr/heberg/background_login.jpg') center; display: flex; flex-direction: column; align-items: center; justify-content: center;">
	<?php
		openDB();
	?>
	
	<div id="page-form-content" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
	<div class="demo-card-square mdl-card mdl-shadow--2dp" style="height:300px; width:450px;">
	<form method="post" action="glogin.php" id="form_login" style="	height: 100%; width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
		<h2 style="font-size:140%;">Connexion à l'espace membre</h2>
		<div class="mdl-textfield mdl-js-textfield">
			<input type="text" class="mdl-textfield__input" name="mail" id="mail">
			<label class="mdl-textfield__label" for="mail">Courriel...</label>
		</div>
		
		<div class="mdl-textfield mdl-js-textfield">
			<input type="password" class="mdl-textfield__input" name="password" id="sample2">
			<label class="mdl-textfield__label" for="password">Mot de Passe...</label>
		</div>
		<button type="submit" name="submit"  class="mdl-button mdl-js-button">Connexion</button>
		<button type="reset" name="cancel" onclick="location.href='index.php'"  class="mdl-button mdl-js-button" value="Annuler">Annuler</button>
	</form>
	</div>
	</div>
	</body>
	
</html>





