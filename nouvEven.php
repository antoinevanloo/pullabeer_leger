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

 <!-- icon site -->
 <link rel="shortcut icon" href="img/ico.png">

 <!-- Nom du site -->
 <title>PullABeer</title>

</head>

    <body>
      <header> <!-- tête du corps -->

        <div class="container">
          <?php menu_principal(1);  ?>
        </div> <!--/container -->

      </header> <!-- fin de tête du corps -->
        <?php
        $tableau_info_user = infoUser();
        $uti_perm = $tableau_info_user['uti_perm']; 
if($uti_perm > 2){ 
        $id=isset($_GET['id'])?$_GET['id']:0;
        if($id!=0){
            $SQLQuery= "DELETE FROM evenement WHERE even_id = $id";
            $resultat= mysqli_query($idConn,$SQLQuery);
            }

        $even_nom = '';
        $even_chmImg = '';
        $even_adl1 = '';
        $even_adl2 = '';
        $even_cp = '';
        $even_ville = '';
    		$even_code ='';
        $even_comm ='';
        ?>
        <form name="nouvEvenement" method="post" action="evenement.php?id= $id_eve">
          Entrez le nom de l'évenement:<input type="text"  name="even_nom" value=<?php print($even_nom) ?>></br>
   			  Entrez le chemin de l'image:<input type="text" name="even_chemin" value=<?php print($even_chmImg) ?> ></br>
          Entrez l'adresse (ligne 1):<input type="text" name="even_adrl1" value=<?php print($even_adl1) ?>></br>
          Entrez l'adresse (ligne 2):<input type="text" name="even_adrl2" value=<?php print($even_adl2) ?>></br>
   			  Entrez le code postale:<input type="text" name="even_cp" value=<?php print($even_cp) ?>></br>
          Entrez la ville:<input type="text" name="even_ville" value=<?php print($even_ville) ?>></br>
          Ecrire un commentaire:<br /><textarea type="text" cols="30" rows="8" name="even_comm" value=<?php print($even_comm) ?> > </textarea> </br>
			     <input type="submit" value="Envoyer">
			     <input type="reset"  value="Annuler"/>
		    </form>
        <?php
        $script="<table id='tb1'>";
        $script.= "
          <thead>
            <th> Nom de l'évenement </th>
            <th> ID </th>
            <th> Suppression </th>
          </thead>";
        $SQLQuery='SELECT * FROM evenement';
        $SQLResult=mysqli_query($idConn,$SQLQuery);
        while($SQLRow=mysqli_fetch_array($SQLResult)){
        $script.='<tr>';
        $script.='<td> '.$SQLRow['even_nom']. ' </td>';
        $script.='<td> '.$SQLRow['even_id']. ' </td>';
        $script.='<td><a href="nouvEven.php?id='.$SQLRow['even_id'].'">Delete</a></td>';
        $script.='</tr>';
        }
        $script.='</table>';
        print($script);
        mysqli_free_result($SQLResult);
}      
        ?>

    </body>
</html>
