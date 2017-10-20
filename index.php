<?php 
	include_once('fonctions.php');
	$cheminEven_image = carousel_principal();
	sessionOpen();
?>

<!DOCTYPE html>
<html>

  <head>
	<!-- FAVICON -->
	<link rel="icon" href="favicon.ico" />
	
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
   <!-- Nom du site -->
   <title>PullABeer</title>
  </head>
  
  <body style="background:url('http://le-cartel.fr/heberg/background_login.jpg') center; ">  <!-- corps du site -->
	
		<header> <!-- tête du corps -->

			<div class="container">
				<?php menu_principal(1);  ?>	
			</div> <!--/container -->

		</header> <!-- fin de tête du corps -->
	  
		  	<div class="container">
				<!-- YOUR CONTENT GOES HERE -->
				<!--<div class="row">-->
						<div class="col-lg-12">
							<!--Carousel-->
							<div class="demo-card-square mdl-card mdl-shadow--2dp card-2" style="height:290px;">
							<div id="carousel_slide" class="carousel slide" data-ride="carousel" data-interval="3000">
									<!-- Indicators -->
									<ol class="carousel-indicators">
										<li data-target="#carousel_slide" data-slide-to="0" class="active"></li>
										<li data-target="#carousel_slide" data-slide-to="1"></li>
										<li data-target="#carousel_slide" data-slide-to="2"></li>
									</ol>

									<!-- Wrapper for slides -->
									<div class="carousel-inner">
											<div class="item active">
												<a href="evenement.php"> <img src="<?php echo $cheminEven_image[0]; ?>"></a><!--1200x315-->
											</div>
											<div class="item">
												<a href="evenement.php"> <img src="<?php echo $cheminEven_image[1]; ?>"></a><!--1200x315-->
											</div>
											<div class="item">
												<a href="evenement.php"> <img src="<?php echo $cheminEven_image[2]; ?>"></a><!--1200x315-->
											</div>
										</div>

									<!-- Controls -->
									<a class="left carousel-control" href="#carousel_slide" role="button" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left"></span>
									</a>
									<a class="right carousel-control" href="#carousel_slide" role="button" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right"></span>
									</a>
							</div>
							</div><!-- Fin Carousel -->
						</div>
				<!--</div>-->
				<!--<div class="row">-->
					<div class="col-lg-12">
						<div class="demo-card-square mdl-card mdl-shadow--2dp card-2">
							<div class="mdl-card__title mdl-card--expand">
								<h2 class="mdl-card__title-text">Noël</h2>
							</div>

							<div class="mdl-card__supporting-text">
								Le premier évènement de la firme PullABeer fût le réveillon de Noël de l'année 2016. Ce fût une grande première pour nous de partager cette fête de fin d'année avec nos plus fidèles clients dans un environnement qui leur est cher.
                                Vous qui avez été si nombreux, nous vous remercions de votre présence. Ce fût un honneur pour nous et nous espérons réitérer cette fête ainsi que de créer de nouveaux évènements tout au long de l'année.
							</div>

							<div class="mdl-card__actions mdl-card--border">
								<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="evenement.php">
									Voir plus
								</a>
							</div>
						</div> 
					</div>
				<!-- END OF YOUR CONTENT -->
				<!--</div>-->
		  </div>
  </body><!--fin du corps du site -->	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$('.carousel').carousel
		({
			interval: 3000
		})
	</script>
	<!--</script>-->
	

</html>

