<?php
/*** begin our session ***/
session_start();

/*** first check that both the ID, email, name and password have been sent ***/
if(!isset( $_POST['counter_id'], $_POST['counter_email'], $_POST['counter_name'], $_POST['counter_fam_name'], $_POST['counter_password'], $_POST['counter_password_confirm']))
{
    $message = 'To use the counter, you need to register below.';
}

/*** check the ID is the correct length ***/
elseif (strlen( $_POST['counter_id']) > 10 || strlen($_POST['counter_id']) < 2)
{
    $message = 'Incorrect Length for ID';
	
}
/*** check the email is the correct length ***/
elseif (strlen( $_POST['counter_email']) > 150 || strlen($_POST['counter_email']) < 2)
{
    $message = 'Please, enter a email';
	
}
/*** check the email is valid ***/
elseif (!filter_var($_POST['counter_email'], FILTER_VALIDATE_EMAIL))
{
    $message = 'Please, enter a valid email';
	
}

/*** check the name is the correct ***/
elseif (strlen( $_POST['counter_name']) > 150 || strlen($_POST['counter_name']) < 2)
{
    $message = 'Please, enter your first name';
	
}
/*** check the fam_name is the correct length ***/
elseif (strlen( $_POST['counter_fam_name']) > 150 || strlen($_POST['counter_fam_name']) < 2)
{
    $message = 'Please, enter your last/falmily name';
	
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['counter_password']) > 86 || strlen($_POST['counter_password']) < 4)
{
    $message = 'Incorrect Length for Password';
	
}

/*** check the confirm password meets the password ***/
elseif ($_POST['counter_password'] != $_POST['counter_password_confirm'])
{
    $message = 'Passwords are not the same! Please check again.';
	
	
}


else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $id = filter_var($_POST['counter_id'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['counter_email'], FILTER_SANITIZE_STRING);
	$name = filter_var($_POST['counter_name'], FILTER_SANITIZE_STRING);
	$fam_name = filter_var($_POST['counter_fam_name'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['counter_password'], FILTER_SANITIZE_STRING);
	$year = filter_var($_POST['year'], FILTER_SANITIZE_STRING);
	$month = filter_var($_POST['month'], FILTER_SANITIZE_STRING);
	$day = filter_var($_POST['day'], FILTER_SANITIZE_STRING);

	/*** now we can encrypt the password ***/
	
	
	
	$encrypt = password_hash("$password", PASSWORD_BCRYPT);

	
    
    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'mysql_username';

    /*** mysql password ***/
    $mysql_password = 'mysql_password';

    /*** database name ***/
    $mysql_dbname = 'counter_data';

    
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO counter_users (counter_id, counter_email, counter_name, counter_fam_name, counter_password, counter_year, counter_month, counter_day ) VALUES (:id, :email, :name, :fam_name, :encrypt, :year, :month, :day )");

        /*** bind the parameters ***/
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':fam_name', $fam_name, PDO::PARAM_STR);
        $stmt->bindParam(':encrypt', $encrypt, PDO::PARAM_STR);
		$stmt->bindParam(':year', $year, PDO::PARAM_STR);
		$stmt->bindParam(':month', $month, PDO::PARAM_STR);
		$stmt->bindParam(':day', $day, PDO::PARAM_STR);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** if all is done, say thanks ***/
        $message = 'New user added<br><a href="index.php"><b>Login here!</b></a>';
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Travel Counter: Register</title>
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
    <div id="templatemo_home">
    	<div class="templatemo_top">
      <div class="container templatemo_container" id="register">
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
                <li><a class="menu" href="index.php">Home</a></li>
                <li><a class="menu" href="index.php">Login</a></li>
                <li><a class="menu" href="#register">Register</a></li>
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
      	<div id="slider"  class="nivoSlider templatemo_slider">
        	<img src="images/slider/img_1_blank.jpg" alt="slide 1" />          	
				        	
	
    	</div>
             <div class="templatemo_caption">
                    
                    <div class="clear"></div>
                    <h1>Registration</h1>
                    <div class="clear"></div>
                    <p class="col-xs-12"><?php echo $message; ?></p><br>
                    <input type="button" id="myBtn" value="How to: Register" class="btn btn-primary"/>
                    <div id="myModal" class="modal">
                     <!-- Modal content -->
                      <div class="modal-content">
                        <span class="close">x</span>
                        <h2>How to register to Travel Counter</h2><br><br>
                        <p><b>First step:</b> Try to remember your employee ID. With this, employer can identify you when he or she is checking your travel data.<br><b>Second step:</b> Give your email. Note: Please prefer to your work email address rather than your personal. <br><b>Third step:</b> Give your first name and family name.<br> <b>Fourth step:</b> Give a valid password. Password must contain at least 4 letters/digits or special letters. After that, confirm your password.<br><b>Fifth step:</b> Give your date of birth in THIS order: Year - Month - Day. For example: 1998-10-16.<br><br> Thats it, go ahead and register and start using Travel Counter.</p>
                      </div>

</div>
	          	   
              </div>  
  </header>
  	
	
<div class="templatemo_lightgrey_about" id="register">
  <div class="clear"></div>
    <div class="templatemo_reasonbg">
    	<h2>Register</h2>
	  <p>Register by giving your information below.</p>
      <p>Already registered? <a href="index.php"><b>Login here!</b></a></p>
   
	  <div class="col-md-3">&nbsp;</div>
      <div class="col-md-offset-1 col-md-3 col-xs-8 col-xs-offset-2">
        <form action="" name="register" method="post">
        <div class="form-group">
            <input name="counter_id" type="text" class="form-control" id="counter_id" placeholder="Your ID, min. 2 digits" maxlength="10">
          </div>
          <div class="form-group">
           <input name="counter_email" type="text" class="form-control" id="counter_email" placeholder="Your e-mail" maxlength="150">
          </div>
  
          <div class="form-group">
            <input name="counter_name" type="text" class="form-control" id="counter_name" placeholder="Your first name" maxlength="150">
          </div>
          <div class="form-group">
            <input name="counter_fam_name" type="text" class="form-control" id="counter_fam_name" placeholder="Your last/family name" maxlength="150">
          </div>
          <div class="form-group">
            <input name="counter_password" type="password" class="form-control" id="counter_password" placeholder="Your password" maxlength="86">
          </div>
          <div class="form-group">
            <input name="counter_password_confirm" type="password" class="form-control" id="counter_password_confirm" placeholder="Confirm your password" maxlength="86">
          </div>
          
          <label for="day">Date of Birth:</label><br><br>
<div id="date1" name="date1" class="datefield">
    <input id="year" onKeyup="autotab(this, document.register.month)" name="year" type="text" maxlength="4" placeholder="YYYY"/>-
    <input id="month" onKeyup="autotab(this, document.register.day)" name="month" type="text" maxlength="2" placeholder="MM"/>-
    <input id="day" name="day" type="text" maxlength="2" placeholder="DD"/>               
    
    
</div><br><br>
        



          
          <div>
            <input type="submit" name="submit" value="Register" class="btn btn-primary"/>
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
    <script src="js/modal-box.js"></script>
    <script src="js/nivoslider.js"></script>
    <script src="js/footer.js"></script>
    <script src="js/path.js"></script>
    <script src="js/menuscroll.js"></script>
    <script src="js/autotab.js"></script>
    
    <script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
    
	<script src="js/jquery.singlePageNav.js"></script>
    
	<script type="text/javascript" src="js/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    
    <script src="js/stickUp.min.js" type="text/javascript"></script>
 
</body>
</html>