<?php
session_start();
include 'database.php';

$vakweek = $_POST['vakweek'];
$week = $_GET['week'];
$jaar = $_GET['jaar'];
$groep = $_GET['groep'];

$result = mysqli_query($connectie, "SELECT * FROM planning WHERE jaar = " . $jaar . " AND weekid = " . $week . " AND groepid = " . $groep . "");

if(mysqli_num_rows($result) == 0){

$query = mysqli_query($connectie, "INSERT INTO planning(planningid, weekid, groepid, jaar, lesperiode) VALUES ('', $week, $groep, $jaar, $vakweek)");
}
else{
   $finfo = mysqli_fetch_object($result);
    $planningid = $finfo->planningid;
    
    $vakweekquery = mysqli_query($connectie, "UPDATE planning SET lesperiode = $vakweek WHERE planningid = $planningid");
}

header("location: plannen.php?weeknr=$week&jaarnr=$jaar&groepnr=$groep");



?>