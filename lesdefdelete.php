<?php
include 'database.php';

$lesstofid = $_POST['lesselectie'];

//echo $lesstofid;

$lesverwijderquery = "DELETE FROM lesstof WHERE lesstofid = $lesstofid";

mysqli_query($connectie, $lesverwijderquery);

echo $lesverwijderquery;
header('location: location.php');
?>