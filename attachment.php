<?php
ob_start();
session_start();
include 'database.php';


// Ophalen jaar/week/groep
    $weeknr = $_GET["weeknr"];
    $jaarnr = $_GET["jaarnr"];
    $lesblok = $_GET["lesblok"];

// GROEP QUERY
$groepquery = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");
// Groep huidige ingelogde persoon
$huidiggroepquery = mysqli_query($connectie, "SELECT groepid FROM leerlingen WHERE leerlingid = '".$_SESSION['id']."'");
$huidigegroep = mysqli_fetch_object($huidiggroepquery);   



$result = "SELECT * FROM planning, subplanning, lokaal, plm, lesstof WHERE planning.planningid = subplanning.planningid AND planning.jaar = $jaarnr AND planning.weekid = $weeknr AND planning.groepid = $huidigegroep->groepid AND subplanning.lesblok = $lesblok AND subplanning.lokaalid = lokaal.lokaalid AND subplanning.plmid = plm.plmid AND subplanning.lesstofid = lesstof.lesstofid";
$result2 = mysqli_query($connectie, $result);
$subplanning = mysqli_fetch_object($result2);
      

  
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'Leerling'){
?>
<!doctype html>
<html>

<head>
<title>Mijn rooster</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
<link rel="stylesheet" href="plm.css" />
    <style>
        #mijn-rooster-href-ll{
            text-decoration: none;
            color:black;
        }
    
    </style>

</head>

<body>
    

    
<div id="header">
  

    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 

 <?php 
$week = date('W');                                         
$jaar = date('Y');                                         
                                         
echo "<a id='mijn-rooster-href-ll' href=leerling-rooster.php?weeknr=$week&jaarnr=$jaar><center>Mijn rooster</center></a>";
?>

</div>    

<div id="pagina">
   

    
    

<div id="content">
    <h1 style="font-family:Tahoma;">Lesstof lesblok <?php echo $lesblok?></h1>

  <br />  

   <table> 
<?php

echo "<tr id='kzth'><td id='kzth'>Lokaal : </td><td id='kzth'>$subplanning->lokaalnaam</td></tr>
 <tr id='kzth'><td id='kzth'>PLM'er : </td><td id='kzth'>$subplanning->naam</td></tr>   
 <tr id='kzth'><td id='kzth'>Les : </td><td id='kzth'>$subplanning->lesstofnaam</td></tr> ";
 if($subplanning->begintijd != '' && $subplanning->eindtijd != ''){
 echo "<tr id='kzth'><td id='kzth'><img src=icons/alert.png width=10 height=10 /> Aangepaste lestijd:  </td><td id='kzth'>$subplanning->begintijd - $subplanning->eindtijd <img src=icons/alert.png width=10 height=10 /></td></tr>";  
 }
elseif($subplanning->begintijd != ''){
    echo "<tr id='kzth'><td id='kzth'><img src=icons/alert.png width=10 height=10 /> Aangepaste begintijd:  </td><td id='kzth'>$subplanning->begintijd <img src=icons/alert.png width=10 height=10 /></td></tr>";  
}
      elseif($subplanning->eindtijd != ''){
    echo "<tr id='kzth'><td id='kzth'><img src=icons/alert.png width=10 height=10 /> Aangepaste eindtijd:  </td><td id='kzth'>$subplanning->eindtijd <img src=icons/alert.png width=10 height=10 /></td></tr>";  
}
      
      
 echo "<tr id='kzth'><td id='kzth'>Opmerking(en) : </td></tr><tr id='kzth'><td id='kzth'></td><td id='kzth'>";
      if($subplanning->koppeling == ''){
          echo 'Geen';
      }else{
          echo $subplanning->koppeling;
      }
          
          echo "</td></tr>";    
 echo "<tr id='kzth'><td id='kzth'>Leskoppeling(en) : </td></tr><tr id='kzth'><td id='kzth'></td><td id='kzth'>$subplanning->inhoud</td></tr>";    
    
   // leerling-rooster.php?weeknr='.date('W').'&jaarnr='.date('Y').'
?>    
    
    </table>  
</div>
         <?php include 'footer.php'; ?>

 </div>  
  <?php

if($_SESSION['gebrww'] == md5('wachtwoord')){
    
    
    
echo "    <div id='changeww'>

      
    
    </div>
    <div id='wwchange'><h1>Wachtwoord</h1><p>Uw wachtwoord is nog niet gewijzigd,<br />U dient deze nu te wijzigen:</p>
        <form action='changewwll.php'method='POST'>
        <span>Nieuw wachtwoord:</span>
            <input type='password' name='nieuw-ww1' required/><br />
        <span>Herhaal wachtwoord:</span><br />
            <input type='password' name='nieuw-ww2' required/>
        <br /><br />
            <input type='submit' value='Wijzigen' />
        ";
    if(isset($_SESSION['changeNotOk'])){
        echo "<p>Wachtwoorden komen niet overeen<br />Voer een opnieuw het wachtwoord in.</p>";
    }
    
    echo"
        </form>
    </div>";
            
            
    }
?>
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