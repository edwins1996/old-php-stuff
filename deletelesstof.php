<?php
include 'database.php';

$lesstofid = $_POST['lesid'];



$lesstofquery = "DELETE FROM lesstof WHERE lesstofid = $lesstofid";
$lesstofverwijder = mysqli_query($connectie, $lesstofquery);
header('location: verwijderen.php?keuze=Les&id=1');

?>