<?php
$bestand = $_GET['type'];

if($bestand == 'Afbeelding'){
header('location: documentlist.php');
}
elseif($bestand == 'Document'){
    header('location: documentlist2.php');
}




?>