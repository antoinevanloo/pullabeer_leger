<?php 
	include_once('fonctions.php');
	$idConn = openDB();
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
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	
	<!-- FAVICON -->
	<link rel="icon" href="favicon.ico" />
   
   <!-- Nom du site -->
   <title>PullABeer</title>
   
  </head>
  
  <body>  <!-- corps du site -->
	
		<header> <!-- tête du corps -->

			<div class="container">
				<?php menu_principal(1); 
//On verifie si lutilisateur est connecte
if(isset($_SESSION['uti_prenom']) && isset($_SESSION['uti_id']))
{
			//si OUI on récupérer info user BDD
			$tableau_info_user = infoUser();
			$prenom = $tableau_info_user['uti_prenom'];
			$uti_id = $tableau_info_user['uti_id'];
			$nom = $tableau_info_user['uti_nom'];
			$email = $tableau_info_user['uti_mail'];
			$mdp_bdd = $tableau_info_user['uti_mdp'];
			$uti_perm = $tableau_info_user['uti_perm']; //id permission ADMIN MEMBRE VISITEUR
			$uti_naiss = $tableau_info_user['uti_naiss'];
			$perm_lib = $tableau_info_user['perm_lib']; //libl permission

			// initialisation variable et recuperation jour,mois,année d'une date
              $date_divise = explode("-", $uti_naiss);
              $annee = $date_divise[0];
              $mois = $date_divise[1];
              $jour = $date_divise[2];
              //retiré le 0 si mois < 10 car 01,02,03,04,05,06 -> 1,2,3,4,5,6
              if($mois < 10){
                $mois_divise = explode(("0"), $mois);
                $mois_split = $mois_divise[1];
              }
              else{
              	$mois_split = $mois;
              }
              if($jour < 10){
              	$jour_divise = explode(0, $jour);
              	$jour_split = $jour_divise[1];
              }
              else{
              	$jour_split = $jour;
              }



	//On verifie si le formulaire a ete envoye
	if(isset($_POST['prenom'], $_POST['nom'], $_POST['email'],$_POST['jour_naissance'],$_POST['mois_naissance'],$_POST['anne_naissance'], $_POST['mdp'], $_POST['nouveau_mdp'], $_POST['conf_nouveau_mdp']) )
	{
		if(sha1($_POST['mdp']) == $mdp_bdd)
		{
			if($_POST['nouveau_mdp'] == $_POST['conf_nouveau_mdp'])
			{
				if(isset($_POST['prenom']))      $prenom=$_POST['prenom'];
              else      $prenom="";
              if(isset($_POST['nom']))      $nom=$_POST['nom'];
              else      $nom="";
              if(isset($_POST['email']))      $email=$_POST['email'];
              else      $email="";
              if(isset($_POST['jour_naissance']))      $jour_naissance_form=$_POST['jour_naissance'];
              else      $jour_naissance_form="";
              if(isset($_POST['mois_naissance']))      $mois_naissance_form=$_POST['mois_naissance'];
              else      $mois_naissance_form="";
              if(isset($_POST['anne_naissance']))      $anne_naissance_form=$_POST['anne_naissance'];
              else      $anne_naissance_form="";
              if(isset($_POST['mdp']))      $mdp=$_POST['mdp'];
              else      $mdp="";
              if(isset($_POST['nouveau_mdp']))      $nouveau_mdp=sha1($_POST['nouveau_mdp']);
              else      $nouveau_mdp="";
              if(isset($_POST['conf_nouveau_mdp']))      $conf_nouveau_mdp=$_POST['conf_nouveau_mdp'];
              else      $conf_nouveau_mdp="";

              	 //concténation jour,mois,année = date naissance
              	$datenaissance_form = $anne_naissance_form.'-'.$mois_naissance_form.'-'.$jour_naissance_form;

				$sql_modification = "UPDATE utilisateur SET uti_prenom='$prenom',uti_nom ='$nom',uti_mail='$email',uti_naiss='$datenaissance_form',uti_mdp='$nouveau_mdp' WHERE uti_id='$uti_id' ";
				mysqli_query($idConn,$sql_modification) or die('Erreur SQL !'.$sql_modification.'<br>'.mysql_error()); 
				$form = false;
			}
			else{
				$form = true;
				$message ="votre nouveau mot de passe n'est pas similaire à celui du formulaire";
			}
		}
		else
		{
			$form = true;
			$message ="votre ancien mot de passe n'est pas valide";
		}
	}
	else
	{
		$form = true;
		$message ="tout les champs ne sont pas remplis";
	}

}
else
{
$form = true;
$message ="vous n'êtes pas connecté(e)";
}

