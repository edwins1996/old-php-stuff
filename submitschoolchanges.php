<?php
include 'database.php';
$schoolid = $_POST['schoolid'];
$schoolnaam = $_POST['schoolnaam'];
$schooladres = $_POST['schooladres'];
$schoolpostcode = $_POST['schoolpostcode'];
$schoolplaats = $_POST['schoolplaats'];
$schooltelefoon = $_POST['schooltelefoon'];
$schoolpoc = $_POST['schoolpoc'];
$schoolemail = $_POST['schoolemail'];
$schoolopmerking = $_POST['schoolopmerking'];

/*echo $schoolnaam . '<br />';
echo $schooladres . '<br />';
echo $schoolpostcode . '<br />';
echo $schoolplaats . '<br />';
echo $schooltelefoon . '<br />';
echo $schoolpoc . '<br />';
echo $schoolemail . '<br />';*/

$select = mysqli_query($connectie, "SELECT * FROM scholen");

while($var = mysqli_fetch_object($select)){

if($schoolid == crypt($var->schoolid, 'LICT')){    
//    echo $schoolid . '<br />';
$realid = $var->schoolid;    
    
$query = "UPDATE scholen SET schoolnaam = '$schoolnaam', adres = '$schooladres', postcode = '$schoolpostcode', plaatsnaam = '$schoolplaats', telefoonnummer = '$schooltelefoon', POC = '$schoolpoc', email = '$schoolemail', opmerkingen = '$schoolopmerking' WHERE schoolid = $realid";
//echo $query;

$schoolupdate = mysqli_query($connectie, $query);

    
}
}

header("location:  wijzigen.php?keuze=School&id=$realid");
?>