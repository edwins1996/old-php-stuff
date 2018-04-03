<?php
include 'database.php';

$query = mysqli_query($connectie, "SELECT * FROM plm");

$fp = fopen('plm.css', 'w');
while($plm = mysqli_fetch_object($query)){
fwrite($fp,    ".plm$plm->plmid{".chr(10));
fwrite($fp,    "background-color:$plm->achtergrondkleur;".chr(10));
fwrite($fp, "color:$plm->letterkleur;".chr(10));
fwrite($fp,"}".chr(10));
}

fclose($fp);


?>