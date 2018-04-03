<?php
include 'database.php';

$studentvoornaam = $_POST['studentvoornaam'];
$studenttussenvoegsel = $_POST['studenttussenvoegsel'];
$studentachternaam = $_POST['studentachternaam'];
$studentpsnummer = $_POST['studentpsnummer'];
$studenttelefoon = $_POST['studenttelefoon'];
$studentemail = $_POST['studentemail'];
$studentgroepid = $_POST['studentgroepid'];
$studentschoolnaam = $_POST['studentschoolnaam'];
$studentwwoord = $_POST['studentwwoord'];
$studentopmerking = $_POST['studentopmerking'];


$insertquery = "INSERT INTO leerlingen(voornaam, tussenvoegsel, achternaam, psnummer, groepid, telefoonnummer, emailadres, schoolid, wachtwoord, opmerkingen) VALUES('$studentvoornaam', '$studenttussenvoegsel', '$studentachternaam', $studentpsnummer, $studentgroepid, '$studenttelefoon', '$studentemail', $studentschoolnaam, '".md5($studentwwoord)."', '$studentopmerking')";
$insertstudent = mysqli_query($connectie, $insertquery);
//echo $insertquery;
header('location: toevoegen.php?keuze=Student');

?>