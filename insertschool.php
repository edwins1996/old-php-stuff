<?php
include 'database.php';

$schoolnaam = $_POST['schoolnaam'];
$schooladres = $_POST['schooladres'];
$schoolpostcode = $_POST['schoolpostcode'];
$schoolplaats = $_POST['schoolplaats'];
$schoolregio = $_POST['regio'];
$schooltelefoon = $_POST['schooltelefoon'];
$schoolpoc = $_POST['schoolpoc'];
$schoolemail = $_POST['schoolemail'];
$schoolopmerking = $_POST['schoolopmerking'];

$insertquery = "INSERT INTO scholen(regioid, schoolnaam, adres, postcode, plaatsnaam, telefoonnummer, POC, email, opmerkingen) VALUES($schoolregio, '$schoolnaam', '$schooladres', '$schoolpostcode', '$schoolplaats', '$schooltelefoon', '$schoolpoc', '$schoolemail', '$schoolopmerking')";
$insertlesstof = mysqli_query($connectie, $insertquery);
//echo $insertquery;
header('location: toevoegen.php?keuze=School');

?>