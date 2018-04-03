<?php
include 'database.php';
session_start();
$_SESSION["gebrnaam"] = $_POST['naam-gebruiker'];
$_SESSION["gebrww"] = md5($_POST['wachtw-gebruiker']);


$wwquery = "SELECT * FROM plm WHERE psid = '".$_SESSION["gebrnaam"]."' AND wachtwoord = '".$_SESSION["gebrww"]."'";
$wwquery2 = mysqli_query($connectie, $wwquery);
$wachtw = mysqli_fetch_object($wwquery2);

$lwwquery = "SELECT * FROM leerlingen WHERE psnummer = '".$_SESSION["gebrnaam"]."' AND wachtwoord = '".$_SESSION["gebrww"]."'";
$llwwquery = mysqli_query($connectie, $lwwquery);
$llwachtw = mysqli_fetch_object($llwwquery);



if($wachtw->psid == $_SESSION["gebrnaam"] && $wachtw->wachtwoord == $_SESSION["gebrww"]){
    $_SESSION['functie'] = 'PLM';
    header('location: keuzemenu.php');
    //echo 'Succesvol PLM';
}
else if($llwachtw->psnummer == $_SESSION["gebrnaam"] && $llwachtw->wachtwoord == $_SESSION["gebrww"]){
    //echo "Succesvol Leerling" . '<br />';
    $_SESSION['functie'] = 'Leerling';
    $_SESSION['id'] = $llwachtw->leerlingid;
    
    header('location: leerling-rooster.php?weeknr='.date('W').'&jaarnr='.date('Y').'');

}
else{
    echo $llwachtw->voornaam;
    $_SESSION['functie'] = 'nietcorrect';
    //echo "<br />Niet succesvol" . '<br />';
    //echo $_SESSION["gebrnaam"] . '<br />';
//echo $_SESSION["gebrww"];
    header('location: login.php');

}
    
?>