<?php
include 'database.php';
$lokaalid = $_POST['lokaalid'];
$lokaalnaam = $_POST['lokaalnaam'];

$select = mysqli_query($connectie, "SELECT * FROM lokaal");

while($var = mysqli_fetch_object($select)){

    if($lokaalid == crypt($var->lokaalid, 'LICT')){
    $realid = $var->lokaalid;
    
$lokaalquery = "UPDATE lokaal SET lokaalnaam = $lokaalnaam WHERE lokaalid = $realid";    
$lokaalupdate = mysqli_query($connectie, $lokaalquery);    

    }
}
header("location: wijzigen.php?keuze=Lokaal&id=$realid");
?>