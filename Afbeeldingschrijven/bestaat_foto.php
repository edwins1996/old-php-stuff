<?php
$aantal = 0;
$fotonaam = $_POST["foto"];
chdir('../Afbeeldingschrijven/img');
$d = dir(".");
while (false !== ($entry = $d->read())) {
   if($fotonaam == $entry){
       $aantal = $aantal+1;
   }
}
$d->close();

echo $aantal;

?>