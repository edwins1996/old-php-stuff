<?php
session_start();
include 'database.php';

$planningid = $_POST['planningid'];
$lesblok = $_POST['lesblok'];
$lesstof = $_POST['lesstof'];
$PLM = $_POST['PLM'];
$lokaal = $_POST['lokaal'];
$lesblok2 = substr($lesblok, 8);
$jaar = $_POST['jaar'];
$week = $_POST['weeknr'];
$groep = $_POST['groepid'];
$begintijd = $_POST['begintijd'];
$eindtijd = $_POST['eindtijd'];
$vakweek = $_POST['vakweek'];
//$dag1 = $_POST['dag1'];
//echo $dag1;



if($begintijd == '--:--'){
    $begintijd = '';
}
if($eindtijd == '--:--'){
    $eindtijd = '';
}
if($lokaal == 0 && $PLM == 0){
    $_SESSION['plmstatus'] = 'NIET OK';
    $_SESSION['lokaalstatus'] = 'NIET OK';
    header("location: roosterinsert.php?jaar=$jaar&weeknr=$week&groepid=$groep&lesstof=$lesstof&lesblok=$lesblok&plmnr=$PLM&lokaalid=$lokaal");
}

elseif($PLM == 0){
        $_SESSION['plmstatus'] = 'NIET OK';
header("location: roosterinsert.php?jaar=$jaar&weeknr=$week&groepid=$groep&lesstof=$lesstof&lesblok=$lesblok&plmnr=$PLM&lokaalid=$lokaal"); 
}
elseif($lokaal == 0){
$_SESSION['lokaalstatus'] = 'NIET OK';
header("location: roosterinsert.php?jaar=$jaar&weeknr=$week&groepid=$groep&lesstof=$lesstof&lesblok=$lesblok&plmnr=$PLM&lokaalid=$lokaal");
    
}else{


if(!isset($_POST['ma-1']) || !isset($_POST['ma-2']) || !isset($_POST['ma-3']) || !isset($_POST['ma-4']) || !isset($_POST['di-1']) || !isset($_POST['di-2']) || !isset($_POST['di-3']) || !isset($_POST['di-4']) || !isset($_POST['wo-1']) || !isset($_POST['wo-2']) || !isset($_POST['wo-3']) || !isset($_POST['wo-4']) || !isset($_POST['do-1']) || !isset($_POST['do-2']) || !isset($_POST['do-3']) || !isset($_POST['do-4']) || !isset($_POST['vr-1']) || !isset($_POST['vr-2']) || !isset($_POST['vr-3']) || !isset($_POST['vr-4'])){
$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $lesblok2, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')";
    $est = mysqli_query($connectie, $query);
    echo 'Test / ' . $query;
    
$maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);    
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $lesblok2, $lokaal, $PLM, $lesstof, $groep)");
}
}

if(isset($_POST['ma-1'])){
	$les1 = $_POST['ma-1'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les1, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    // Historiek les insert
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les1, $lokaal, $PLM, $lesstof, $groep)");
}
}
if(isset($_POST['ma-2'])){
	$les2 = $_POST['ma-2'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les2, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les2, $lokaal, $PLM, $lesstof, $groep)");
}
}
if(isset($_POST['ma-3'])){
	$les3 = $_POST['ma-3'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les3, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les3, $lokaal, $PLM, $lesstof, $groep)");
}
}
if(isset($_POST['ma-4'])){
	$les4 = $_POST['ma-4'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les4, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
   
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les4, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['di-1'])){
	$les5 = $_POST['di-1'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les5, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les5, $lokaal, $PLM, $lesstof, $groep)");
}
}
if(isset($_POST['di-2'])){
	$les6 = $_POST['di-2'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les6, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les6, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['di-3'])){
	$les7 = $_POST['di-3'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les7, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les7, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['di-4'])){
	$les8 = $_POST['di-4'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les8, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les8, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['wo-1'])){
	$les9 = $_POST['wo-1'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les9, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les9, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['wo-2'])){
	$les10 = $_POST['wo-2'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les10, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les10, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['wo-3'])){
	$les11 = $_POST['wo-3'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les11, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les11, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['wo-4'])){
	$les12 = $_POST['wo-4'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les12, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les12, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['do-1'])){
	$les13 = $_POST['do-1'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les13, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les13, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['do-2'])){
	$les14 = $_POST['do-2'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les14, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les14, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['do-3'])){
	$les15 = $_POST['do-3'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les15, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les15, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['do-4'])){
	$les16 = $_POST['do-4'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les16, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les16, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['vr-1'])){
	$les17 = $_POST['vr-1'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les17, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les17, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['vr-2'])){
	$les18 = $_POST['vr-2'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les18, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les18, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['vr-3'])){
	$les19 = $_POST['vr-3'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les19, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query";
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les19, $lokaal, $PLM, $lesstof, $groep)");
}
}if(isset($_POST['vr-4'])){
	$les20 = $_POST['vr-4'];
	$query = "INSERT INTO subplanning(planningid, lesblok, lokaalid, plmid, lesstofid, begintijd, eindtijd) VALUES($planningid, $les20, $lokaal, $PLM, $lesstof, '$begintijd', '$eindtijd')"; $est = mysqli_query($connectie, $query); echo "<br />$query"; 
    
    $maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);
    // Historiek les insert
if($PLM == '' || $PLM == 0 || $lokaal == '' || $lokaal == 0){
echo 'Niet';
}
else{
    $historiek = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($maxuitvoer->max, $jaar, $week, $les20, $lokaal, $PLM, $lesstof, $groep)");
}
}





$maxquery = mysqli_query($connectie, "SELECT MAX(subplanningid) AS max FROM subplanning");
$maxuitvoer = mysqli_fetch_object($maxquery);




$kwerie = mysqli_query($connectie, "SELECT * FROM planning WHERE planningid = " . $planningid . "");

// Controleren en invoeren lesperiode
$pagina = mysqli_fetch_object($kwerie);


    // UPDATE query lesperiode
    $updatevakweek = mysqli_query($connectie, "UPDATE planning SET lesperiode = $vakweek WHERE planningid = $planningid");



header ("location: plannen.php?weeknr=$pagina->weekid&jaarnr=$pagina->jaar&groepnr=$pagina->groepid");
}
?>