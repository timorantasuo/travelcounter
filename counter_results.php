<?php
   include('session.php');
   
  
 $dist = $_POST['dist'];
 $start = $_POST['start'];
 $dest = $_POST['dest'];
 $date = $_POST['date'];
 
 $date = date("Y-m-d", strtotime($date));
 

 $dist = mysqli_escape_string($db, $dist);
 $start = mysqli_escape_string($db, $start);
 $dest = mysqli_escape_string($db, $dest);
 $date = mysqli_escape_string($db, $date);


 /* Insert data to database  */
 $query = mysqli_query($db, "INSERT INTO counter_travel (counter_id, travel_date, startingpoint, destination, distance)
                             VALUES ('$id_session', '$date', '$start', '$dest', '$dist')");
 $message = ('Travel data saved successfully, you will be redirected back to counter in 5 seconds');

 ?>
