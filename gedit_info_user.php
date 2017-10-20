<?php  
  include_once('fonctions.php');
  $idConn = openDB();
  sessionOpen();

  //on récupérer info user BDD
      $tableau_info_user = infoUser();
      $uti_perm = $tableau_info_user['uti_perm']; //id permission ADMIN MEMBRE VISITEUR

//récupréer ID personne méthode get
      if(isset($_GET['id'])){
      $idpersonne =  $_GET['id'];
      }
if(isset($_SESSION['uti_id']) and $uti_perm > 2){

    if(isset($_POST['Civilite'], $_POST['Nom'],$_POST['Prenom'],$_POST['Email'],$_POST['Jour'],$_POST['Mois'],$_POST['Annee'],$_POST['chPassword'],$_POST['chRepeatPassword'],$_POST['chAdresse'],$_POST['chComplementAdresse'],$_POST['chVille'],$_POST['chCP'],$_POST['chBar']) )
              {
                if(isset($_POST['Civilite']))      $Civilite=$_POST['Civilite'];
                  else      $Civilite="";
                  if(isset($_POST['Nom']))      $Nom=$_POST['Nom'];
                  else      $Nom="";
                  if(isset($_POST['Prenom']))      $Prenom=$_POST['Prenom'];
                  else      $Prenom="";
                  if(isset($_POST['Email']))      $Email=$_POST['Email'];
                  else      $Email="";
                  if(isset($_POST['Jour']))      $Jour=$_POST['Jour'];
                  else      $Jour="";
                  if(isset($_POST['Mois']))      $Mois=$_POST['Mois'];
                  else      $Mois="";
                  if(isset($_POST['Annee']))      $Annee=$_POST['Annee'];
                  else      $Annee="";
                  if(isset($_POST['chPassword']))      $Password=sha1($_POST['chPassword']);
                  else      $Password="";
                  if(isset($_POST['chRepeatPassword']))      $ReapeatPassword=sha1($_POST['chRepeatPassword']);
                  else      $ReapeatPassword="";
                  if(isset($_POST['chAdresse']))      $Adresse=$_POST['chAdresse'];
                  else      $Adresse="";
                  if(isset($_POST['chComplementAdresse']))      $ComplementAdresse=$_POST['chComplementAdresse'];
                  else      $ComplementAdresse="";
                  if(isset($_POST['chVille']))      $Ville=$_POST['chVille'];
                  else      $Ville="";
                  if(isset($_POST['chCP']))      $CodePostal=$_POST['chCP'];
                  else      $CodePostal="";
                  if(isset($_POST['chBar']))      $Bar=$_POST['chBar'];
                  else      $Bar="";
                  if(isset($_POST['chPermission']))      $Permission=$_POST['chPermission'];
                  else      $Permission="";


                  if($Password == $ReapeatPassword){

                           //concténation jour,mois,année = date naissance
    		              $Date = $Annee.'-'.$Mois.'-'.$Jour;

    		            $sql_modification = "UPDATE utilisateur SET uti_nom='$Nom', uti_prenom='$Prenom',uti_mail='$Email',uti_naiss='$Date',uti_adrl1='$Adresse',uti_adrl2='$ComplementAdresse',uti_ville='$Ville',uti_cp='$CodePostal',uti_barpref='$Bar',uti_mdp='$Password',uti_civ='$Civilite',uti_perm='$Permission' WHERE uti_id='$idpersonne' ";
    		           mysqli_query($idConn,$sql_modification) or die('Erreur SQL !'.$sql_modification.'<br>'.mysql_error()); 

                   echo"vous venez de de modifier l'utilisateur $idpersonne : $Nom $Prenom";
                   echo'</br> <a href="moncompte.php" > Go Back </a>';

               }
    }
}

?>
