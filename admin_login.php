<?php
include('db.php');
/*** begin our session ***/
session_start();

/*** first check that both the username, password and form token have been sent ***/
if(!isset( $_POST['counter_id'], $_POST['counter_email'], $_POST['counter_name'], $_POST['counter_fam_name'], $_POST['counter_password']))
{
    $message = 'Please login below.';
}

/*** check the email is the correct length ***/
elseif (strlen( $_POST['counter_email']) > 150 || strlen($_POST['counter_email']) < 2)
{
    $message = 'Please, enter a email';
	break;
}
/*** check the email is valid ***/
elseif (!filter_var($_POST['counter_email'], FILTER_VALIDATE_EMAIL))
{
    $message = 'Please, enter a valid email';
	break;
}

/*** check the password is the correct length ***/
elseif (strlen( $_POST['counter_password']) > 86 || strlen($_POST['counter_password']) < 4)
{
    $message = 'Incorrect Length for Password';
	break;
}


 
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($db,$_POST['counter_email']);
      $password = mysqli_real_escape_string($db,$_POST['counter_password']); 
      
      $sql = "SELECT counter_email, counter_password, usertype FROM counter_users WHERE counter_email = '$email'";
	  
	  
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
	  
      $count = mysqli_num_rows($result);
	  
	  
      
      // If result matched $email and $password, table row must be 1 row
		
		
		if (password_verify($password, $row['counter_password'] )) {
			if ($row['usertype'] == "admin"){
                //Password matches, so create the session
                
	
        $_SESSION['login_user'] = $email;
			
			
         header("location: admin_dashboard.php");
		 exit;
			}
      }
	  else {
         $message = "Your email or password is invalid";
	  }
 }
   
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Travel Counter | Admin login</title>
    <meta name="keywords" content="" />
	<meta name="description" content="" />
    <!-- 
    Smoothy Template 
    http://www.templatemo.com/tm-396-smoothy
    -->
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
    <div id="home">
    	<div class="templatemo_top" id="#">
      <div class="container templatemo_container">
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
                <li><a class="menu" href="#home">Home</a></li>
                <li><a class="menu" href="#login">Login</a></li>
                <li><a class="menu" href="register.php">Register</a></li>
                <li><a class="menu" href="user_dashboard.php">Back to normal page</a></li>
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
                    <h1>Travel Counter<br>Admin login</h1>
                    <div class="clear"></div>
             		<p class="col-xs-12"><?php echo $message; ?></p>
	          	    <a class="btn btn-large btn-primary" href="#login">Login</a>
                    <input type="button" id="myBtn" value="How to get admin access" class="btn btn-primary"/>
                    <div id="myModal" class="modal">
                     <!-- Modal content -->
                      <div class="modal-content">
                        <span class="close">x</span>
                        <h2>How to login as admin to Travel Counter</h2><br><br>
                        <p><b>First step:</b> First of all, register in user<a href="register.php"> registration page.</a><br><b>Second step:</b> After that, take contact to administrator and your account permissions will be changed to admin. <br><b>Third step:</b> After that, you can login via admin login page.<br></p>
                      </div>
              </div>  
  </header>
  	
	
<div class="templatemo_lightgrey_about" id="login">
  <div class="clear"></div>
    <div class="templatemo_reasonbg">
    	<h2>Login</h2>
	  <p>Login using your e-mail and password.</p>
      <p>Not registered yet? <a href="admin/register.php"><b>Register here!</b></a></p>
   
	  <div class="col-md-3">&nbsp;</div>
      <div class="col-md-offset-1 col-md-3 col-xs-8 col-xs-offset-2 col-xs-8-600">
        <form action="" method="post">
          <div class="form-group">
            <input name="counter_email" type="text" class="form-control" id="counter_email" placeholder="Your e-mail" maxlength="150">
          </div>
          <div class="form-group">
            <input name="counter_password" type="password" class="form-control" id="counter_password" placeholder="Your Password" maxlength="86">
          </div>
          <div>
            <input type="submit" name="submit" value="Login" class="btn btn-primary"/>
          </div>
        </form>
      </div>
      
      <div class="row"> </div>
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
                <span class="right col-xs-11">+358 4002 69688</span>
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
    
    <script src="js/modal-box.js"></script>
    <script src="js/cookie.js"></script>
    <script src="js/nivoslider.js"></script>
    <script src="js/footer.js"></script>
    <script src="js/path.js"></script>
    <script src="js/menuscroll.js"></script>
    
    <script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
    
	<script src="js/jquery.singlePageNav.js"></script>
    
	<script type="text/javascript" src="js/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    
    <script src="js/stickUp.min.js" type="text/javascript"></script>
 
</div></body>
</html>