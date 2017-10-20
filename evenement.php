<?php
	include_once('fonctions.php');
	$idConn=openDB();
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
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.orange-indigo.min.css" />
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- FAVICON -->
	<link rel="icon" href="favicon.ico" />

  	</head>

  	<body style="background:url('http://le-cartel.fr/heberg/background_login.jpg') center;"> 

			<div class="container">
				<?php menu_principal(2);  ?>
			</div> <!--/container -->
			<div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
			<?php
			if(!empty($_POST['even_nom']) AND !empty($_POST['even_chemin']) AND !empty($_POST['even_adrl1']) AND !empty($_POST['even_comm']) AND !empty($_POST['even_cp']) AND !empty($_POST['even_ville'])) {
				$even_nom= $_POST['even_nom'];
				$even_chmImg=$_POST['even_chemin'];
				$even_adl1=$_POST['even_adrl1'];
				$even_adl2=$_POST['even_adrl2'];
				$even_cp=$_POST['even_cp'];
				$even_ville=$_POST['even_ville'];
				$even_comm=$_POST['even_comm'];
				$SQLQuery="INSERT INTO evenement(even_nom,even_chemin,even_adrl1,even_adrl2,even_cp,even_ville,even_comm) VALUES('$even_nom','$even_chmImg','$even_adl1','$even_adl2','$even_cp','$even_ville','$even_comm')";
				mysqli_query($idConn,$SQLQuery);

				
				
				//affiche evenement qui vient de saisir SANS PRESE
				$SQLQuery='SELECT * FROM evenement';
				$SQLResult=mysqli_query($idConn,$SQLQuery);
				$card='';
				while($SQLRow=mysqli_fetch_array($SQLResult)){
					
						print($SQLRow['even_nom'].'<br/>	  '.$SQLRow['even_comm']);
					print($card);
					
				}
				
			
				
				/*$SQLQuery='SELECT * FROM evenement';
				$SQLResult=mysqli_query($idConn,$SQLQuery);
				while($SQLRow=mysqli_fetch_array($SQLResult)){
					card_even();

				}*/
			}

			else{
				
				//affiche ALL event dans card
				$SQLeveAff = "SELECT * FROM evenement";
				$SQLresult = mysqli_query($idConn,$SQLeveAff);
				$card='';
				print('<div class="container" ');
				print('<div class="row">');
				print('<center>');
				while($SQLRow = mysqli_fetch_array($SQLresult)){
						/*$card.='<div ><img class="demo-card-square mdl-card mdl-shadow--2dp card-2" style="width: 750px;z-index:0" src="'.$SQLRow['even_chemin'].'" />
							<div style="position:absolute;z-index:0"></div>
							<div class="mdl-card__title mdl-card--expand">

								<h2 style="z-index:1; class="mdl-card__title-text">'.$SQLRow['even_nom'].'</h2>
							</div>

							<div style="z-index:1; class="mdl-card__supporting-text">
								'.$SQLRow['even_comm'].'
							</div>
						</div>'; */

						$card.='<div class="well" style="width:750px;height:500px;">
          <h4><img style="width:700px;" src="'.$SQLRow['even_chemin'].'" /></h4>
          <h2 style="z-index:1;"" class="mdl-card__title-text">'.$SQLRow['even_nom'].'</h2>

          <div style="z-index:1; class="mdl-card__supporting-text">
								'.$SQLRow['even_comm'].'
							</div>
        </div>';
					
					
					
				
					
				}
				print($card);
				print('</center>');
				print('</div>');
				print('</div>');
			}
			?>


		<?php
		closeDB($idConn);
		?>
		</div>
		

	</body>
	
</html>
