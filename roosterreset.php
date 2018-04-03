<?php
session_start();
include 'database.php';

$groep = $_GET['groepid'];
$week = $_GET['weeknr'];
$jaar = $_GET['jaarnr'];

$SELECT = mysqli_query($connectie, "SELECT * FROM planning WHERE groepid = $groep AND weekid = $week AND jaar = $jaar");
$fetch = mysqli_fetch_object($SELECT);

$SQL = mysqli_query($connectie, "SELECT * FROM subplanning WHERE planningid = $fetch->planningid");
while($sqlfetch = mysqli_fetch_object($SQL)){

    $delhistoire = mysqli_query($connectie, "DELETE FROM historie WHERE subplanningid = $sqlfetch->subplanningid");

}
$DELETE = mysqli_query($connectie, "DELETE FROM subplanning WHERE planningid = $fetch->planningid");
$DELETEPLANNING = mysqli_query($connectie, "DELETE FROM planning WHERE planningid = $fetch->planningid");

//if($_SESSION['gebrnaam'] != '12191'){
header("location: plannen.php?weeknr=$week&jaarnr=$jaar&groepnr=$groep");
//}else if($_SESSION['gebrnaam'] == '12191'){
//    echo "<img src='egel.jpg' width='100%' height='100%' />'";
//    header("refresh: 7; url=plannen.php?weeknr=$week&jaarnr=$jaar&groepnr=$groep");
//}

?>