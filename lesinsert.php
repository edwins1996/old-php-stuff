<?php
include 'database.php';

$lesnaam = $_POST['lesnaam'];
$niveauid = $_POST['niveau'];
$vakinhoud = $_POST['vakinhoud'];
$herhaalbaar = $_POST['herhaalbaar'];
$lestitel = $_POST['lestitel'];


$query ="INSERT INTO lesstof(niveauid, lesstofnaam, inhoud, duur, lesstoftitel) VALUES($niveauid, '$lesnaam', '$vakinhoud', '$herhaalbaar', '$lestitel')";
 mysqli_query($connectie, $query);

echo $query;
header('location: location.php');
?>