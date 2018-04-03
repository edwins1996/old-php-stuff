<?php
include 'database.php';

$lesstofid = $_POST['lesstofselect'];
$plmid = $_POST['plmselect'];
$lokaalid = $_POST['lokaalselect'];
$weeknr = $_GET["weeknr"];
$jaarnr = $_GET["jaarnr"];
$groepnr = $_GET["groepnr"];
$lesblok = $_POST['lesblok'];
$begintijd = $_POST['begintijd'];
$eindtijd = $_POST['eindtijd'];
$koppeling = $_POST['koppeling'];
$opmerkingen = $_POST['opmerkingen'];
 
if($begintijd == '--:--'){
    $begintijd = '';
}
if($eindtijd == '--:--'){
    $eindtijd = '';
}
echo $lesblok . '<br />';
// Planningid query
$result = "SELECT * FROM planning WHERE jaar = " . $jaarnr . " AND weekid = " . $weeknr . " AND groepid = " . $groepnr . "";
$result2 = mysqli_query($connectie, $result);
$subplanning = mysqli_fetch_object($result2);

// Query voor ophalen gegevens uit subplanning voor lestijden
$lestijdenquery = "SELECT * FROM subplanning WHERE planningid = $subplanning->planningid";
$lestijdenuitvoer = mysqli_query($connectie, $lestijdenquery);


if(!isset($_POST['blok-1']) || !isset($_POST['blok-2']) || !isset($_POST['blok-3']) || !isset($_POST['blok-4']) || !isset($_POST['blok51']) || !isset($_POST['blok-6']) || !isset($_POST['blok-7']) || !isset($_POST['blok-8']) || !isset($_POST['blok-9']) || !isset($_POST['blok-10']) || !isset($_POST['blok-11']) || !isset($_POST['blok-12']) || !isset($_POST['blok-13']) || !isset($_POST['blok-14']) || !isset($_POST['blok-15']) || !isset($_POST['blok-16']) || !isset($_POST['blok-17']) || !isset($_POST['blok-18']) || !isset($_POST['blok-19']) || !isset($_POST['blok-20'])){
$lesupdate = "UPDATE subplanning SET plmid = $plmid, lokaalid = $lokaalid, lesstofid = $lesstofid, koppeling = '$opmerkingen', begintijd = '$begintijd', eindtijd = '$eindtijd' WHERE planningid = $subplanning->planningid AND lesblok = $lesblok";
$lesupdate2 = mysqli_query($connectie, $lesupdate);
    
    $selectie = mysqli_query($connectie, "SELECT * FROM subplanning WHERE planningid = $subplanning->planningid AND lesblok = $lesblok");
    $sel = mysqli_fetch_object($selectie);
    
    $histoire = mysqli_query($connectie, "UPDATE historie SET plmid = $plmid, lokaalid = $lokaalid WHERE subplanningid = $sel->subplanningid");
    
}
 
for($x = 1; $x <= 20; $x++){
if(isset($_POST["blok-$x"])){
    


        $insertinsert = "INSERT INTO subplanning(plmid, lokaalid, lesstofid, koppeling, begintijd, eindtijd, planningid, lesblok) VALUES($plmid, $lokaalid, $lesstofid, '$opmerkingen', '$begintijd', '$eindtijd', $subplanning->planningid, ".$_POST["blok-$x"].")";
        $updateinsert = mysqli_query($connectie, $insertinsert);
        echo $insertinsert . '<br />';
    $query = mysqli_query($connectie, "SELECT MAX(subplanningid) as subid FROM subplanning");
    $fetch = mysqli_fetch_object($query);
    
    $historie = mysqli_query($connectie, "INSERT INTO historie(subplanningid, jaar, week, lesblok, lokaalid, plmid, lesstofid, groepid) VALUES($fetch->subid, $jaarnr, $weeknr, ".$_POST["blok-$x"].", $lokaalid, $plmid, $lesstofid, $groepnr)");


}
}


$stofupdate = "UPDATE lesstof SET inhoud = '$koppeling' WHERE lesstofid = $lesstofid";
$deupdate = mysqli_query($connectie, $stofupdate);



header("location: lesdelete.php?groepnr=$groepnr&jaarnr=$jaarnr&weeknr=$weeknr");
?>