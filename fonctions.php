<?php
//si une session est en cours indoque à l'utilisateur qu'il est connecté (sur toutes les pages)
function sessionOpen()
{
  session_start();
  if (isset($_SESSION['uti_prenom']) && isset($_SESSION['uti_id']) )
    {

     print('Bonjour ' . $_SESSION['uti_prenom'] . ' '.$_SESSION['uti_id'] .'</br>');
     return $_SESSION['uti_id'];
    }
}

//focntion récuprer information BDD utilisateur conecté 
function infoUser(){
  $idConn = openDB();
  if(isset($_SESSION['uti_id']) ){
  $id_utilisateur = $_SESSION['uti_id'];
      // Vérification des identifiants
            $sqlQuery = "SELECT * FROM utilisateur,permission WHERE uti_id = '$id_utilisateur' AND uti_perm=perm_id";
            $sqlResult = mysqli_query($idConn,$sqlQuery);
            while ($sqlRow = mysqli_fetch_array($sqlResult))
              {   
                closeDB($idConn);
                return $sqlRow;
                    
              }
    }
}


// css/styles.css & bootstrap/css/bootstrap.css
function linkcss(){
	$css = '<link rel="stylesheet" href="css/styles.css"/>';
	$bootstrap = '<link href="bootstrap/css/bootstrap.css" rel="stylesheet">';
	print($css.$bootstrap);
}

//meta utf8 & scale view port pour bootstrap
function linkmeta(){
	$utf8='<meta charset="utf8" />';
	$scale ='<meta name="viewport" content="width=device-width, initial-scale=1.0">';
	print($utf8.$scale);
}

// js & jquery  & js bootstrap

function linkjs(){
	$jquery = '<script type="text/javascript" src="js/jquery-3.1.1.min.js"> </script>';
	$js_boostrap = '<script type="text/javascript" src="bootstrap/js/bootstrap.js"> </script>';
	print($jquery.$js_boostrap);
}

function menu_principal(){
  $row = infoUser();
	$menu_index = '<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="index.php">Accueil</a></li>
      	<li><a href="evenement.php">Evenements</a></li>
      	<li><a href="mp3.php">Web Radio</a></li>
      	<li><a href="contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right ">';
      if(isset($_SESSION['uti_id']) ){
        
        $menu_index.= '<li><a href="moncompte.php"><span class="glyphicon glyphicon-user"></span>Mon Compte</a></li>
        <li><a href="deconnexion.php?id=0"><span class="glyphicon glyphicon-log-out"></span>Déconnexion</a></li>';
      }
      else{
        $menu_index.='<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Inscription</a></li>
      <li><a href="login.php"><span class="dropdown dropdown-toggle  glyphicon glyphicon-log-in"></span>Se Connecter</a></li>';
        
      }
    $menu_index.='</ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>';
print($menu_index);
}



function session(){
	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
	{
		echo 'Bonjour ' . $_SESSION['pseudo'];
	}
}

	
	
	
function carousel_principal(){
  $idConn = openDB();
    $listeChemin = array ();
    $SQLeveAff = "SELECT even_id FROM evenement";
    $SQLresult = mysqli_query($idConn,$SQLeveAff);
    while($SQLRow = mysqli_fetch_array($SQLresult)){
      $cheminid = $SQLRow['even_id'];
      $listeChemin[] = $cheminid;
     }

    $sqlQueryEvenChm1 = "SELECT even_chemin FROM evenement WHERE even_id = '$listeChemin[0]'";
    $sqlResultEvenChm1 = mysqli_query($idConn,$sqlQueryEvenChm1);
    while($sqlRowEvenChm1 = mysqli_fetch_array($sqlResultEvenChm1) ){
      $chemin1 = $sqlRowEvenChm1['even_chemin'];
      }

    $sqlQueryEvenChm2 = "SELECT even_chemin FROM evenement WHERE even_id = '$listeChemin[1]'";
    $sqlResultEvenChm2 = mysqli_query($idConn,$sqlQueryEvenChm2);
    while($sqlRowEvenChm2 = mysqli_fetch_array($sqlResultEvenChm2) ){
      $chemin2 = $sqlRowEvenChm2['even_chemin'];
      }
    $sqlQueryEvenChm3 = "SELECT even_chemin FROM evenement WHERE even_id = '$listeChemin[2]'";
    $sqlResultEvenChm3 = mysqli_query($idConn,$sqlQueryEvenChm3);
    while($sqlRowEvenChm3 = mysqli_fetch_array($sqlResultEvenChm3) ){
      $chemin3 = $sqlRowEvenChm3['even_chemin'];
      }
    $cheminEven = array ($chemin1,$chemin2,$chemin3);
    return $cheminEven;
  }	





//FOCNTION de connexion Base de donnée
function openDB(){
  $server = 'localhost'; // ou 127.0.0.1 
  $user = 'root';     //Nom utilisateur connexion BDD
  $nomDataBase = 'pullabeer'; // nom de la base
  $pass = '';

  //ouverture de connexion
  $idConn = mysqli_connect($server,$user,$pass);
  //selection de la base de données
  mysqli_select_db($idConn,$nomDataBase);

  return $idConn;
}

//Fonction Déconnexion de la base de données
function closeDB($idConn){
  mysqli_close($idConn) ;
}



function footer_principal(){
  $footer = '<footer style="background-color: grey; height: 50px; position: fixed;">
                      <div class="mdl-mini-footer__left-section">
                        <ul class="mdl-mini-footer__link-list">
                            <li><a style="color: white;">PullABeer</a></li>
                            <li><a href="contact.php">Contactez-nous!</a></li>
                        </ul>
                      </div>
               </footer>';

    print($footer);
}



?>