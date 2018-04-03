<?php
include 'database.php';

$plmnaam = $_POST['plmnaam'];
$plmpsid = $_POST['plmpsid'];
$plmtelefoon = $_POST['plmtelefoon'];
$plmww = $_POST['plmww'];
$plmachtergrond = $_POST['plmachtergrond'];
$plmletterkleur = $_POST['plmletterkleur'];


$insertquery = "INSERT INTO plm(naam, psid, telefoonnummer, wachtwoord, achtergrondkleur, letterkleur) VALUES('$plmnaam', '$plmpsid', '$plmtelefoon', '".md5($plmww)."', '#$plmachtergrond', '#$plmletterkleur')";
$insertplm = mysqli_query($connectie, $insertquery);
//echo $insertquery;

include 'plmcss.php';

header('location: toevoegen.php?keuze=Docent');

?>