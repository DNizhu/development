<?php

	session_start();

	include('mydbconnect.php');





	    // if username and password were saved in cookie, check them
	    if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"]))
	    {
				ECHO "helllo2";
/*	echo $_COOKIE["user"];
	        // if username and password are valid, log user back in
	        // prepare SQL
	        $sql = sprintf("SELECT 1 as res FROM administration WHERE username='%s' AND password='%s'",
	                       mysqli_real_escape_string($conn, $_COOKIE["user"]),
	                       mysqli_real_escape_string($conn, $_COOKIE["pass"]));
	        // execute query
	        $result = mysqli_query($conn,$sql);

		    if ($result === false)
	            die("Could not query database");

	        // check whether we found a row
	        if (mysqli_num_rows($result) == 1)
	        {
	            // remember that user's logged in
	            $_SESSION["authenticated"] = true;

	            // re-save username and, ack, password in cookies for another week
	            setcookie("user", $_COOKIE["user"], time() + 7 * 24 * 60 * 60);
	            setcookie("pass", $_COOKIE["pass"], time() + 7 * 24 * 60 * 60);

	            // redirect user to home page, using absolute path, per
	            // http://us2.php.net/manual/en/function.header.php
	            $host = $_SERVER["HTTP_HOST"];
	            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
	            header("Location:https://www.facebook.com/");
	            exit;
	        }*/
	    }
	      // else if username and password were submitted, grab them instead
	    if (isset($_POST["user"]) && isset($_POST["pass"]))
	    {

				ECHO "helllo";
			//echo "HEEEEEEEELLLLLLLLLOO" + $_COOKIE["user"]+$_POST["user"];
	        // prepare SQL
	        $sql = sprintf("SELECT 1 as res FROM members WHERE company='%s' AND pin='%s'",
	                       mysqli_real_escape_string($conn, $_POST["user"]),
	                       mysqli_real_escape_string($conn, $_POST["pass"]));
	        // execute query
	        $result = mysqli_query($conn,$sql);

		    if ($result === false)
	            die("Could not query database");

								echo "HELLO@@#@#"+mysqli_num_rows($result);

	        // check whether we found a row
	        if (mysqli_num_rows($result) == 1)
	        {
						echo "HELLO@@#@#";
	            // remember that user's logged in
	            $_SESSION["authenticated"] = true;
							$_SESSION["username"] = $_POST["user"];


				// save username in cookie for a week
	            setcookie("user", $_POST["user"], time() + 7 * 24 * 60 * 60);

	            // save password in, ack, cookie for a week if requested
	            if ($_POST["keep"])
	                setcookie("pass", $_POST["pass"], time() + 7 * 24 * 60 * 60);

	            // redirect user to home page, using absolute path, per
	            // http://us2.php.net/manual/en/function.header.php
	            $host = $_SERVER["HTTP_HOST"];
	            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
	            header("Location: http://$host$path/admin/index.php");
	            exit;

	        }
	    }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Of10</title>
	<meta name="author" content="Blitzschlag Team" />
	<meta name="description" content="Blitzschlag is the annual cultural and technical fest of Malaviya National Institute of Technology,Jaipur. To be held from 24-26th feb 2017." />
	<meta name="keywords"  content="Blitzschlag,Blitzschlag 2017,Blitzschlag mnit ,Blitzschlag mnit 2017,mnit fest 2017,mnit fest,Blitzschlag'17"/>
    <meta name="keywords"  content="Blitzschlag,Blitzschlag 2017,Blitzschlag'17,MNIT Jaipur,rajasthan,college fest,Blitzschlag fest,MNIT fest"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/blitz logo.png"/>

    <!-- CSS
    ================================================== -->
    <!-- Bootstrap css file-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Superslide css file-->
    <link rel="stylesheet" href="css/superslides.css">
    <!-- Slick slider css file -->
    <link href="css/slick.css" rel="stylesheet">
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Elastic grid css file -->
    <link rel="stylesheet" href="css/elastic_grid.css">
    <!-- Default Theme css file -->
    <link id="orginal" href="css/themes/yellow-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="style.css" rel="stylesheet">
