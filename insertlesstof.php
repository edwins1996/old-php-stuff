<?php
include 'database.php';

$lesniveau = $_POST['lesniveau'];
$lesinhoud = $_POST['lesinhoud'];
$lesnaam = $_POST['lesnaam'];
$herhaalbaar = $_POST['herhaalbaar'];
$lestitel = $_POST['lestitel'];

$insertquery = "INSERT INTO lesstof(niveauid, lesstofnaam, inhoud, duur, lesstoftitel) VALUES($lesniveau, '$lesnaam', '$lesinhoud', '$herhaalbaar', '$lestitel')";
$insertlesstof = mysqli_query($connectie, $insertquery);

header('location: toevoegen.php?keuze=Les');

?>