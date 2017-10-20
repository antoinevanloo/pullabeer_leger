<?php 

	include_once('fonctions.php');


				// Partie connexion
                    $idConn = openDB();
                    
					// Hachage du mot de passe saisie
						//récupération adresse mail saisie 
					if(isset($_POST['mail']))      $connexion_mail = $_POST['mail'];
              		else      $connexion_mail="";

	              	if(isset($_POST['password']))      $pass_hache = sha1($_POST['password']);
	              	else      $pass_hache="";



						// Vérification des identifiants
						$sqlQuery = "SELECT uti_mail,uti_mdp,uti_prenom,uti_id FROM utilisateur WHERE uti_mail = '$connexion_mail' AND uti_mdp = '$pass_hache'";
						$sqlResult = mysqli_query($idConn,$sqlQuery);
						while ($sqlRow = mysqli_fetch_array($sqlResult))
							{		
					            $uti_mail = $sqlRow['uti_mail'];
					            $uti_mdp = $sqlRow['uti_mdp'];
					            $prenom = $sqlRow['uti_prenom'];
					            $uti_id = $sqlRow['uti_id'];
					         }

						mysqli_free_result($sqlResult);
						closeDB($idConn);

						if( empty($uti_mdp) ){
							$uti_mdp="";
						}
						if ($uti_mdp != $pass_hache)
						{
							// Le visiteur nest reconnu comme membre . On use javascript lui signalant ce fait
							echo '<body onLoad="alert(\'Membre non reconnu...\')">';
						    echo 'Mauvais identifiant ou mot de passe !';
						    // puis on le redirige vers la page d'accueil
							echo '<meta http-equiv="refresh" content="0;URL=index.php">';
						}
						else
						{
						    session_start();
						    $_SESSION['uti_mail'] = $uti_mail;
						    $_SESSION['uti_prenom'] = $prenom;
						    $_SESSION['uti_id'] = $uti_id;
						    
						    echo 'Vous êtes connecté ! ';
							print($prenom.'</br>');
							print('<a href="deconnexion.php?id=0">déconnexion</a>');
						    print('</br>');
							print('<a href="index.php">Retour</a>');
						}

?>