<link rel="stylesheet" href="css/navstyle.css">

	<link rel="stylesheet" type="text/css" href="BCM/css/normalize.css" />
		<!--<link rel="stylesheet" type="text/css" href="BCM/css/demo.css" />-->
		<link rel="stylesheet" type="text/css" href="BCM/css/component.css" />
		<link rel="stylesheet" type="text/css" href="BCM/css/content.css" />
		<script src="BCM/js/modernizr.custom.js"></script>

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
  body {
    padding-top: 0%;
	}

#box2 {

    border: 1px solid skyblue;
    margin: 0 auto;
    text-align: center;

}
</style>
  <body>

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


      <!-- END MENU -->



 <div align="center" class="container">
			<!-- Top Navigation -->

			<section>
				<br><br><br><br><br><br><p style="font-size:25px;">Welcome to  <strong>Of10</strong>!</p>

				<br><br><br><br><br>

					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button style="color:white; background:black;" type="button">Member Login</button>
						<div class="morph-content" style="overflow-y: auto;">
							<div>
								<div class="content-style-form content-style-form-1">
									<span class="icon icon-close">Close the dialog</span>
									<h2>Welcome!</h2>
									<form action="index.php"  method="post" id="f1">
										<p><label>Company Name</label><input type="text" name="user" required=""/></p>

										<p><label>Pin</label><input type="password" name="pass" maxlength="4"  required=""/></p>

										<div style="width:100%; background:black; color:white"><p>
											<input style="background:black; color:white; border-color: #000000;   padding: 5px 5px 5px 150px;text-align: center;" id="submit2" type="submit" name="Register" class="btn btn-primary"></p>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div><!-- morph-button -->
					<strong class="joiner"></strong>
					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button type="button" style="color:white; background:black;">Accommodation</button>
						<div class="morph-content" style="overflow-y: auto;">
							<div>
								<div class="content-style-form content-style-form-2">
									<span class="icon icon-close">Close the dialog</span>
									 <br>
									<p style="margin-left:30px;color:black;"> Accomodation Charges*:
									<br> 1 day - 600 INR
									<br> 2 days - 700 INR
									<br> 3 days - 800 INR
									<br><i style="color:black;">*accomodation charges is inclusive of registration fess, pronite fess and stay at the hostels.</i>
									<form action="index.php" method="post">
										<p><label>Blitz ID: </label><input type="text" name="blitz" required=""/></p>
											<p><label>Email</label><input type="text" name="emailc" required=""/></p>
										<p><label>Contact</label><input type="text" name="phonec" maxlength="10" pattern="\d{10}" required=""/></p>
										<p><label>No of Days: </label>
											<select style="height:30px;width:90px;text-align:center;" name="days">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select>
										</p><br>
										<div style="width:100%; background:black; color:white"><p>
											<input style="background:black; color:white; border-color: #000000;   padding: 5px 5px 5px 150px;text-align: center;" id="submit2" type="submit" name="Register" class="btn btn-primary"></p>
									</div></form>

								</div>
							</div>
						</div>
					</div><!-- morph-button -->


			</section>


		</div><!-- /container -->


		<script src="BCM/js/classie.js"></script>
		<script src="BCM/js/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				// for demo purposes only
				[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) {
					bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
				} );
			})();
		</script>
</section>

<section>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br>
</section>

     <!--=========== BEGAIN FOOTER ================-->
     <footer id="footer">
       <div class="container">
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_left">
               <p>Copyright &copy; 2017 <a target="_blank" href="http://www.blitzschlag.org">Blitzschlag</a>. All Rights Reserved</p>
             </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_right">
               <ul class="social_nav">
                 <li><a href="https://www.facebook.com/blitzschlagMNIT/"><i class="fa fa-facebook"></i></a></li>
             </div>
           </div>
         </div>
       </div>
      </footer>
      <!--=========== END FOOTER ================-->

     <!-- Javascript Files
     ================================================== -->

     <!-- initialize jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Google map -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/jquery.ui.map.js"></script>
     <!-- For smooth animatin  -->
    <script src="js/wow.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- superslides slider -->
    <script src="js/jquery.superslides.min.js" type="text/javascript"></script>
    <!-- slick slider -->
    <script src="js/slick.min.js"></script>
    <!-- for circle counter -->
    <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
    <!-- for portfolio filter gallery -->
    <script src="js/modernizr.custom.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/elastic_grid.min.js"></script>
    <script src="js/portfolio_slider.js"></script>

    <!-- Custom js-->
    <script src="js/custom.js"></script>
    <script src="js/index.js"></script>
  </body>

</html>
