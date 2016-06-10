<?php
   include('session.php');
   /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* Set the $timezone variable to become the current timezone */
    $timezone = date("e");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        $timemsg = "Good morning";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        $timemsg = "Good afternoon";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "17" && $time < "22") {
        $timemsg = "Good evening";
    } else
    /* Finally, show good night if the time is greater than or equal to 1900 hours */
    if ($time >= "22") {
        $timemsg = "It's bed time";
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Travel Counter</title>
    <meta name="keywords" content="" />
	<meta name="description" content="" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/templatemo_style.css" rel="stylesheet">
   	<link rel="stylesheet" href="css/templatemo_misc.css">

    <link href="css/circle.css" rel="stylesheet">
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/nivo-slider.css">
    <link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,100,600" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/JavaScript" src="js/slimbox2.js"></script> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/ddsmoothmenu.js"></script>

<!--/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

-->


<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_flicker", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

  </head>
  <body>
  <header>
    <!-- start menu -->
    <div id="templatemo_home">
    	<div class="templatemo_top">
      <div class="container templatemo_container" id="home">
        <div class="row">
          <div class="col-sm-3 col-md-3">
            <div class="logo">
              <img src="images/logo_1.jpg" alt="RijnIjsssel">
            </div>
          </div>
          <div class="col-sm-9 col-md-9 templatemo_col9">
          	<div id="top-menu">
            <nav class="mainMenu">
              <ul class="nav">
             	<li><a class="menu" href="#home"><?php echo $login_session; ?></a></li>
                <li><a class="menu" href="#home">User mgmt.</a></li>
                <li><a class="menu" href="logout_message.php">Log out</a></li>
               
              </ul>
            </nav>

            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="clear"></div>
    <!-- end menu -->
      	<div  id="slider"  class="nivoSlider templatemo_slider">
        	<img src="images/slider/img_1_blank.jpg" alt="slide 1" />          	
			<img src="images/slider/img_2_blank.jpg" alt="slide 2" /> 
            <img src="images/slider/img_3_blank.jpg" alt="slide 3" />	        	
	
    	</div>
        
   
        
             <div class="templatemo_caption">
                    <!--Pois käytöstä! <div class="templatemo_slidetitle">Travel Counter</div>-->
                    <div class="clear"></div>
                    <h1>User management to: <?php echo $row["counter_name"]." ".$row["counter_fam_name"]."";?></h1>
                    <div class="clear"></div>
       		   <p class="col-xs-12">Select the function you want to do below.</p>
       	       
    </div>  
  </header>
  	
	 
    
<div class="templatemo_lightgrey_about" id="login">
  <div class="clear"></div>
    <div class="templatemo_reasonbg">
    	<h2>Here you can change your preferences.</h2>
	  <p>Select the function you want to do.</p>
      
      <div class="container">
    	<div class="col-xs-6 col-sm-6 col-md-3 templatemo_col12">
        	<div class="item project-post">
						<a href="admin_dashboard.php"><div class="templatemo_about_box">
                        	<div class="square_coner">
                     		   <span class="texts-a"><i class="fa fa-arrow-left"></i></span>
                      	  </div>                          
                     	   Go back to start screen</div>
						<div class="col-xs-12 col-sm-6 col-md-3 hover-box" >
							<div class="inner-hover-box">								
								<p>Go back to start page.</p>
							</div>
						</div>
					</div></a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 templatemo_col12">
        	<div class="item project-post">
						<a href="admin_password.php"><div class="templatemo_about_box">
                        	<div class="square_coner">
                     		   <span class="texts-a"><i class="fa fa-lock"></i></span>
                      	  </div>
                     	   Change password</div>
						<div class="col-xs-6 col-sm-6 col-md-3 hover-box" >
							<div class="inner-hover-box">								
								<p>Change your password.</p>
							</div>
						</div>
					</div></a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 templatemo_col12 templatemo_margintop10">
        	<div class="item project-post">
						<a href="admin_email.php"><div class="templatemo_about_box">
                        	<div class="square_coner">
                     		   <span class="texts-a"><i class="fa fa-envelope"></i></span>
                      	  </div>
                     	   Change email</div>
						<div class="col-xs-6 col-sm-6 col-md-3 hover-box" >
							<div class="inner-hover-box">								
								<p>Change your email.</p>
							</div>
						</div>
					</div></a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 templatemo_col12 templatemo_margintop10">
        	<div class="item project-post">
						<a href="admin_locale.php"><div class="templatemo_about_box">
                        	<div class="square_coner">
                     		   <span class="texts-a"><i class="fa fa-pencil-square-o"></i></span>
                      	  </div>
                     	   Change address and location</div>
						<div class="col-xs-6 col-sm-6 col-md-3 hover-box" >
							<div class="inner-hover-box">								
								<p>Change your address and location.</p>
							</div>
						</div>
					</div></a> 	
        </div>
    </div>
    </div>
    <div class="clear"></div>
   
    <div class="clear"></div>
   
   
    <!--Footer Start-->
    <div class="templatemo_footer">
    	<div class="container">
       	  <div class="col-xs-6 col-sm-6 col-md-3 templatemo_col12 col-md-offset-2">
            	<h2>About Travel Counter</h2>
                <p>Travel Counter calculates the distance by giving the addresses. After that, it saves the data to database, so someone can supervise it.</p>
          </div>
            
           
          <div class="col-xs-8 col-sm-6 col-md-3 templatemo_col12 col-md-offset-1">
            <h2>Contact</h2>
            	<span class=""></span>
                <span class="right col-xs-11">In case of a problem, please contact</span>
                <div class="clear height10"></div>
                <span class="left col-xs-1 fa fa-phone"></span>
                <span class="right col-xs-11">0611440481</span>
                <div class="clear height10"></div>
                <span class="left col-xs-1 fa fa-envelope"></span>
                <span class="right col-xs-11">ao136524@jao.fi</span>
                <div class="clear height10"></div>
                <span class="left col-xs-1 fa fa-globe"></span>
                <span class="right col-xs-11">www.travelcounter.nl</span>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://code.jquery.com/jquery.js"></script> -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cycle2.min.js"></script>
    <script src="js/jquery.cycle2.carousel.min.js"></script>
    <script src="js/jquery.nivo.slider.pack.js"></script>
    
    <script src="js/cookie.js"></script>
    <script src="js/nivoslider.js"></script>
    <script src="js/footer.js"></script>
    <script src="js/path.js"></script>
    <script src="js/menuscroll.js"></script>
    
    <script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
    
	<script src="js/jquery.singlePageNav.js"></script>
    
	<script type="text/javascript" src="js/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    
    <script src="js/stickUp.min.js" type="text/javascript"></script>
 
</body>
</html>