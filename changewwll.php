<?php
session_start();
include 'database.php';

$ww1 = $_POST['nieuw-ww1'];
$ww2 = $_POST['nieuw-ww2'];

if($ww1 != $ww2){
    $_SESSION['changeNotOk'] = 'wachtwoorden niet gelijk';
    header('location: leerling-rooster.php');
    echo 'HOI';
}
elseif($ww1 == $ww2 && $_SESSION['functie'] == 'Leerling'){
    $wwquery = mysqli_query($connectie, "UPDATE leerlingen SET wachtwoord = '".md5($ww2)."' WHERE leerlingid = '".$_SESSION['id']."'");
    $_SESSION['gebrww'] = md5($ww2);
    header("location: leerling-rooster.php?weeknr=".date('W')."&jaarnr=".date('Y')."");
    echo md5($ww2);
}






?>