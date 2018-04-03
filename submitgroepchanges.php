<?php
include 'database.php';

$groepid = $_POST['groepid'];
$regio = $_POST['regio'];
$cohort = $_POST['cohort'];
$niveau = $_POST['niveau'];
$opmerkingen = $_POST['opmerkingengroep'];

//echo $regio . '<br />';
//echo $cohort . '<br />';
//echo $niveau . '<br />';

$select = mysqli_query($connectie, "SELECT * FROM groepen");

while($var = mysqli_fetch_object($select)){

    if($groepid == crypt($var->groepid, 'LICT')){
    $realid = $var->groepid;
$groepquery = "UPDATE groepen SET regioid = $regio, cohort = '$cohort', niveauid = $niveau, opmerkingen = '$opmerkingen' WHERE groepid = $realid";
echo $groepquery;
$groepupdate = mysqli_query($connectie, $groepquery);

    }
}
header("location: wijzigen.php?keuze=Groep&id=$realid");

?>