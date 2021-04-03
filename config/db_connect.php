<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_dbase";

try {
//connect to database
$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

//check connection; set the PDO error mode to exception mode
$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully <br>";

?>