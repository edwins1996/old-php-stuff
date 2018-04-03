<?php

$user = 'root';
$ww = '';
$host = 'localhost';
$database = 'documenten';
$connectie = mysqli_connect($host, $user, $ww, $database);

if (mysqli_connect($host, $user, $ww, $database)){
	//echo 'You have succesfully connected to the database...<br />';
}
else{
	echo 'Failed to connect to database... <br />';
}

?>