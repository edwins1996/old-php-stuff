<?php
include 'database.php';

$regioid = $_POST['regio'];
$cohort = $_POST['cohort'];
$niveauid = $_POST['niveau'];
$opmerkingen = $_POST['groepopmerkingen'];

$insertquery = "INSERT INTO groepen(regioid, cohort, niveauid, opmerkingen) VALUES($regioid, '$cohort', $niveauid, '$opmerkingen')";
$insertgroep = mysqli_query($connectie, $insertquery);

header('location: toevoegen.php?keuze=Groep');

?>