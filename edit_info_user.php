<?php 
  include_once('fonctions.php');
  $idConn = openDB();
  $tableau_info_user = infoUser();
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Mon formulaire </title>
	</head>
	<body>
		<header>
		</header>
		<center>
<!--début php -->
<?php 
 
          $idpersonne =  $_GET['id'];


          $sqlQuery = 'SELECT * FROM utilisateur WHERE uti_id='.$idpersonne;
          $sqlResult = mysqli_query($idConn,$sqlQuery);
          while ($sqlRow = mysqli_fetch_array($sqlResult))
          {
            $prenom = $sqlRow['uti_prenom'];
            $nom = $sqlRow['uti_nom'];
            $civilite = $sqlRow['uti_civ'];
            $ville = $sqlRow['uti_ville'];
            $email = $sqlRow['uti_mail'];
            $datenaissance = $sqlRow['uti_naiss'];
            $password = $sqlRow['uti_mdp'];
            $adressel1 = $sqlRow['uti_adrl1'];
            $adressel2 = $sqlRow['uti_adrl2'];
            $codepostal = $sqlRow['uti_cp'];
            $ville = $sqlRow['uti_ville'];
            $barprefid = $sqlRow['uti_barpref'];
          }
          
          mysqli_free_result($sqlResult);



              // initialisation variable et recuperation jour,mois,année d'une date
              $date_divise = explode("-", $datenaissance);
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


			echo'<form method="post" action="gedit_info_user.php?id='.$idpersonne.'">
            Civilité:';
              
            /*
              $sqlQuery = "SELECT * FROM civilite WHERE civ_id ='$civilite'";
              $sqlResult = mysqli_query($idConn,$sqlQuery);
              $script = '<SELECT name="Civilite" >';
              while($sqlRow = mysqli_fetch_array($sqlResult) )
              {
                $script.='<OPTION VALUE="'.$sqlRow['civ_id'].'">'.$sqlRow['civ_lib'].'</OPTION>';
                $sqlQuery = "SELECT * FROM civilite WHERE civ_id !='$civilite'";
                $sqlResult = mysqli_query($idConn,$sqlQuery);

                while($sqlRow = mysqli_fetch_array($sqlResult))
                {
                  $script.='<OPTION VALUE="'.$sqlRow['civ_id'].'">'.$sqlRow['civ_lib'].'</OPTION>';
                  
                }
              } 


              $script.= '</SELECT> </br>';
              print($script);

              mysqli_free_result($sqlResult);
*/


               $sqlAllCivilite = "SELECT * FROM civilite";
              $sqlResultAllCivilite = mysqli_query($idConn,$sqlAllCivilite);

              
              $script='<SELECT name="Civilite" >';
              $sqlMaCivilite = "SELECT uti_civ FROM utilisateur WHERE uti_id = $idpersonne";
              $sqlResultMaCivilite = mysqli_query($idConn,$sqlMaCivilite);
              $sqlRowMaCivilite = mysqli_fetch_array($sqlResultMaCivilite);

              while($sqlRowAllCivilite = mysqli_fetch_array($sqlResultAllCivilite) ){
                $selected = '';
                if ($sqlRowMaCivilite['uti_civ'] == $sqlRowAllCivilite['civ_id'] ) {
                  $selected = 'selected="selected" ';
                }
                  $script.='<OPTION VALUE="'.$sqlRowAllCivilite['civ_id'].'"   '.$selected.'>'.$sqlRowAllCivilite['civ_lib'].'</OPTION>';

              }
              print($script);
              print('</SELECT> </br>');
              mysqli_free_result($sqlResultAllCivilite);
              mysqli_free_result($sqlResultMaCivilite);


           
              echo'Nom: <input type="text" name="Nom"  value="'.$nom.'" /> </br>
              Prénom : <input type="text" name="Prenom" value="'.$prenom.'"/> </br>
              Email : <input type="text" name="Email" value="'.$email.'"  /> </br>
              Date: ';

          echo'<SELECT name="Jour" > ';
              //echo'<option value="'.$jour.'"> '. $jour .'</option>';
             
                  for ($i = 1 ; $i <= 31 ; $i++)
                   {
                      $selec='';
                      if($i == $jour)
                      {
                        $selec = 'selected="selected" ';
                      }
                    echo '<option '.$selec.' value="' . $i . '">' . $i . '</option>';
                    }   

              echo'</SELECT>
                   <SELECT name="Mois"" > ';

             //déclaration tableau mois 
                   $tableau_mois_fr = Array (1=> 'Janvier','Février','Mars','Avril','Mai','Juin','juillet','Aout','Septembre','Octobre','Novembre','Décembre');


              //echo'<option value="'.$mois_split.'"> '. $tableau_mois_fr[$mois_split] .'</option>';
                 
                  for ($i = 1 ; $i <=12; $i++)
                  {
                    $sel='';
                    if($i == $mois_split)
                    {
                      $sel = 'selected="selected" ';
                    }
                    echo '<option '.$sel.' value="'.$i.'">' .$tableau_mois_fr[$i] . '</option>';
                  }

              echo '</SELECT> 
                    <SELECT name="Annee" > ';
                  
                  //echo '<option value="'.$annee.'">' .$annee. '</option>';
                  for ($i = date('Y') ; $i >= 1900; $i--)
                  {
                      $sele='';
                      if($i == $annee)
                      {
                        $sele = 'selected="selected" ';
                      }
                    echo '<option '.$sele.' value="'.$i.'">' .$i. '</option>';
                  }
               
                  echo '
              </SELECT>   
                </br>';
          
        
          echo'mot de passe: <input type="password" value="'.$password.'" name="chPassword" placeholder="Mot de passe"> </br>';
              echo'répéter mot de passe: <input type="password"  value="'.$password.'" name="chRepeatPassword" placeholder="Mot de passe"> </br>';
            echo'adresse: <input type="text" value="'.$adressel1.'" name="chAdresse" placeholder="adresse"  /> </br>';
            echo'complément adresse: <input type="text" value="'.$adressel2.'" name="chComplementAdresse" placeholder="complément adresse"  /> </br>';
            echo'ville: <input type="text" value="'.$ville.'" name="chVille" placeholder="ville"  /> </br>';
            echo'code postal: <input type="text" value="'.$codepostal.'" name="chCP" placeholder="code postal"   /> </br>';

            $sqlQuery = "SELECT * FROM bar WHERE bar_id = $barprefid";
                $sqlResult = mysqli_query($idConn,$sqlQuery);
                if($sqlRow = mysqli_fetch_array($sqlResult))
                $script = 'Bar Préféré: <SELECT name="chBar" placeholder="Bar Préféré">
                <option value="'.$barprefid.'">'.$sqlRow['bar_nom'].'</option>';
                while($sqlRow = mysqli_fetch_array($sqlResult) )
                {
                $script.='<OPTION VALUE="'.$sqlRow['bar_id'].'">'.$sqlRow['bar_nom'].'</OPTION>';
                } 
                $script.= '</SELECT> </br>';
                print($script);
                mysqli_free_result($sqlResult);

                echo'permission: ';
                $sqlQueryPermission = "SELECT * FROM permission";
                $sqlResultPermission = mysqli_query($idConn,$sqlQueryPermission);

                $sqlQueryMaPermission = "SELECT uti_perm FROM utilisateur WHERE uti_id = $idpersonne";
                $sqlResultMaPermission = mysqli_query($idConn,$sqlQueryMaPermission);
                $sqlRowMaPermission = mysqli_fetch_array($sqlResultMaPermission); 

                $permission = '<SELECT name="chPermission">';
                while($sqlRowPermission = mysqli_fetch_array($sqlResultPermission) ){
                  $selected = '';
                  if($sqlRowMaPermission['uti_perm'] == $sqlRowPermission['perm_id'] ){
                    $selected = 'selected="selected" ';

                  }
                  $permission.='<OPTION VALUE="'.$sqlRowPermission['perm_id'].'"  '.$selected.' >'.$sqlRowPermission['perm_lib'].'</OPTION>';
                }
                
                print($permission);
                echo"</SELECT> <br />";


        
       

       
        
           echo' <input type="submit" value="Envoyer"/>
          <input type="reset" value="Annuler"/>



      </form>';

      
           ?> <!--fin php-->

           <br />
           <a href="moncompte.php">Retour à Mon Compte</a>
			
		</center>
	</body>
	<?php closeDB($idConn); ?> 
	<footer>
		<div id="pied_page">
		</div>
		
	</footer>
</html>