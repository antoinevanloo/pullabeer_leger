<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 20/10/2017
 * Time: 16:48
 */

include_once('fonctions.php');


?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <!-- meta: UTF8 & scale view port bootstrap -->
    <?php linkmeta(); ?>
    

    <!-- Bootstrap core CSS -->
    <?php linkcss(); ?>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!--import JS:  jquery-->
    <?php linkjs(); ?>

    <title>SPOT - Free Bootstrap 3 Theme</title>

    
    



</head>

<body>

<?php menu_principal();  ?>

<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
                <h1>It Doesn't Take a Rocket <b>Scientist</b></h1>
                <h2>It Takes a Designer</h2>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- headerwrap -->


<div class="container w">
    <div class="row centered">
        <br><br>
        <div class="col-lg-4">
            <i class="fa fa-heart"></i>
            <h4>DESIGN</h4>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even believable.</p>
        </div><!-- col-lg-4 -->

        <div class="col-lg-4">
            <i class="fa fa-laptop"></i>
            <h4>BOOTSTRAP</h4>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even believable.</p>
        </div><!-- col-lg-4 -->

        <div class="col-lg-4">
            <i class="fa fa-trophy"></i>
            <h4>SUPPORT</h4>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even believable.</p>
        </div><!-- col-lg-4 -->
    </div><!-- row -->
    <br>
    <br>
</div><!-- container -->


<div id="r">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
                <h4>WE ARE STORYTELLERS. BRANDS ARE OUR SUBJECTS. DESIGN IS OUR VOICE.</h4>
                <p>We believe ideas come from everyone, everywhere. At BlackTie, everyone within our agency walls is a designer in their own right. And there are a few principles we believe—and we believe everyone should believe—about our design craft. These truths drive us, motivate us, and ultimately help us redefine the power of design.</p>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- r wrap -->



<div id="lg">
    <div class="container">
        <div class="row centered">
            <h4>OUR AWESOME CLIENTS</h4>
            <div class="col-lg-2 col-lg-offset-1">
                <img src="assets/img/c01.gif" alt="">
            </div>
            <div class="col-lg-2">
                <img src="assets/img/c02.gif" alt="">
            </div>
            <div class="col-lg-2">
                <img src="assets/img/c03.gif" alt="">
            </div>
            <div class="col-lg-2">
                <img src="assets/img/c04.gif" alt="">
            </div>
            <div class="col-lg-2">
                <img src="assets/img/c05.gif" alt="">
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- dg -->


<!-- FOOTER -->
<div id="f">
    <div class="container">
        <div class="row centered">
            <a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-dribbble"></i></a>

        </div><!-- row -->
    </div><!-- container -->
</div><!-- Footer -->


<!-- MODAL FOR CONTACT -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">contact us</h4>
            </div>
            <div class="modal-body">
                <div class="row centered">
                    <p>We are available 24/7, so don't hesitate to contact us.</p>
                    <p>
                        Somestreet Ave, 987<br/>
                        London, UK.<br/>
                        +44 8948-4343<br/>
                        hi@blacktie.co
                    </p>
                    <div id="mapwrap">
                        <iframe height="300" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.es/maps?t=m&amp;ie=UTF8&amp;ll=52.752693,22.791016&amp;spn=67.34552,156.972656&amp;z=2&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Save & Go</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




</body>
</html>




