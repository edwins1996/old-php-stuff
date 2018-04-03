<?php
session_start();
include 'database.php';

$llniv = mysqli_query($connectie, "SELECT * FROM leerlingen, groepen WHERE leerlingen.psnummer = ".$_SESSION['gebrnaam']." AND leerlingen.groepid = groepen.groepid");
$llniveau = mysqli_fetch_object($llniv);



if($llniveau->niveauid == 1){
    

$vakweek = $_POST['vakweek'];     
    
$Klantgericht = $_POST['Klantgericht'];		 
$Flexibel = $_POST['Flexibel'];		 
$Resultaatgericht = $_POST['Resultaatgericht'];	
    
$compcheck = mysqli_query($connectie, "SELECT * FROM competenties WHERE leerlingid = $llniveau->leerlingid AND lesperiode = $vakweek");
    if(mysqli_num_rows($compcheck) == 0){    
$competentiequery = mysqli_query($connectie, "INSERT INTO competenties(leerlingid, lesperiode, Klantgericht, Flexibel, Resultaatgericht) VALUES($llniveau->leerlingid, $vakweek, $Klantgericht, $Flexibel, $Resultaatgericht)");
    }
        elseif(mysqli_num_rows($compcheck) != 0){
        $competentiequery = mysqli_query($connectie, "UPDATE competenties SET Klantgericht = $Klantgericht, Flexibel = $Flexibel, Resultaatgericht = $Resultaatgericht WHERE leerlingid = $llniveau->leerlingid AND lesperiode = $vakweek");
    }
    
}
if($llniveau->niveauid == 2){
    

$vakweek = $_POST['vakweek'];    
    
$Klantgericht = $_POST['Klantgericht'];		 
$Flexibel = $_POST['Flexibel'];		 
$Analyseren = $_POST['Analyseren'];		 
$Besluitvaardig = $_POST['Besluitvaardig'];		 
$Communiceren = $_POST['Communiceren'];		 
$Initiatief = $_POST['Initiatief'];		 
$Nauwkeurig = $_POST['Nauwkeurig'];		 
$Stressbestendig = $_POST['Stressbestendig'];		 
$Verantwoordelijk = $_POST['Verantwoordelijk'];	
 
// Check of competenties al zijn ingevuld
$compcheck = mysqli_query($connectie, "SELECT * FROM competenties WHERE leerlingid = $llniveau->leerlingid AND lesperiode = $vakweek");
    
if(mysqli_num_rows($compcheck) == 0){    
$competentiequery = mysqli_query($connectie, "INSERT INTO competenties(leerlingid, lesperiode, Klantgericht, Flexibel, Analyseren, Besluitvaardig, Communiceren, Initiatief, Nauwkeurig, Stressbestendig, Verantwoordelijk) VALUES($llniveau->leerlingid, $vakweek, $Klantgericht, $Flexibel, $Analyseren, $Besluitvaardig, $Communiceren, $Initiatief, $Nauwkeurig, $Stressbestendig, $Verantwoordelijk)");  
    echo "NIET UPDATE";
}
    elseif(mysqli_num_rows($compcheck) != 0){
        $competentiequery = mysqli_query($connectie, "UPDATE competenties SET Klantgericht = $Klantgericht, Flexibel = $Flexibel, Analyseren = $Analyseren, Besluitvaardig = $Besluitvaardig, Communiceren = $Communiceren, Initiatief = $Initiatief, Nauwkeurig = $Nauwkeurig, Stressbestendig = $Stressbestendig, Verantwoordelijk = $Verantwoordelijk WHERE leerlingid = $llniveau->leerlingid AND lesperiode = $vakweek");
        echo "UPDATE";
    }

}

$week = $_POST['week'];
$jaar = $_POST['jaar'];

header("location: llcompetenties.php?lesperiode=$vakweek&week=$week&jaar=$jaar");

?>