<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'mysql_username');
   define('DB_PASSWORD', 'mysql_password');
   define('DB_DATABASE', 'counter_data');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>