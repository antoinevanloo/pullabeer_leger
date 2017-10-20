<?php 
  include_once('fonctions.php');
  $idConn = openDB();
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Apport API Google-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.orange-indigo.min.css" />
		<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Mon formulaire </title>
	</head>
	<body style="background:url('http://le-cartel.fr/heberg/background_login.jpg') center;">
		<header>
		</header>
<!--début php -->
<div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
<div class="demo-card-square mdl-card mdl-shadow--2dp" style="display: flex; flex-direction: column; align-items: center;justify-content: center; height: 100%; width: 500px;">
	<h3>Inscription</h3>
<?php 
			echo'<form method="post" action="affichage.php" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%;">
            Civilité:';
              $sqlQuery = 'SELECT * FROM civilite';
              $sqlResult = mysqli_query($idConn,$sqlQuery);
              $script = '<SELECT name="chCivilite" placeholder="civilité">';
              while($sqlRow = mysqli_fetch_array($sqlResult) )
              {
              $script.='<OPTION VALUE="'.$sqlRow['civ_id'].'">'.$sqlRow['civ_lib'].'</OPTION>';
              } 
              $script.= '</SELECT>';
              print($script);
              mysqli_free_result($sqlResult);
?>
			<div class="mdl-textfield mdl-js-textfield">
				<label>Client / Producteur:</label>
	  			<input type="radio" name="client" value="1" />Client
	  			<input type="radio" name="producteur" value="2" />Producteur
	  		</div>

			  <div class="mdl-textfield mdl-js-textfield">
				<input type="text" class="mdl-textfield__input" name="chNom" id="nom">
				<label class="mdl-textfield__label" for="nom">Nom</label>
		      </div>
			  
			  <div class="mdl-textfield mdl-js-textfield">
				<input type="text" class="mdl-textfield__input" name="chPrenom" id="prenom">
				<label class="mdl-textfield__label" for="prenom">Prénom</label>
		      </div>
			
			  <div class="mdl-textfield mdl-js-textfield">
				<input type="text" class="mdl-textfield__input" name="chEmail" id="email">
				<label class="mdl-textfield__label" for="email">Courriel</label>
		      </div>
			<?php			  
              echo'Date Naissance: ';
              echo' <SELECT name="jour_naissance" > ';
                
                  for ($i = 1 ; $i <= 31 ; $i++)
                   {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                    }   
                  echo'
              </SELECT>
              <SELECT name="mois_naissance" > ';
                  
                  for ($i = 1 ; $i <=12; $i++)
                  {
                    $tableau_mois_fr = Array (1=> 'Janvier','Février','Mars','Avril','Mai','Juin','juillet','Aout','Septembre','Octobre','Novembre','Décembre');

                    echo '<option value="'.$i.'">' .$tableau_mois_fr[$i] . '</option>';
                  }
                echo '
              </SELECT> 
              <SELECT name="anne_naissance" > ';
                  
                  for ($i = date('Y') ; $i >= 1900; $i--)
                  {
                    echo '<option value="'.$i.'">' .$i. '</option>';
                  }
               
                  echo '
              </SELECT> 

                </br>'
			?>
			  <div class="mdl-textfield mdl-js-textfield">
				<input type="password" class="mdl-textfield__input" name="chPassword" id="password">
				<label class="mdl-textfield__label" for="password">Mot de Passe</label>
		      </div>
			  
			  <div class="mdl-textfield mdl-js-textfield">
				<input type="password" class="mdl-textfield__input" name="chRepeatPassword" id="repeatPassword">
				<label class="mdl-textfield__label" for="repeatPassword">Répéter le Mot de Passe</label>
		      </div>
			  
			  <div class="mdl-textfield mdl-js-textfield">
				<input type="text" class="mdl-textfield__input" name="chAdresse" id="adresse">
				<label class="mdl-textfield__label" for="adresse">Adresse</label>
		      </div>
			  
			  <div class="mdl-textfield mdl-js-textfield">
				<input type="text" class="mdl-textfield__input" name="chComplementAdresse" id="complémentAdresse">
				<label class="mdl-textfield__label" for="complémentAdresse">Complément d'Adresse</label>
		      </div>
           		
			  <div class="mdl-textfield mdl-js-textfield">
				<input type="text" class="mdl-textfield__input" name="chVille" id="ville">
				<label class="mdl-textfield__label" for="ville">Ville</label>
		      </div>
			 
			  <div class="mdl-textfield mdl-js-textfield">
				<input type="text" class="mdl-textfield__input" name="chCP" id="CP">
				<label class="mdl-textfield__label" for="CP">Code Postal</label>
		      </div>
			<?php
       			$sqlQuery = 'SELECT * FROM bar';
              	$sqlResult = mysqli_query($idConn,$sqlQuery);
              	$script = 'Bar Préféré: <SELECT name="chBar" placeholder="Bar Préféré">';
              	while($sqlRow = mysqli_fetch_array($sqlResult) )
              	{
              	$script.='<OPTION VALUE="'.$sqlRow['bar_id'].'">'.$sqlRow['bar_nom'].'</OPTION>';
              	} 
              	$script.= '</SELECT> </br>';
              	print($script);
              	mysqli_free_result($sqlResult);

			?>
			  <button type="submit" name="submit"  class="mdl-button mdl-js-button">Confirmer</button>
			  <button type="reset" name="cancel" onclick="location.href='index.php'"  class="mdl-button mdl-js-button" value="Annuler">Annuler</button>
			</form>

 <!--fin php-->
</div>
</div>

	</body>

	
	<?php closeDB($idConn); ?> 
	
</html>