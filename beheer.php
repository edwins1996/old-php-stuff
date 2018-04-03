<?php

session_start();
include 'database.php';
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){

?>
<!doctype html>
<html>

<head>
<title>Beheer</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
</head>

<body>
    

    
<div id="header">
<?php include 'menu-buttons.php';?>
    
    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 



</div>    

<div id="pagina">

    
    

    

<div id="content">
    <h1 style="font-family:Tahoma;">Beheer</h1>
    <br />
    <br />
    <br />
    <br />
    <center>
    <table id='keuzetabel'>
        <tr id='kztr'><th id='kzth'><a style="text-decoration:none; color:black;" href="wijzigen.php?keuze=Groep&id=<?php
		$groepid = mysqli_query($connectie, "SELECT * FROM groepen");
		$groep = mysqli_fetch_object($groepid);
		echo $groep->groepid;
		?>"><img id='beheer-icon' src='icons/edit.png' width='250' height='250' /></a></th>
            
            <th id='kzth' style='color:transparent'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th id='kzth'><a style="text-decoration:none; color:black;" href="toevoegen.php?keuze=Groep"><img id='beheer-icon' src='icons/add.png' width='250' height='250' /></a></th>
            
            <th id='kzth' style='color:transparent'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            
            <th id='kzth'><a style="text-decoration:none; color:black;" href="verwijderen.php?keuze=Groep&id=<?php
		$groepid = mysqli_query($connectie, "SELECT * FROM groepen");
		$groep = mysqli_fetch_object($groepid);
		echo $groep->groepid;
		?>"><img  id='beheer-icon' src='icons/delete.png' width='250' height='250' /></a></th></tr>
        
        
        <tr id='kztr'><th id='kzth'>&nbsp;</th></tr>
        
        
        <tr id='kztr'><th id='kzth'>
        <a id='beheer-icon' style="text-decoration:none; color:black; font-family:Tahoma;" href="wijzigen.php?keuze=Groep&id=1">Wijzigen</a></th>
            
            <th id='kzth' style='color:transparent'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            
        <th id='kzth'><a id='beheer-icon' style="text-decoration:none; color:black; font-family:Tahoma;" href="toevoegen.php?keuze=Groep">Toevoegen</a></th>
    
            <th id='kzth' style='color:transparent'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            
        <th id='kzth'><a id='beheer-icon' style="text-decoration:none; color:black; font-family:Tahoma;" href="verwijderen.php?keuze=Groep&id=1">Verwijderen</a></th></tr>
        </table>
    </center>
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