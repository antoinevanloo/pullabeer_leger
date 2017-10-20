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
			<?php
				//récupérer les champs 
				if(isset($_POST['choix_bar']))      $bar=$_POST['choix_bar'];
				else      $bar="";


				if(isset($_POST['chNom']))      $nom=$_POST['chNom'];
				else      $nom="";

				if(isset($_POST['chEmail']))      $email=$_POST['chEmail'];
				else      $email="";

				if(isset($_POST['chObjet']))      $objet=$_POST['chObjet'];
				else      $objet="";

				if(isset($_POST['chMessage']))      $message=$_POST['chMessage'];
				else      $message="";

				if(isset($_POST['chArtiste']))      $artiste=$_POST['chArtiste'];
				else      $artiste="";
				
				if(isset($_POST['genre_mus']))      $genre=$_POST['genre_mus'];
				else      $genre="";
				
				if(isset($_POST['chTitre']))      $titre=$_POST['chTitre'];
				else      $titre="";
				
				if(isset($_POST['chLien']))      $lien=$_POST['chLien'];
				else      $lien="";

				// vérifie si les champs sont vides 
				if(empty($nom) OR empty($email)) { 
					echo '<font color="red"> Attention, veuillez remplir tous les champs !</font>'; 
					} 
				else{
					// vérifie si l'artiste est dans la table
					$sql = "SELECT * FROM artiste WHERE arti_nom='$artiste'";
					$result = mysqli_query($idConn,$sql);
					$tmp = mysqli_fetch_array($result);
				
				}
				
				if (empty($tmp)){
					// on écrit la requête sql 
					$sql_arti = "INSERT INTO artiste(arti_nom,arti_val) VALUES('$artiste',2)"; 
					mysqli_query($idConn,$sql_arti) or die(mysqli_error($idConn)); 
					
					$idArtiste = mysqli_insert_id($idConn);
				}
				else{
					$idArtiste = $tmp["arti_id"];
				}
				
				$idConn = openDB();

				
				$sql_mus = "INSERT INTO musique(mus_titre,mus_arti,mus_genre,mus_lien,mus_val) VALUES('$titre','$idArtiste','$genre','$lien',2)"; 
				mysqli_query($idConn,$sql_mus) or die(mysqli_error($idConn)); 

				$sql_cont = "INSERT INTO contact(contact_bar,contact_nom,contact_mail,contact_objet,contact_message) VALUES('$bar','$nom','$email','$objet','$message')"; 
				mysqli_query($idConn,$sql_cont) or die(mysqli_error($idConn)); 
				
				
				
				
				
				// mysqli_free_result();
				
				//Affichage identité

				  $sql_bar = "SELECT bar_nom FROM bar WHERE bar_id = $bar";
                                $SQLresult = mysqli_query($idConn,$sql_bar);
                                print('<b>Bar : </b>');
                                while($SQLrow = mysqli_fetch_array($SQLresult)){
                                  print($SQLrow['bar_nom'].'</br>');
                                }
                                mysqli_free_result($SQLresult); 

                                echo"<br />";
				print ('Nom:'.$nom);
				echo"<br />";
				print ('Email:'.$email);
				echo"<br />";
				print ('Objet:'.$objet);
				echo"<br />";
				print ('Message:'.$message);
				echo"<br />";
				print ('Artiste:'.$artiste);
				echo"<br />";
				print ('Titre:'.$titre);
				
			
					
			?>
		<footer> <!--pied de page -->

		</footer> <!--fin de pied de page -->
  <?php   closeDB($idConn); ?>
  </body><!--fin du corps du site -->
  
  
</html>