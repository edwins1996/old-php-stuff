<?php
//include("../connect.php");

$fp = fopen('image_list.js', 'w');
fwrite($fp, 'var tinyMCEImageList = new Array('.chr(13));
chdir('../Afbeeldingschrijven/img');
$d = dir(".");

		$inhoud="";
while (false !== ($entry = $d->read())) {
    if($entry!="."&&$entry!=".." && substr($entry, -3) == 'jpg'){
        
if ($inhoud!=""){$inhoud=$inhoud.",";}
        
$inhoud=$inhoud."[\"$entry\", \"http://10.0.0.221/ELIPS/Afbeeldingschrijven/img/$entry\"]".chr(13);
    
    }
}
$d->close();
echo $inhoud;
fwrite($fp,$inhoud);
fwrite($fp, ');');
fclose($fp);
?>

		
<?php	
//header('location: ../lists/documentlist2.php');
header('location: ../Afbeeldingschrijven/afbeeldingenbeheer.php?type=Afbeelding');
?>