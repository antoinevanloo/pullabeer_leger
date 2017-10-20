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
	
   <!-- icon site -->
   <link rel="shortcut icon" href="img/ico.png">
   
   <!-- Nom du site -->
   <title>PULLABEER</title>
   
  </head>
  
  <body>  <!-- corps du site -->
	
		<header> <!-- tête du corps -->

			<div class="container">
				<?php menu_principal();  ?>	
			</div> <!--/container -->

		</header> <!-- fin de tête du corps -->


		<div class="container">
		<div class="row">

<?php



//On verifie si lutilisateur est connecte
if(isset($_SESSION['uti_prenom']) && isset($_SESSION['uti_id'])){

	//on récupérer info user BDD
	$tableau_info_user = infoUser();
	$uti_perm = $tableau_info_user['uti_perm']; //id permission ADMIN MEMBRE VISITEUR

	if($uti_perm > 2){



			if (isset($_GET['id']) ) //if (!empty($_GET['id']))
						{
							$idmusique = $_GET['id'];
							$sqlmusiqueDEL = "SELECT * FROM musique WHERE mus_id = $idmusique";
							$sqlResultmusiqueDEL = mysqli_query($idConn,$sqlmusiqueDEL);
							if($sqlrowmusDEL = mysqli_fetch_array($sqlResultmusiqueDEL))
							$sqlQuery = "DELETE FROM musique WHERE mus_id = $idmusique";
							$sqlResult = mysqli_query($idConn,$sqlQuery);
							print("vous venez de supprimer la musique: ". $sqlrowmusDEL['mus_titre'] ." l'id: ". $idmusique.' </br> <strong>Ceci est irreversible </strong>');
						}



	

			echo'</br> <h4 class="text-center">Tableau Administration musique </h4>';
		/* <!--tableau php / affiche table utilisateur (MySQL) --> */
		echo'				<table class="table table-bordered" >
						
							<thead>
								<tr>
								  <th>#</th>
								  <th>Titre</th>
								  <th>Artiste</th>
								  <th>Genre</th>
								  <th>Lien</th>
								  <th>Statut</th>
								  <th colspan="2">Actions</th>
								</tr>	
							  </thead>
					
							  <tbody>';
		$afficher_musique='';
		$sql_query_afficher_musique = "SELECT * FROM musique,artiste,genre,validation WHERE mus_arti = arti_id AND mus_genre = genre_id AND mus_val = val_id";
		$sql_result_afficher_musiqu = mysqli_query($idConn,$sql_query_afficher_musique) or die('Erreur SQL !'.$sql_query_afficher_musique.'</br>'.mysql_error());

		

		while($sql_row_aff_mus = mysqli_fetch_array($sql_result_afficher_musiqu)){
							$afficher_musique.='<tr>';
							$afficher_musique.='<th scope="row">'.$sql_row_aff_mus['mus_id'].'</th>';
							$afficher_musique.='<td>'.$sql_row_aff_mus['mus_titre'].'</td>';
							$afficher_musique.='<td>'.$sql_row_aff_mus['arti_nom'].'</td>';
							$afficher_musique.='<td>'.$sql_row_aff_mus['genre_lib'].'</td>';
							$afficher_musique.='<td> <a href="'.$sql_row_aff_mus['mus_lien'].' ">'.$sql_row_aff_mus['mus_lien'].'</a></td>';
							$afficher_musique.='<td>'.$sql_row_aff_mus['val_lib'].'</td>';
							
							
							
							$afficher_musique.='<td> <a href="edit_info_user.php?id='.$sql_row_aff_mus['mus_id'].' ">Edit</a></td>';
										$afficher_musique.='<td> <a href="admin_mus.php?id='.$sql_row_aff_mus['mus_id'].'">Del</a></td>';
							$afficher_musique.='</tr>';
		}
		print($afficher_musique);
		mysqli_free_result($sql_result_afficher_musiqu);
					echo'	</tbody>
					</table>';
			echo'</div> 
				</div> 
			</div> ';






	}

}



?>	</div>
</div>

</body>

</html>