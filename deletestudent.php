<?php
include 'database.php';

$studentid = $_POST['studentid'];



$studentquery = "DELETE FROM leerlingen WHERE leerlingid = $studentid";
$studentverwijder = mysqli_query($connectie, $studentquery);

$SQL = mysqli_query($connectie, "SELECT * FROM leerlingen");
$fetch = mysqli_fetch_object($SQL);

header("location: verwijderen.php?keuze=Student&id=$fetch->leerlingid");

?>