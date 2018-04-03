<?php
include 'database.php';
session_start();

$wijzig = $_POST['wijzig-text'];
$groepid = $_POST['groepid'];

$groep1 = "UPDATE groepen SET opmerkingen = '$wijzig' WHERE groepid = $groepid";
$groep = mysqli_query($connectie, $groep1);
//echo $groep1;

if(isset($_SESSION['groep'])){
    unset($_SESSION['groep']);
  header("location: groepen.php?groep=$groepid");  
}else{
header("location: lessen-historiek.php?id=$groepid");
}

?>