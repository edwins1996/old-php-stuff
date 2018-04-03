<?php
include 'database.php';
session_start();
$docentid = $_POST['plmid'];
$wachtwoord = md5($_POST['wachtwoord']);

$SQL1 = "SELECT * FROM plm WHERE plmid = $docentid AND wachtwoord = '$wachtwoord'";
$SQL = mysqli_query($connectie, $SQL1);


if(mysqli_num_rows($SQL) != 0){
$docentquery = "DELETE FROM plm WHERE plmid = $docentid";
$docentverwijder = mysqli_query($connectie, $docentquery);
    $SQL1 = mysqli_query($connectie, "SELECT * FROM plm");
    $fetch = mysqli_fetch_object($SQL1);
header("location: verwijderen.php?keuze=Docent&id=$fetch->plmid");
    
}else{
    $_SESSION['status'] = 'Niet Ok';
    
    header("location: verwijderen.php?keuze=Docent&id=$docentid");

}



?>