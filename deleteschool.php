<?php
include 'database.php';

$schoolid = $_POST['schoolid'];



$schoolquery = "DELETE FROM scholen WHERE schoolid = $schoolid";
$schoolverwijder = mysqli_query($connectie, $schoolquery);

$SQL = mysqli_query($connectie, "SELECT * FROM scholen");
$fetch = mysqli_fetch_object($SQL);

header("location: verwijderen.php?keuze=School&id=$fetch->schoolid");

?>