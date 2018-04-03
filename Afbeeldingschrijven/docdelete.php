<?php
include '../database.php';
$docu = $_GET["doc"];
$docdoc = "SELECT * FROM lesstof WHERE inhoud LIKE '%$docu%'";
$document = mysqli_query($connectie, $docdoc);
if(mysqli_num_rows($document) == 0){
   
unlink("../Afbeeldingschrijven/img/$docu"); 
header("Location:../lists/documentlist2.php");
}elseif(mysqli_num_rows($document) != 0){
    echo "<body style='background-color: orange; font-family:Tahoma;'>";
    echo "Dit document wordt gebruikt als inhoud van een les,<br />
    en kan derhalve niet worden verwijderd.
    <br /><br />
    <a href='afbeeldingenbeheer.php?type=Document'><button>Terug</button></a>
    ";
    echo "</body>";
}
//header("Location: afbeeldingenbeheer.php");

?>