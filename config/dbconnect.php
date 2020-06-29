<?php 
session_start();
$dbname = "touchlesspay";
$dbUser = "root";
$dbPass = "";
$Host   = "localhost";

$link = mysqli_connect($Host, $dbUser, $dbPass, $dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
else{
	$_SESSION['connection'] = $link;
}



?>