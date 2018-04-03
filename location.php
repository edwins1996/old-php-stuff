<?php
include 'database.php';
session_start();
$groepgroep = mysqli_query($connectie, "SELECT groepid FROM groepen");
$groep1groep = mysqli_fetch_object($groepgroep);
header("location: plannen.php?weeknr=".date('W')."&jaarnr=".date('Y')."&groepnr=$groep1groep->groepid");

?>