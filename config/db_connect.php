<?php
$servername = "mysql";
$username = "root";
$password = "123";
$dbname = "restaurant_dbase";

//connect to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

//check connection; set the PDO error mode to exception mode
$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully <br>";

?>
