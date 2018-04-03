<?php
chdir('../Afbeeldingschrijven/img');
$d = dir(".");
while (false !== ($entry = $d->read())) {
    if($entry!="."&&$entry!=".."){
   echo "<img src='../Afbeeldingschrijven/img/$entry'>$entry<br>";
}
}
$d->close();
?> 