if($form)
{
	//On affiche un message sil y a lieu
		if(isset($message))
		{
			echo '<strong>'.$message.'</strong>';
		}
}

				//afficher formulaire edititon utilisateur si connecté
				if(isset($_SESSION['uti_prenom']) && isset($_SESSION['uti_id']))
					{

				 ?>

			<center>
				<form action="moncompte.php" method="post">
			        Vous pouvez modifier vos informations:<br />
			        
			        	<label for="nom">Nom:</label><input type="text" name="nom" value="<?php echo $nom; ?>" /><br />
			            <label for="prenom">prenom:</label><input type="text" name="prenom" value="<?php echo $prenom; ?>" /><br />
			            <label for="email">Courriel:</label><input type="text" name="email" value="<?php echo $email; ?>" /><br />
			            <label for="date_naissance">Date Naissance:</label>
              				<SELECT name="jour_naissance" >
              				<?php
              				echo'<option value="'.$jour_split.'"> '. $jour_split.'</option>';
			                  for ($i = 1 ; $i <= 31 ; $i++)
			                   {
			                    echo '<option value="' . $i . '">' . $i . '</option>';
			                    }   
			                  ?>
              				</SELECT>
              				<SELECT name="mois_naissance" > ';
                  <?php 
                  			$tableau_mois_fr = Array (1=> 'Janvier','Février','Mars','Avril','Mai','Juin','juillet','Aout','Septembre','Octobre','Novembre','Décembre');

                  			 echo'<option value="'.$mois_split.'"> '. $tableau_mois_fr[$mois_split] .'</option>';
			                  for ($i = 1 ; $i <=12; $i++)
			                  {
			                    echo '<option value="'.$i.'">' .$tableau_mois_fr[$i] . '</option>';
			                  }
                  ?>
              				</SELECT> 
              				<SELECT name="anne_naissance" > ';
                  <?php
                  			 echo '<option value="'.$annee.'">' .$annee. '</option>';
			                  for ($i = date('Y') ; $i >= 1900; $i--)
			                  {
			                    echo '<option value="'.$i.'">' .$i. '</option>';
			                  }
			               ?>
                
              				</SELECT>
              				</br>  
              				<label for="permission">permission: </label><?php echo $perm_lib; ?><br />
			            </br></br>
			            <label for="ancien mdp">ancien mdp:</label><input type="password" name="mdp" value="" /><br />
			            <label for="nouveau mdp">nouveau mdp:</label><input type="password" name="nouveau_mdp" value="" /><br />
			            <label for="confirmation nouveau mdp">confirmation nouveau mdp:</label><input type="password" name="conf_nouveau_mdp" value="" /><br />
			            
			            <input type="submit" value="Envoyer" />
        
    			</form>
    		</center>

    				<?php  } ?>


<?php   

