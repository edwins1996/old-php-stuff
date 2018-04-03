<?php
session_start();
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
include 'database.php';

$lesstofid = $_GET['lesstofid'];

$lesquery = mysqli_query($connectie, "SELECT * FROM lesstof");
$detailsquery = mysqli_query($connectie, "SELECT * FROM niveaus, lesstof WHERE lesstofid = $lesstofid AND niveaus.niveauid = lesstof.niveauid");
$lesdetails = mysqli_fetch_object($detailsquery);
?>
<html>
<head>
<title>Les verwijderen</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
<link rel="stylesheet" href="plm.css" />

<script>
function url(){
var a = document.forms["testje"]["ooktest"].value;
location.replace("lesverwijderen.php?lesstofid="+a);
}

</script>
</head>
<body>
<div id="header">
<?php include 'menu-buttons.php';?>
    
    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 



</div>    

<div id="pagina">
<div id="content">
    <h1 style="font-family:Tahoma;">Les verwijderen</h1>


<form id="testje" action="lesdefdelete.php" method="POST">
<select id="ooktest" name="lesselectie" onChange="url();">
<?php
while($les = mysqli_fetch_object($lesquery)){
    
echo "<option value='$les->lesstofid'";
    if($les->lesstofid == $lesstofid){echo " selected";}
   echo ">$les->lesstofnaam</option>";
    
}
?>
</select>
 <br /><br />
 <input type="submit" value="Verwijderen" />
 </form>
 <h3>Lesdetails:</h3>
 <p id='test'>
<span><b>Niveau:</b></span><br /><?php echo $lesdetails->niveaunaam; ?><br /><br />
<span><b>Vaknummer:</b></span><br /><?php echo $lesdetails->vaknummer; ?><br /><br />
<span><b>Lesnaam:</b></span><br /><?php echo $lesdetails->lesstofnaam; ?><br /><br />
<span><b>Inhoud:</b></span><br /><?php echo $lesdetails->inhoud; ?>

</p>
<br /><br /><a href="location.php"><button>Terug</button></a>
</div>
    <?php include 'footer.php'; ?>
    </div>   
    </body>
    </html>
<?php
}
else{
    header ('location: login.php');
}
}
else{
    header ('location: login.php');
}
?>
