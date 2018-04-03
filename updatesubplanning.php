<?php
/*include 'database.php';
$planningid = $_POST['planningid'];
$plm = $_POST['PLM'];
$lokaal = $_POST['lokaal'];
$lesblok = $_POST['lesblok'];
$lesstof = $_POST['lesstof'];
$groepnr = $_POST['groepnr'];

$query = "UPDATE subplanning SET lesblok = $lesblok, lokaalid = $lokaal, plmid = $plm WHERE planningid = $planningid AND lesstofid = $lesstof";
//echo $query;
mysqli_query($connectie, $query);


$kwerie = mysqli_query($connectie, "SELECT * FROM planning WHERE planningid = $planningid");
$pagina = mysqli_fetch_object($kwerie);
header ("location: test.php?weeknr=$pagina->weekid&jaarnr=$pagina->jaar&groepnr=$pagina->groepid");
*/?>