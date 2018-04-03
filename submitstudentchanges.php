<?php
include 'database.php';


$studentid = $_POST['studentid'];
$studentgroepid = $_POST['studentgroepid'];
$studentvoornaam = $_POST['studentvoornaam'];
$studenttussenvoegsel = $_POST['studenttussenvoegsel'];
$studentachternaam = $_POST['studentachternaam'];
$studentpsnummer = $_POST['studentpsnummer'];
$studenttelefoon = $_POST['studenttelefoon'];
$studentemail = $_POST['studentemail'];
$studentschoolnaam = $_POST['studentschoolnaam'];
$studentwwoord = $_POST['studentwwoord'];
$studentopmerking = $_POST['studentopmerking'];

$select = mysqli_query($connectie, "SELECT * FROM leerlingen");

while($var = mysqli_fetch_object($select)){

    if($studentid == crypt($var->leerlingid, 'LICT')){
    
        $realid = $var->leerlingid;
if($studentwwoord != ''){ 
$studentquery = "UPDATE leerlingen SET voornaam = '$studentvoornaam', tussenvoegsel = '$studenttussenvoegsel', achternaam = '$studentachternaam', psnummer = $studentpsnummer, groepid = $studentgroepid, telefoonnummer = '$studenttelefoon', emailadres = '$studentemail', schoolid = $studentschoolnaam, wachtwoord = '".md5($studentwwoord)."', opmerkingen = '$studentopmerking' WHERE leerlingid = $realid";
echo $studentquery;

$studentupdate = mysqli_query($connectie, $studentquery);
}elseif($studentwwoord == ''){
    $studentquery = "UPDATE leerlingen SET voornaam = '$studentvoornaam', tussenvoegsel = '$studenttussenvoegsel', achternaam = '$studentachternaam', psnummer = $studentpsnummer, groepid = $studentgroepid, telefoonnummer = '$studenttelefoon', emailadres = '$studentemail', schoolid = $studentschoolnaam, opmerkingen = '$studentopmerking' WHERE leerlingid = $realid";
echo $studentquery;

$studentupdate = mysqli_query($connectie, $studentquery);
}
    }
}
header("location: wijzigen.php?keuze=Student&id=$realid");
?>