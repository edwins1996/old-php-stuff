<?php
session_start();
$input="foto";
$place="../Afbeeldingschrijven/img/";

    
	$foto1=$_FILES[$input]['tmp_name'];
        

$foto2 = str_replace(" ", "_", $_FILES[$input]['name']);
$target= $place.$foto2;
if($_FILES[$input]['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $_FILES[$input]['type'] == "application/vnd.openxmlformats-officedocument.presentationml.presentation"  || $_FILES[$input]['type'] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"   || $_FILES[$input]['type'] == "application/pdf"|| $_FILES[$input]['type'] == "text/plain"){
	echo "Hoihoi " . $_FILES[$input]['type'];
	copy($foto1,$target);
	header('location: ../lists/documentlist2.php');
}
else if($_FILES[$input]['type'] == "text/html"){
	echo "Niet goed";
	$_SESSION['status'] = 'Niet goed';
	header('location: ../lists/documentlist2.php');
}
else{
	echo "Niet goed";
	$_SESSION['status'] = 'Niet goed';
	header('location: ../lists/documentlist2.php');
}
?>