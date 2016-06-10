<?php
   include('db.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT counter_email, counter_name, counter_fam_name, counter_id, counter_year, counter_month, counter_day, counter_address, counter_postcode, counter_city FROM counter_users WHERE counter_email = '$user_check' ");
   
   $travel_sql = mysqli_query($db,"SELECT counter_email, counter_name, counter_fam_name, counter_id, counter_year, counter_month, counter_day, counter_address, counter_postcode, counter_city FROM counter_users");
   
   $tra_sql = mysqli_query($db,"SELECT counter_id, startingpoint, destination, distance FROM counter_travel");
   
   
   
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
   $row2 = mysqli_fetch_array($tra_sql, MYSQLI_ASSOC);
   $row3 = mysqli_fetch_array($travel_sql, MYSQLI_ASSOC);
   
   $login_session = $row['counter_email'];
   $id_session = $row['counter_id'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>