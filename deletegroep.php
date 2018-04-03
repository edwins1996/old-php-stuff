<?php
include 'database.php';

$groepid = $_POST['groepid'];



$groepquery = "DELETE FROM groepen WHERE groepid = $groepid";
$groepverwijder = mysqli_query($connectie, $groepquery);

$SQL = mysqli_query($connectie, "SELECT * FROM groepen");
$fetch = mysqli_fetch_object($SQL);


header("location: verwijderen.php?keuze=Groep&id=$fetch->groepid");
?>