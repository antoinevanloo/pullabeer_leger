<?php 
	include_once('fonctions.php');
	$idConn=openDB();
	sessionOpen();
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
	
	<!-- FAVICON -->
	<link rel="icon" href="favicon.ico" />
   
  	<!-- Nom du site -->
  	<title>PullABeer</title>
   
 	</head>
  
  	<body>  <!-- corps du site -->
	
		<header> <!-- tête du corps -->

			<div class="container">
				<?php menu_principal(4);  ?>	
			</div> <!--/container -->

		</header> <!-- fin de tête du corps -->
		<iframe src="https://www.google.com/maps/d/embed?mid=1zIGyKifynyBSJlcixXtbnjdk7VU" width="350" height="350"></iframe>
			<div class="contact" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
			<div class="form_contact">
			<form id="contact" method="post" action="recap_contact.php">
			<h3>Choix du bar :</h3>
				<?php 
				$sqlQuery = 'SELECT * FROM bar';
              $sqlResult = mysqli_query($idConn,$sqlQuery);
              $script = '<SELECT name="choix_bar" placeholder="civilité">';
              while($sqlRow = mysqli_fetch_array($sqlResult) )
              {
              $script.='<OPTION VALUE="'.$sqlRow['bar_id'].'">'.$sqlRow['bar_nom'].'</OPTION>';
              } 
              
              $script.= '</SELECT> </br>';
              print($script);
              mysqli_free_result($sqlResult);
				?>	
					
						<div class="form_content">
							<h3>Vos coordonnées :</h3>
					
							<div class="mdl-textfield mdl-js-textfield">
								<input type="text" class="mdl-textfield__input" name="chNom" id="nom">
								<label class="mdl-textfield__label" for="nom">Nom...</label>
							</div>
						
							<div class="mdl-textfield mdl-js-textfield">
								<input type="text" class="mdl-textfield__input" name="chEmail" id="email">
								<label class="mdl-textfield__label" for="email">Adresse E-Mail...</label>
							</div>
					</div>
					
					<div class="form_content">
						<h3>Votre message :</h3>
					
							<div class="mdl-textfield mdl-js-textfield">
								<input type="text" class="mdl-textfield__input" name="chObjet" id="objet">
								<label class="mdl-textfield__label" for="objet">Objet...</label>
							</div>
							</br>
							<div class="mdl-textfield mdl-js-textfield">
								<textarea class="mdl-textfield__input" name="chMessage" cols="15" rows="5"></textarea>
								<label class="mdl-textfield__label" for="message">Message...</label>
							</div>
					</div>

					<div class="form_content">	
						<h3>Vos suggestions musicales :</h3>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" name="chArtiste" />
								<label class="mdl-textfield__label" for="artiste">Artiste...</label>
							</div>
						
							<label>Genre :</label>
							<?php 
								$script='<select name ="genre_mus">';
								$SQLQuery='SELECT * FROM genre';
								$SQLResult= mysqli_query($idConn,$SQLQuery);
								while ($SQLRow = mysqli_fetch_array($SQLResult)){
									$script.='<option value="'.$SQLRow['genre_id'].'">'.$SQLRow['genre_lib'].'</option>';
								}
								$script.='</select>';
								print($script);
								mysqli_free_result($SQLResult);
							?>
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" name="chTitre" />
								<label class="mdl-textfield__label" for="titre">Titre...</label>
							</div>	
						
							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" name="chLien"/></p>
								<label class="mdl-textfield__label" for="lien_youtube">Lien YouTube, Dailymotion, Soundcloud...</label>
							</div>
					</div>		
				<button type="submit" name="envoi"  class="mdl-button mdl-js-button">Envoyer</button>
				</form>
				</div>
		</div>
	</body>
</html>