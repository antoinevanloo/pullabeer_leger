<?php 
	include_once('fonctions.php');
  sessionOpen();
  $idConn=openDB();
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

      
/*
if($idpersonne >0){
 // affichage d'une personne enfonctipon de sont id ?id=NOMBRE (liste.php)
              echo'<center>';

              $sqlQuery = "SELECT * FROM civilite WHERE civ_id ='$civilite'";
              $sqlResult = mysqli_query($idConn,$sqlQuery);
              print('<b> Civilité: </b>');
              while($sqlRow = mysqli_fetch_array($sqlResult) )
              {
                print($sqlRow['civ_lib']);
              }
              echo'</br>';

              print('<b> Nom: </b>');
              print($nom);
              echo'</br>';
              print('<b> Prénom: </b>');
              print($prenom);
              echo'</br>';
              print('<b> Email: </b>');
              print($email);
              echo'</br>';
              print('<b> date de naissance: </b>');
              print($datenaissance);
              echo'</br>';
              print('<b> Adresse l1: </b>');
              print($adrl1);
              echo'</br>';
              print('<b> Adresse l2: </b>');
              print($adrl2);
              echo'</br>';
              print('<b> Code Postal: </b>');
              print($cp);
              echo'</br>';
              print('<b> Ville: </b>');
              print($ville);
              echo'</br>';
              print('<b> Mon Bar: </b>');
              // récuperer bar_pref
              $sqlQuery = "SELECT * FROM bar WHERE bar_id = '$bar' ";
              $sqlResult = mysqli_query($idConn,$sqlQuery);
              $libl_bar="";
              while($sqlRow = mysqli_fetch_array($sqlResult) )
              {
                print($sqlRow['bar_nom'] . ',');
              }
              echo'</br>';
              mysqli_free_result($sqlResult);
              
              echo'</br>';
              echo'</br>';

              echo'<a href="moncompte.php">retour à mon compte</a>';

              echo'</center>';
          

        }//fin du if(si idpersonne >0) */
        //idpersonne == 0 




				//récupérer les champs 
             //récupérer les champs 
              if(isset($_POST['chCivilite']))      $civilite=$_POST['chCivilite'];
              else      $civilite="";

              if(isset($_POST['chNom']))      $nom=$_POST['chNom'];
              else      $nom="";


              if(isset($_POST['chPrenom']))      $prenom=$_POST['chPrenom'];
              else      $prenom="";

              if(isset($_POST['chEmail']))      $email=$_POST['chEmail'];
              else      $email="";

              if(isset($_POST['jour_naissance']))      $jourNaissance=$_POST['jour_naissance'];
              else      $jourNaissance="";

              if(isset($_POST['mois_naissance']))      $moisNaissance=$_POST['mois_naissance'];
              else      $moisNaissance="";

              if(isset($_POST['anne_naissance']))      $anneeNaissance=$_POST['anne_naissance'];
              else      $anneeNaissance="";

              if(isset($_POST['chPassword']))      $password=sha1($_POST['chPassword']);
              else      $password="";

              if(isset($_POST['chRepeatPassword']))      $repeatpassword=sha1($_POST['chRepeatPassword']);
              else      $repeatpassword="";

              if(isset($_POST['chAdresse']))      $adresse=$_POST['chAdresse'];
              else      $adresse="";

              if(isset($_POST['chComplementAdresse']))      $complementadresse=$_POST['chComplementAdresse'];
              else      $complementadresse="";

              if(isset($_POST['chVille']))      $ville=$_POST['chVille'];
              else      $ville="";

              if(isset($_POST['chCP']))      $codepostal=$_POST['chCP'];
              else      $codepostal="";

              if(isset($_POST['chBar']))      $barpref=$_POST['chBar'];
              else      $barpref="";


        //concténation jour,mois,année = date naissance
              $datenaissance = $anneeNaissance.'-'.$moisNaissance.'-'.$jourNaissance;

              // vérifie si les champs sont vides 
              if(empty($nom) OR empty($prenom) OR empty($email) OR empty($jourNaissance) OR empty($moisNaissance) OR empty($anneeNaissance) OR empty($password) OR empty($repeatpassword) OR empty($adresse) OR empty($ville) OR empty($codepostal )) 
                  { 
                  echo '<font color="red"> Attention, seul le champs <b>complément d adresse et Bar préféré</b> peut rester vide !</font>'; 
                  } 

                // Aucun champ n'est vide, on peut enregistrer dans la table
                  // ET vérification mdp identique
              elseif($password == $repeatpassword)
                  { 

                          $idConn = openDB();
                          //on écrit la requete pour savoir si adresse mail déja présent dans BDD
                          $sqladrmail = "SELECT count(*) FROM utilisateur WHERE uti_mail = '$email' ";
                          $sqlresultmail = mysqli_query($idConn,$sqladrmail);
                          $sqlrowmail = mysqli_fetch_array($sqlresultmail);
                            if($sqlrowmail[0] == 0 ){

                                // on écrit la requête sql 
                                $sql = "INSERT INTO utilisateur(uti_nom,uti_prenom,uti_mail,uti_mdp,uti_naiss,uti_adrl1,uti_adrl2,uti_cp,uti_ville,uti_barpref,uti_perm,uti_civ) VALUES('$nom','$prenom','$email','$password','$datenaissance','$adresse','$complementadresse','$codepostal','$ville',$barpref,2,'$civilite')"; 



                                 mysqli_query($idConn,$sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 

                                
                                // on affiche le résultat pour le visiteur 
                                
                                echo' ';
                                echo 'Vos infos on été ajoutées: '; 
                                print($nom); 
                                echo' ';
                                print($prenom);
                                echo'<br/> ';
                              

                               // mysqli_free_result();
                                closeDB($idConn);
                           }
                           else{
                            print('<div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    Entrer une address email valide
                                  </div>');
                           }

                          }

                  else{
                  echo'les deux mots de passe doivent être identiques';
                  }

       
                  



			?>
		<footer> <!--pied de page -->

		</footer> <!--fin de pied de page -->
  
  </body><!--fin du corps du site -->
  
  
</html>