<?php
   include('session.php');
   
   
   /*** first check that both the username, password and form token have been sent ***/
if(!isset( $_POST['counter_password'], $_POST['counter_password_new'], $_POST['counter_password_confirm']))
{
    $message = 'Please give your old and then new password.';
}

  /*** check the password is the correct length ***/
elseif (strlen( $_POST['counter_password']) > 86 || strlen($_POST['counter_password']) < 4)
{
    $message = 'Incorrect length for old password';
	
}

/*** check the password is the correct length ***/
elseif (strlen( $_POST['counter_password_new']) > 86 || strlen($_POST['counter_password_new']) < 4)
{
    $message = 'Incorrect length for new password';
	
}

/*** check the password is the correct length ***/
elseif (strlen( $_POST['counter_password_confirm']) > 86 || strlen($_POST['counter_password_confirm']) < 4)
{
    $message = 'Incorrect length for password that needs to be confirmed';
	
}

/*** check the password is the correct length ***/
elseif ($_POST['counter_password_new'] != $_POST['counter_password_confirm'])
{
    $message = 'Passwords are not the same! Please check again.';
	
}

else{
		$password = mysqli_real_escape_string($db,$_POST['counter_password']);
		$password_new = mysqli_real_escape_string($db,$_POST['counter_password_new']);
		
		$encrypt = password_hash("$password_new", PASSWORD_BCRYPT);
		
	 if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      
	  
      
      $sql = "SELECT counter_email, counter_password FROM counter_users WHERE counter_email = '$user_check'";
	  
	  
      $result = mysqli_query($db,$sql);
      $row_pass = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
	  
      $count = mysqli_num_rows($result);
	  
	  
      
      // If result matched $email and $password, table row must be 1 row
		
		
		if (password_verify($password, $row_pass['counter_password'])) {

                //Password matches, so create the session
                /*** now we can encrypt the password ***/
      
	

        /*** prepare the insert ***/
        $statement = "UPDATE counter_users SET counter_password= '$encrypt' WHERE counter_email= '$user_check'";
		$retval = mysqli_query($db,$statement);
            
            if(! $retval ) {
               $message ='Could not update password';
            }
            $message = 'Updated password successfully<br><a href="admin_management.php"><b>Go back to settings here.</b></a>';

		}else{
			$message = 'Wrong old password, please check again!';
	}
	 }
}



?>

<!DOCTYPE html>
<html>
  <head>
    <title>Travel Counter: Configuration</title>
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
                <li><a class="menu" href="#home">Password change</a></li>
                <li><a class="menu" href="admin_management.php">User mgmt.</a></li>
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
                    <h1>Password change to: <?php echo $row["counter_name"]." ".$row["counter_fam_name"]."";?></h1>
                    <div class="clear"></div>
       		   <p class="col-xs-12"><?php echo $message; ?></p>
       	       
    </div>  
  </header>
  	
	 
    
<div class="templatemo_lightgrey_about" id="login">
  <div class="clear"></div>
    <div class="templatemo_reasonbg">
    	<h2>Password change.<br><br></h2>
	  <!--<p>Select the function you want to do.</p>-->
      
      <div class="col-md-3">&nbsp;</div>
      <div class="col-md-offset-1 col-md-3 col-xs-8 col-xs-offset-2">
        <form action="" method="post">
          <div class="form-group">
            <input name="counter_password" type="password" class="form-control" id="counter_password" placeholder="Your current password" maxlength="86">
          </div>
          <div class="form-group">
            <input name="counter_password_new" type="password" class="form-control" id="counter_password_new" placeholder="New password" maxlength="86">
          </div>
          <div class="form-group">
            <input name="counter_password_confirm" type="password" class="form-control" id="counter_password_confirm" placeholder="Confirm new password" maxlength="86">
          </div>
          
          <div>
            <input type="submit" name="submit" value="Change password" class="btn btn-primary"/>
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