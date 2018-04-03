<?php
include 'database.php';
session_start();
$plmid = $_POST['plmid'];
$plmnaam = $_POST['plmnaam'];
$plmpsid = $_POST['plmpsid'];
$plmww = $_POST['plmww'];
$nieuwplmww = $_POST['nieuw-plmww'];
$herhaalplmww = $_POST['herhaal-plmww'];
$plmtelefoon = $_POST['plmtelefoon'];
$plmachtergrond = $_POST['plmachtergrond'];
$plmletterkleur = $_POST['plmletterkleur'];

$select = mysqli_query($connectie, "SELECT * FROM plm");

while($var = mysqli_fetch_object($select)){
    
    if($plmid == crypt($var->plmid, 'LICT')){
        $realid = $var->plmid;

$plmwwquery = mysqli_query($connectie, "SELECT * FROM plm WHERE plmid = $realid");
$plmwachtwoord = mysqli_fetch_object($plmwwquery);

if(md5($plmww) == $plmwachtwoord->wachtwoord && $nieuwplmww == $herhaalplmww){

$docentquery = "UPDATE plm SET naam = '$plmnaam', psid = '$plmpsid', telefoonnummer = '$plmtelefoon', wachtwoord = '".md5($herhaalplmww)."', achtergrondkleur = '#$plmachtergrond', letterkleur = '#$plmletterkleur' WHERE plmid = $realid";
}
elseif($plmww == '' && $nieuwplmww == '' && $herhaalplmww == ''){
    $docentquery = "UPDATE plm SET naam = '$plmnaam', psid = '$plmpsid', telefoonnummer = '$plmtelefoon', achtergrondkleur = '#$plmachtergrond', letterkleur = '#$plmletterkleur' WHERE plmid = $realid";
}
elseif($nieuwplmww != $herhaalplmww || $plmww != $plmwachtwoord->wachtwoord){
    $_SESSION['wwstatus'] = 'Niet Ok';
    header("location: wijzigen.php?keuze=Docent&id=$realid");
}

    }
}
$updatedocent = mysqli_query($connectie, $docentquery);
include 'plmcss.php';

if(!isset($realid)){
    $realid = $_POST['plmid'];
    
}

header("location: wijzigen.php?keuze=Docent&id=$realid");
    
    ?>