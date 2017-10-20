<?php 

	include_once('fonctions.php');
	$id_utilisateur_conn = sessionOpen();

				// Partie connexion
                    $idConn = openDB();
                    			

?>

<!DOCTYPE html>
<html>

  <head>
	<!-- meta: UTF8 & scale view port bootstrap -->
   <?php linkmeta(); ?>
	
    <!-- import CSS: styles.css & bootstrap-->
    <?php linkcss(); ?>
    <link rel ="stylesheet" href="css/styles.css" />
	
	<!--import JS:  jquery-->
	<?php linkjs(); ?>
	
	<!-- Apport API Google-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	
   <!-- icon site -->
   <link rel="shortcut icon" href="img/ico.png">
   
   <!-- Nom du site -->
   <title>NOM DU SITE</title>
   
  </head>
  
  <body>  <!-- corps du site -->
	
		<header> <!-- tête du corps -->

			<div class="container">
				<?php menu_principal(1); 

				 ?>	
			</div> <!--/container -->
		</header> <!-- fin de tête du corps -->



</br></br>

<?php    
//si utilisateur connecter afficher lecteur mp3 
if(isset($_SESSION['uti_prenom']) && isset($_SESSION['uti_id']))
{

	if(isset($_SESSION['idll'])){
		$idllAFF = $_SESSION['idll'];
		$sqltitrell = "SELECT ll_titre FROM listelecture WHERE ll_id = $idllAFF";
		$sqlQuerytitrell = mysqli_query($idConn,$sqltitrell);
		if($sqlRowtitrell = mysqli_fetch_array($sqlQuerytitrell)){
			print('vous avez séléctioné la liste liste de lecture: '.$sqlRowtitrell['ll_titre']);
		}
		
	}

?>
		
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav well"> <!-- coté gauche affichage genre et/ou artiste -->
    	<h5>Musique Disponible</h5>
	

    	<form method="post" action="mp3.php">
	    	<!--<SELECT name="selectionmus">
	    	  <OPTION value="1">Genres</OPTION>
	    	  <OPTION value="2">Artistes</OPTION>
	        </SELECT> -->
	        <input type="radio" name="selectionmus" value="1"/>Genres</br>
	        <input type="radio" name="selectionmus2" value="2"/>Artistes</br>
	        <input type="submit" value="ok"/>
	    </form>

<?php    

	if(isset($_POST['selectionmus']))  $genre=$_POST['selectionmus'];
	else $genre="";
	if(isset($_POST['selectionmus2']))  $artiste=$_POST['selectionmus2'];
	else $artiste="";
	if(isset($_GET['idarti']))  $artisteget=$_GET['idarti'];
	else $artisteget=0;
	if(isset($_GET['idgenre']))  $genreget=$_GET['idgenre'];
	else $genreget=0;


	//affiche les genres àpres avoir séléctionné 
	if($genre == 1 or $genreget > 0 ){
		$sqlQueryGenre = "SELECT genre_id,genre_lib FROM genre";
		$sqlResultGenre = mysqli_query($idConn,$sqlQueryGenre);

		while($sqlRowGenre = mysqli_fetch_array($sqlResultGenre)){
		
			print(utf8_decode('<a href="mp3.php?idgenre='.$sqlRowGenre['genre_id'].'"> '.$sqlRowGenre['genre_lib'].' </a></br>'));

		}
		mysqli_free_result($sqlResultGenre);
	}
	
	// ou afficher artiste apres avoir sélectionné 
	if( $artiste ==2 or $artisteget >0) {
		$sqlQueryArtiste = 'SELECT arti_id,arti_nom FROM artiste WHERE arti_val = 1';
		$sqlResultArtiste = mysqli_query($idConn,$sqlQueryArtiste);
		while($sqlRowArtiste = mysqli_fetch_array($sqlResultArtiste)){

			print(utf8_decode('<a href="mp3.php?idarti='.$sqlRowArtiste['arti_id'].'"> '.$sqlRowArtiste['arti_nom'].' </a></br>'));
		}
		mysqli_free_result($sqlResultArtiste);
	
	}


?>


    
    </div>
    <div class="col-sm-4 text-left"> 

    <!-- récupération GET idarti (avant affichage musique)  -->
    	<?php
    		if(isset($_GET['idarti']) ){
    				$idarti = $_GET['idarti'];
    				$sqlQueryIDarti = "SELECT * FROM musique WHERE mus_arti = $idarti AND mus_val = 1";
		            $sqlResultIDarti = mysqli_query($idConn,$sqlQueryIDarti);
		            while($sqlRowIDarti = mysqli_fetch_array($sqlResultIDarti) ){
		            	print('<a class="glyphicon glyphicon-plus" href="mp3.php?idchm='.$sqlRowIDarti['mus_id'].'&idarti='.$idarti.'&add=true "></a><a href="mp3.php?idchm='.$sqlRowIDarti['mus_id'].'&idarti='.$idarti.' ">'.$sqlRowIDarti['mus_titre'].'</a></br></br>');
		            }
    		}


    ?>
    <!-- récupération GET idgenre (avant affichage musique)  -->
<?php
    		if(isset($_GET['idgenre']) ){
    				$idgenre = $_GET['idgenre'];
    				$sqlQueryIDgenre = "SELECT * FROM musique WHERE mus_genre = $idgenre AND mus_val = 1";
		            $sqlResultIDgenre = mysqli_query($idConn,$sqlQueryIDgenre);
		            while($sqlRowIDgenre = mysqli_fetch_array($sqlResultIDgenre) ){
		            	print('<a class="glyphicon glyphicon-plus" href="mp3.php?idchm='.$sqlRowIDgenre['mus_id'].'&idarti='.$idgenre.'&add=true "></a> <a href="mp3.php?idchm='.$sqlRowIDgenre['mus_id'].'&idarti='.$idgenre.'& ">'.$sqlRowIDgenre['mus_titre'].'</a></br></br>');
		            }
    		}
?>

      <h1>Lecteur</h1>


		      
		<?php 

		//récupération id musique avant de play
		if( isset($_GET['idchm']) ){
					$idchm = $_GET['idchm'];
					//requête SQL pour le chemin de la musique
					$sqlQueryMP3chm = "SELECT mus_chemin FROM musique WHERE mus_id = $idchm";
		            $sqlResultMP3chm = mysqli_query($idConn,$sqlQueryMP3chm);
		            $sqlRowMP3chm = mysqli_fetch_array($sqlResultMP3chm);
		}



			?>


		<audio tabindex="0" id="player" controls="controls" preload="auto">
		  <source src="<?php echo$sqlRowMP3chm[0] ?>" type="audio/mp3" />
		  <source src="musique/rock/ACDC/1.mp3" type="audio/mp3" /> <!-- appelle du chemin de la musique-->
		  Votre navigateur n'est pas compatible
		</audio>
		
		</br></br>

<!-- affichage ALL musique -->
		<?php
		/*
					$sqlQueryMP3 = 'SELECT * FROM musique';
		            $sqlResultMP3 = mysqli_query($idConn,$sqlQueryMP3);

		            while($sqlRowMP3 = mysqli_fetch_array($sqlResultMP3)){
		            	
		            	print('<a href="mp3.php?idchm='.$sqlRowMP3['mus_id'].' ">'.$sqlRowMP3['mus_titre'].'</a></br></br>');
		            }
	
	*/
		?>

      
      
    </div>
    <div class="col-sm-4 text-left"> 
    	<?php

    		//récupération idd liste lecture avant ajout des musiques
				if( isset($_GET['idll']) ){
					$_SESSION['idll'] = $_GET['idll'];
				}

				//si champs GET pleins ajoute musique à playlist séléctionné
				if(isset($_GET['idchm'] ) AND isset($_GET['idarti']) AND isset($_GET['add']) ){
	        		$idmus = $_GET['idchm'];

	        		//récupérer titre musique
	        		$sqlQueryMtitre = "SELECT mus_titre FROM musique WHERE mus_id = $idmus";
			        $sqlResultMtitre = mysqli_query($idConn,$sqlQueryMtitre);
			        if($sqlResultMrow = mysqli_fetch_array($sqlResultMtitre)){
			        	$titre_mus_add = $sqlResultMrow[0];
			        }
			      if(isset($_SESSION['idll']) ){  
	        		$idll = $_SESSION['idll'];
	        		$sqlQueryMaPlaylist = "INSERT INTO compose(comp_ll,comp_mus) VALUES('$idll','$idmus')";
			        $sqlResultMaPlaylist = mysqli_query($idConn,$sqlQueryMaPlaylist);
			        }
			        else{
			        	print("vous devez créer et/ou séléctionné une liste de lecture");
			        }
        		}	

        		//affiche titre musique  DEL & supression de la msuqiue -
				if(isset($_GET['del']) ){
							$idll = $_SESSION['idll'];
							$comp_mus = $_GET['del'];

							$sqlQueryMusDel = "SELECT mus_titre FROM musique WHERE mus_id = $comp_mus";
							$sqlResultMusDel = mysqli_query($idConn,$sqlQueryMusDel);
														
							if($sqlrowMusDel = mysqli_fetch_array($sqlResultMusDel)){
								print("Vous avez supprimer la musique: ".$sqlrowMusDel['mus_titre']."<br />");
							}

							$sqlQuery = "DELETE FROM compose WHERE comp_mus = $comp_mus AND comp_ll = $idll";
							$sqlResult = mysqli_query($idConn,$sqlQuery);
							
				}

        		//affiche musique de ça playlist séléctionné
    			if(isset($_SESSION['idll']) ){
    				$affmus = $_SESSION['idll']; //ID liste lecture
    				$sqlAffMusiquePlaylist = "SELECT mus_titre,mus_id,comp_mus FROM musique, compose WHERE comp_ll = $affmus AND comp_mus = mus_id";
					$sqlResultAffMusiquePlaylist = mysqli_query($idConn,$sqlAffMusiquePlaylist);

					while($sqlResulttAffMusiquePlaylistROW = mysqli_fetch_array($sqlResultAffMusiquePlaylist)){
	
		        		print('<a href="mp3.php?del='.$sqlResulttAffMusiquePlaylistROW['comp_mus'].'" class="glyphicon glyphicon-minus"></a> <a href="mp3.php?idchm='.$sqlResulttAffMusiquePlaylistROW['mus_id'].'">'.$sqlResulttAffMusiquePlaylistROW['mus_titre'].'</a><br />');
		        	}


    			}



    	?>

    </div>


    <div class="col-sm-2 sidenav">
      <div class="well">
      	<h5>Ma Liste de lecture</h5>
      	<!--formulaire créer liste lecture -->
      		<form method="post" action="mp3.php">
      			<input type="text" name="newplaylist" placeholder="Nouvelle liste de Lecture">
      			<input type="submit" value="+"/>
      		</form>


        <?php 
        		//si reçois GET[dell] -> supression playlist voulue (si possible alerte javascript avant)
        		if(isset($_GET['delll'])){
        			$llid = $_GET['delll'];

        			//donc supprime les musiques de ça playliste/listelecture avant
        			$sqlQueryDel_Musique = "DELETE FROM compose WHERE comp_ll = $llid";
        			$sqlResultDel_Musique = mysqli_query($idConn,$sqlQueryDel_Musique);
        			//supression listelecture/playliste
        			$sqlQueyDel_listelecture = "DELETE FROM listelecture WHERE ll_id = $llid";
        			$sqlResultDel_listelecture = mysqli_query($idConn,$sqlQueyDel_listelecture);
        			print("vous avez supprimez votre liste de lecture <br />");
        		}


        		//Créer nouvelle liste de lecture (sous-entendu créer plusieurs)	
        	if(isset($_POST['newplaylist'])) {

        		$newplaylist=$_POST['newplaylist'];
        		$sqlQuerynewPlay = "INSERT INTO listelecture(ll_titre,ll_uti) VALUES ('$newplaylist','$id_utilisateur_conn')";
		        $sqlResultnewPlay = mysqli_query($idConn,$sqlQuerynewPlay);

        	}
			else{
				$newplaylist="";
			} 

			//affiche playlist utilisateur
			$sqlQueryAffListeLecture = "SELECT ll_titre,ll_id FROM listelecture WHERE ll_uti = $id_utilisateur_conn ";
			$sqlResultAffListeLecture = mysqli_query($idConn,$sqlQueryAffListeLecture);
			while($sqlRowAffListeLecture = mysqli_fetch_array($sqlResultAffListeLecture)){
				print('<a href="mp3.php?delll='.$sqlRowAffListeLecture['ll_id'].'" class="glyphicon glyphicon-minus"></a> <a href="mp3.php?idll='.$sqlRowAffListeLecture['ll_id'].'">'.$sqlRowAffListeLecture['ll_titre'].' </a> </br>');
			}





/*

        	//liste lecture ADD
        	if(isset($_GET['idchm'] ) AND isset($_GET['idarti']) AND isset($_GET['add']) ){
        		$idmus = $_GET['idchm'];

        		//récupérer titre musique
        		$sqlQueryMtitre = "SELECT mus_titre FROM musique WHERE mus_id = $idmus";
		        $sqlResultMtitre = mysqli_query($idConn,$sqlQueryMtitre);
		        if($sqlResultMrow = mysqli_fetch_array($sqlResultMtitre)){
		        	$titre_mus_add = $sqlResultMrow[0];
		        }
        		
        		$sqlQueryMaPlaylist = "INSERT INTO listelecture(ll_titre,ll_uti) VALUES('$titre_mus_add','$id_utilisateur_conn')";
		        $sqlResultMaPlaylist = mysqli_query($idConn,$sqlQueryMaPlaylist);

        		 
        	}	


        		$sqlQueryAfPlaylist = "SELECT * FROM listelecture,musique WHERE ll_uti = $id_utilisateur_conn and ll_titre = mus_titre";
		        $sqlResultAfPlaylist = mysqli_query($idConn,$sqlQueryAfPlaylist);


		        //si utilisateur connecter afficher lecteur mp3 
				if(isset($_SESSION['uti_prenom']) && isset($_SESSION['uti_id']))
				{
					$MaPlaylist ='<ul id="playlist">';
		            while($sqlRowAfPlaylist = mysqli_fetch_array($sqlResultAfPlaylist) ){
		        		$MaPlaylist.=
					        '<li class="active">
					            <a href="mp3.php?del='.$sqlRowAfPlaylist['ll_id'].'" class="glyphicon glyphicon-minus"></a><a href="mp3.php?idchm='.$sqlRowAfPlaylist['mus_id'].'">'.$sqlRowAfPlaylist['ll_titre'].'</a>
					        </li>';  
					}
					echo'</ul>';	
				print($MaPlaylist);
				}

				*/

				




				


			
} //fin du premier IF si utilisateur connecté vois web radio
else{
	echo'<center class="alert alert-danger">connectez vous pour pouvoir profiter de la WEB RADIO</center>';
}       	

        ?>


      </div>
      
    </div>
  </div>
</div>



<footer> <!--pied de page -->

			
		
		</footer> <!--fin de pied de page -->
  
  </body><!--fin du corps du site -->