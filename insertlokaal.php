<?php
include 'database.php';

$lokaalnaam = $_POST['lokaalnaam'];

$lokaalinsert = mysqli_query($connectie, "INSERT INTO lokaal(lokaalnaam) VALUES($lokaalnaam)");

header('location: toevoegen.php?keuze=Lokaal');

?>