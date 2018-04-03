<?php
include 'database.php';
session_start();

$lesstofid = $_POST['lesid'];
$lesnaam = $_POST['lesnaam'];
$lesinhoud = $_POST['lesinhoud'];
$lesniveau = $_POST['lesniveau'];
$herhaalbaar = $_POST['herhaalbaar'];
$lestitel = $_POST['lestitel'];

$select = mysqli_query($connectie, "SELECT * FROM lesstof");


while($var = mysqli_fetch_object($select)){

if($lesstofid == crypt($var->lesstofid, 'LICT')){
    echo crypt($var->lesstofid, 'LICT') . ' / ' . $lesstofid . '<br />';
 
$realid = $var->lesstofid;
    echo $realid;
    
$lesstofquery = "UPDATE lesstof SET niveauid = $lesniveau, lesstofnaam = '$lesnaam', inhoud = '$lesinhoud', duur = '$herhaalbaar', lesstoftitel = '$lestitel' WHERE lesstofid = $realid";
    
    echo '<br />' . $lesstofquery;
$lesstofupdate = mysqli_query($connectie, $lesstofquery);
}
}




?>



<?php


header("location: wijzigen.php?keuze=Les&id=$realid");
?>