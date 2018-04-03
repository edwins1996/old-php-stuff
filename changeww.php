<?php
session_start();
include 'database.php';

$ww1 = $_POST['nieuw-ww1'];
$ww2 = $_POST['nieuw-ww2'];

if($ww1 != $ww2){
    $_SESSION['changeNotOk'] = 'wachtwoorden niet gelijk';
    header('location: keuzemenu.php');
}
elseif($ww1 == $ww2 && $_SESSION['functie'] == 'PLM'){
    $wwquery = mysqli_query($connectie, "UPDATE plm SET wachtwoord = '".md5($ww2)."' WHERE psid = '".$_SESSION['gebrnaam']."'");
    $_SESSION['gebrww'] = md5($ww2);
    header('location: keuzemenu.php');
}






?>