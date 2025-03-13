<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kkmms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!isset($_SESSION)) 
{ 
    session_start();  
};

// error_reporting(0);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>