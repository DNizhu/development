<?php 

	session_start();

	$servername = "blitzschlag.org";
	$username = "cacs";
	$password = "Blitz@2017";
	$db="Blitzschlag";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}

	// select database
    if (mysqli_select_db( $conn, $db) === false)
        die("Could not select database");
    

    // if username and password were submitted, check them
    if (isset($_POST["fn"]) && isset($_POST["ln"]) && isset($_POST["accomodation"]) && isset($_POST["pronites"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["city"]) && isset($_POST["institute"])){
	
	echo $_POST["fn"].$_POST["institute"].$_POST["accomodation"]."HELLLO";
	
	
	$sql=sprintf("INSERT into registration(fn,ln,email,phone,city,institute,pronites,accomodation) values ('%s','%s','%s','%s','%s','%s','%s','%s');",
		             mysqli_real_escape_string($conn,$_POST["fn"]),
					 mysqli_real_escape_string($conn,$_POST["ln"]),
					 mysqli_real_escape_string($conn,$_POST["email"]),
					 mysqli_real_escape_string($conn,$_POST["phone"]),
					 mysqli_real_escape_string($conn,$_POST["city"]),
					 mysqli_real_escape_string($conn,$_POST["institute"]),
					 mysqli_real_escape_string($conn,$_POST["pronites"]),
					 mysqli_real_escape_string($conn,$_POST["accomodation"]));
		 
		$result = mysqli_query($conn,$sql);
		
		if ($result === false)
            die("Could not query database");
		
		$last_reg_id = mysqli_insert_id($conn);
		
        
		
		    $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: http://$host$path/registered.php?id=$last_reg_id");
            exit;
		
	
	}
    



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Blitzschlag'16</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

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
    <!-- Circle counter cdn css file -->
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>
    <!-- Default Theme css file -->
    <link id="orginal" href="css/themes/default-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="style.css" rel="stylesheet">

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
    padding-top: 8%;
	}
</style>
  <body>
     <!-- BEGAIN PRELOADER -->
    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>
    <!-- END PRELOADER -->

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
          <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- LOGO -->

            <!-- TEXT BASED LOGO -->
            <a class="navbar-brand" href="#">Blitzschlag<span>Beta</span></a>

            <!-- IMG BASED LOGO  -->
            <!--  <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"></a> -->


          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#technical" title="technical events">Technical</a></li>
              <li><a href="#cultural" title="cultural events">Cultural</a></li>
              <li><a href="#team">Team</a></li>
              <li><a href="#registration">Registration</a></li>
              <li><a href="#accomodation">Accomodation</a></li>
              <li><a href="#sponsors">Sponsors</a></li>
            </ul>
          </div><!--/.nav-collapse -->
          </div>
        </nav>
      </div>
      <!-- END MENU -->

	<section >
	
	 <div class="container">
     <div class="col-md-3">
     </div>
						<div class="col-md-6">
							<!-- START PANEL -->
							<div class="panel panel-default" style="margin-top: 50px">
								<div class="panel-heading ui-draggable-handle">
 									<h3 class="panel-title">Registration ID : BLITZ_<?php echo htmlspecialchars(@$_GET['id']);?> </h3>
								</div>
								
								<?php 
								
								    $sql=sprintf("SELECT fn,ln from registration WHERE id='%s';",mysqli_real_escape_string($conn,@$_GET['id']));
	
									$result = mysqli_query($conn,$sql);
		
									if ($result === false)
											die("Could not query database");
		
									if(mysqli_num_rows($result) == 1){
		
									$row = mysqli_fetch_array($result);
									$fn=$row['fn'];
									$ln=$row['ln'];
									}
								?>
								
								<div class="panel-body" style="font-family: ubuntu">

										<div class="block">
											<form class="form-horizontal" role="form">
											
												<div class="panel-body panel-body-pricing">
													<h2><span style="color: #f00;" ><?php if( @$_GET['already']==1) { echo "ALREADY"; }?></span> <br> REGISTERED </h2>
													
													<hr>
													<table style="width: 100%">
														<tbody>
                                                        <tr>
        											    <h3>Dear <?php echo htmlspecialchars($fn)." ".htmlspecialchars($ln); ?>, Please note your registration ID for event registrations .</h3>
														 <br> <h4> Bring your college ID card to the venue .</h4>
													    </tr>
                                                        <tr>
                                                        <br>
    														
                                                            
														</tr>
														</tbody>
													</table>
												</div>
											</form>
                                            <div style="text-align: center">
										</div>
                                        </div>
                                </div>
							</div>
						</div>
						
	</div>
	<div align="center">
						<div > 
							<a href="index.php" class="tm-banner-link">RETURN TO HOME</a>
							
						</div>	
						</div>
	</section>

</section>

    <!--=========== BEGAIN CONTACT SECTION ================-->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- START CONTACT HEADING -->
            <div class="heading">
              <h2 class="wow fadeInLeftBig">Contact Us</h2>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- BEGAIN CONTACT CONTENT -->
          <div class="contact_content">
            <!-- BEGAIN CONTACT FORM -->
            <div class="col-lg-5 col-md-5 col-sm-5">
              <div class="contact_form">

                <!-- FOR CONTACT FORM MESSAGE -->
                <div id="form-messages"></div>

                <form>
                  <input class="form-control" type="text" placeholder="Name">
                  <input class="form-control" type="email" placeholder="Email">
                  <input class="form-control" type="text" placeholder="Subject">
                  <textarea class="form-control" cols="30" rows="10" placeholder="Your Message"></textarea>
                   <input class="submit_btn" type="submit" value="Send">
                </form>
              </div>
            </div>
            <!-- BEGAIN CONTACT MAP -->
            <div class="col-lg-7 col-md-7 col-sm-7">
              <div class="contact_map">
              <!-- BEGAIN GOOGLE MAP -->
               <div id="map_canvas"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->

    <!--=========== BEGAIN CONTACT FEATURE SECTION ================-->
    <section id="contactFeature">
      <!-- SKILLS COUNTER OVERLAY -->
      <div class="slider_overlay"></div>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="container">
              <div class="contact_feature">
            <!-- BEGAIN CALL US FEATURE -->
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="single_contact_feaured wow fadeInUp">
                <i class="fa fa-phone"></i>
                <h4>Call Us</h4>
                <p>1-265-596-580</p>
              </div>
            </div>
            <!-- BEGAIN CALL US FEATURE -->
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="single_contact_feaured wow fadeInUp">
                <i class="fa fa-envelope-o"></i>
                <h4>Email Address</h4>
                <p>singlepro@gmail.com</p>
              </div>
            </div>
            <!-- BEGAIN CALL US FEATURE -->
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="single_contact_feaured wow fadeInUp">
                <i class="fa fa-map-marker"></i>
                <h4>Office Location</h4>
                <p>Your Company Office Location</p>
              </div>
            </div>
            <!-- BEGAIN CALL US FEATURE -->
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="single_contact_feaured wow fadeInUp">
                <i class="fa fa-clock-o"></i>
                <h4>Working Hours</h4>
                <p>Monday-Friday 9.00-21.00</p>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END CONTACT FEATURE SECTION ================-->



     <!--=========== BEGAIN FOOTER ================-->
     <footer id="footer">
       <div class="container">
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_left">
               <p>Copyright &copy; 2015 <a href="http://www.wpfreeware.com">WpFreeware</a>. All Rights Reserved</p>
             </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_right">
               <ul class="social_nav">
                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                 <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                 <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
               </ul>
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
  </body>
</html>