if(isset($uti_perm)) {
	if($uti_perm > 2){
		if (isset($_GET['id']) ) //if (!empty($_GET['id']))
						{
							$idpersonne = $_GET['id'];
							$sqlnomutilisateurDEL = "SELECT uti_nom,uti_prenom FROM utilisateur WHERE uti_id = $idpersonne";
							$sqlResultnomutilisateurDEL = mysqli_query($idConn,$sqlnomutilisateurDEL);
							if($sqlrownomutilisateurDEL = mysqli_fetch_array($sqlResultnomutilisateurDEL))
							$sqlQuery = "DELETE FROM utilisateur WHERE uti_id = $idpersonne";
							$sqlResult = mysqli_query($idConn,$sqlQuery);
							print("vous venez de supprimer l'utilisateur ". $sqlrownomutilisateurDEL['uti_nom'] .' '. $sqlrownomutilisateurDEL['uti_prenom'] ." l'id: ". $idpersonne.' </br> <strong>Ceci est irreversible </strong>');
						}
					
		echo'<div id="accordion">        
				<div id="headingZero" class="panel-heading">     
					
						<a href="#collapseZero" data-toggle="collapse" data-parent="#accordion"> Cliquez ici pour administrez les utilisateurs </a>
					
				</div> 
				<div id="collapseZero" class="panel-collapse collapse"> 
					<div class="panel-body">';
				
		echo'</br> <h4 class="text-center">Tableau Modification Utilisateur </h4>';
		/* <!--tableau php / affiche table utilisateur (MySQL) --> */
		echo'				<table class="table table-bordered" >
						
							<thead>
								<tr>
								  <th>#</th>
								  <th>Prénom</th>
								  <th>Nom</th>
								  <th>Email</th>
								  <th>Date de naissance</th>
								  <th>Civilité</th>
								  <th>Bar Préf. </th>
								  <th>Permission </th>
								  <th colspan="2">Actions</th>
								</tr>	
							  </thead>
					
							  <tbody>';
		$afficher_utilisateur='';
		$sql_query_afficher_utilisateur = "SELECT * FROM utilisateur,civilite,bar,permission WHERE civ_id = uti_civ AND bar_id = uti_barpref AND uti_perm = perm_id";
		$sql_result_aff_utilisateur = mysqli_query($idConn,$sql_query_afficher_utilisateur) or die('Erreur SQL !'.$sql_query_afficher_utilisateur.'</br>'.mysql_error());

		

		
		$select_permission='';

		while($sql_row_aff_util = mysqli_fetch_array($sql_result_aff_utilisateur)){
			$afficher_utilisateur.='<tr>';
							$afficher_utilisateur.='<th scope="row">'.$sql_row_aff_util['uti_id'].'</th>';
							$afficher_utilisateur.='<td>'.$sql_row_aff_util['uti_prenom'].'</td>';
							$afficher_utilisateur.='<td>'.$sql_row_aff_util['uti_nom'].'</td>';
							$afficher_utilisateur.='<td>'.$sql_row_aff_util['uti_mail'].'</td>';
							$afficher_utilisateur.='<td>'.$sql_row_aff_util['uti_naiss'].'</td>';
							$afficher_utilisateur.='<td>'.$sql_row_aff_util['civ_lib'].'</td>';
							$afficher_utilisateur.='<td>'.$sql_row_aff_util['bar_nom'].'	</td>';
							$afficher_utilisateur.='<td>'.$sql_row_aff_util['perm_lib'].'</td>';
							
							
							$afficher_utilisateur.='<td> <a href="edit_info_user.php?id='.$sql_row_aff_util['uti_id'].' ">Edit</a></td>';
							//$afficher_utilisateur.='<td> <a href="affichage.php?id='.$sql_row_aff_util['uti_id'].' ">View</a></td>';
							$afficher_utilisateur.='<td> <a href="moncompte.php?id='.$sql_row_aff_util['uti_id'].'">Del</a></td>';
							$afficher_utilisateur.='</tr>';
		}
		print($afficher_utilisateur);
		mysqli_free_result($sql_result_aff_utilisateur);
					echo'	</tbody>
					</table>';
			echo'</div> 
				</div> 
			</div> ';
				echo'<form method="POST" action="nouvEven.php">';
			echo'<button  name="nouvEven" href="nouvEven.php"  class="mdl-button mdl-js-button">Créer une nouvel évènement</button>';
			echo'</form>';
			echo"<br />";
			echo'<form method="POST" action="admin_mus.php">';
			echo'<button  name="nouvEven" href="admin_mus.php"  class="mdl-button mdl-js-button">Administrez Les musiques</button>';
			echo'</form>';
	}
}

?>
									
				
	


			</div> <!--/container -->

		</header> <!-- fin de tête du corps -->
	  
		  	<div class="container">
				 <div class="row">
					








				 </div> <!-- /row -->
		  </div><!-- /container -->
	  
	  
		<footer> <!--pied de page -->

			<?php //footer_principal();
					closeDB($idConn);

			?>
		
		</footer> <!--fin de pied de page -->
  
  </body><!--fin du corps du site -->
  
  
</html>