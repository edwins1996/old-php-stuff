<?php
/* DIT IS OM LES UIT ROOSTER TE VERWIJDEREN, NIET UIT DATABASE */



include 'database.php';
$groepnr = $_GET['groepnr'];
$subplanningid = $_GET['subplanningid'];
$jaar = $_GET['jaarnr'];
$weeknr = $_GET['weeknr'];



$result = "SELECT * FROM planning WHERE jaar = " . $jaar . " AND weekid = " . $weeknr . " AND groepid = " . $groepnr . "";
$result2 = mysqli_query($connectie, $result);
$subplanning = mysqli_fetch_object($result2);

$query = "DELETE FROM subplanning WHERE subplanningid = $subplanningid AND planningid = $subplanning->planningid";
$query2 = mysqli_query($connectie, $query);
echo $query;
header("location: plannen.php?weeknr=$weeknr&jaarnr=$jaar&groepnr=$groepnr");

?>