<?php
include '../database.php';
$foto = $_GET["foto"];
$pic = "SELECT * FROM lesstof WHERE inhoud LIKE '%$foto%'";
$photo = mysqli_query($connectie, $pic);
if(mysqli_num_rows($photo) == 0){
unlink("../Afbeeldingschrijven/img/$foto"); 
header("Location:../lists/documentlist.php");
}
elseif(mysqli_num_rows($photo) != 0){
        echo "<body style='background-color: orange; font-family:Tahoma;'>";
    echo "Deze foto wordt gebruikt als inhoud van een les,<br />
    en kan derhalve niet worden verwijderd.
    <br /><br />
    <a href='afbeeldingenbeheer.php?type=Afbeelding'><button>Terug</button></a>
    ";
    echo "</body>";
}
//header("Location: afbeeldingenbeheer.php");

?>