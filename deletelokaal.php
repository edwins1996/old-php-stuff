<?php
include 'database.php';
$lokaalid = $_POST['lokaalid'];


$lokaaldelete = mysqli_query($connectie, "DELETE FROM lokaal WHERE lokaalid = $lokaalid");

$SQL = mysqli_query($connectie, "SELECT * FROM lokaal");
$fetch = mysqli_fetch_object($SQL);

header("location: verwijderen.php?keuze=Lokaal&id=$fetch->lokaalid");

?>