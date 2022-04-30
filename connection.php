<?php

$hostName = "localhost"; 	// Host Name of Mysql
$user     = "root";		    // Mysql User Name	
$password = "";				// Mysq User Password
$dbName   = "pegion";	    // Databases Name

// Connection
$connection = mysqli_connect($hostName, $user, $password, $dbName);
?>
