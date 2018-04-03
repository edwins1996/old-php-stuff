<?php
ob_start();
session_start();
include 'database.php';


// Ophalen jaar/week/groep
    $weeknr = $_GET["weeknr"];
    $jaarnr = $_GET["jaarnr"];

// GROEP QUERY
$groepquery = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");
// Groep huidige ingelogde persoon
$huidiggroepquery = mysqli_query($connectie, "SELECT groepid FROM leerlingen WHERE leerlingid = '".$_SESSION['id']."'");
$huidigegroep = mysqli_fetch_object($huidiggroepquery);   



$result = "SELECT * FROM planning WHERE jaar = " . $jaarnr . " AND weekid = " . $weeknr . " AND groepid = " . $huidigegroep->groepid . "";
$result2 = mysqli_query($connectie, $result);
$subplanning = mysqli_fetch_object($result2);
 

// Vakweek ophalen
$vakweekid = mysqli_query($connectie, "SELECT * FROM planning WHERE jaar = " . $jaarnr . " AND weekid = " . $weeknr . " AND groepid = " . $huidigegroep->groepid . "");
$vakweekresult = mysqli_fetch_object($vakweekid);
 

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
        a{
            text-decoration: none;
            color:black;
        }
    
    </style>
      <script>
      
function dat(){
          
          
var weeknr = document.forms["week-selectie"]["weeknr"].value;
var jaarnr = document.forms["week-selectie"]["jaarnr"].value;


        
location.replace("leerling-rooster.php?weeknr="+weeknr+"&jaarnr="+jaarnr);
  }
    </script>
</head>

<body>
    

    
<div id="header">
  
    
    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 
<a href='llcompetenties.php?lesperiode=<?php if(mysqli_num_rows($vakweekid) != 0){ echo $vakweekresult->lesperiode;} ?>&week=<?php echo $weeknr;
 ?>&jaar=<?php echo $jaarnr; ?>'><button id='button3' style='margin-right:5px;'>Competenties</button></a>


</div>    

<div id="pagina">
   

    
    

<div id="content">
    <h1 style="font-family:Tahoma; line-height:20px;">Mijn rooster</h1>
    <h4 style="font-family:Tahoma; line-height:15px;">     <?php
      if(mysqli_num_rows($vakweekid) != 0){
      echo "Lesperiode $vakweekresult->lesperiode";
      }
    ?></h4>
    
    
<form id="week-selectie" method="GET" action="">
        <span>Week:</span>
	<select id="weeknr" name="weeknr" onChange="dat();">
	
	<?php
	for ($x = 1; $x <=53; $x++){
		echo "<option value=" . $x ;
        if($x==$weeknr){echo " selected";}    
            echo ">" . $x . "</option>".chr(10);
	}
	?>
	</select>
             <span>Jaar:</span>
	<select id="jaarnr" name="jaar" onChange="dat();">
        
        <?php 
        for ($i = -1; $i < 2;$i++){
            $jaar=date("Y")+$i;
            echo "<option value=\"$jaar\"";
            if($jaarnr==$jaar){echo " selected";} 
            echo ">$jaar</option>".chr(10);
        }
        
        ?>
     
    </select>
  


       <!-- <input type="button" onClick="dat();" value="Selecteer" />-->
        </form>
  <br />  
     <table id='tabel'>
  <?php
    $week_start = new DateTime();
$week_start->setISODate($jaarnr,$weeknr);
$datum=$week_start->format('Y-m-d');
    ?>  
    <tr>
    <th width="145" height="29">MAANDAG<br /><?php
        echo date("d-m-Y",strtotime($datum));
        ?></th>        
    <th>DINSDAG<br /><?php
        echo date("d-m-Y",strtotime("+1 days",strtotime($datum)));
        ?></th>        
    <th>WOENSDAG<br /><?php
        echo date("d-m-Y",strtotime("+2 days",strtotime($datum)));
        ?></th>        
    <th>DONDERDAG<br /><?php
        echo date("d-m-Y",strtotime("+3 days",strtotime($datum)));
        ?></th>        
    <th>VRIJDAG<br /><?php
        echo date("d-m-Y",strtotime("+4 days",strtotime($datum)));
        ?></th>        
    </tr>    
        
    <tr>
        <?php
    $teller = 1;
        for ($lesblok = 1; $lesblok < 21; $lesblok++){
            
            if(mysqli_num_rows($result2) != 0){  
            $sql1 = "SELECT * FROM subplanning, lesstof WHERE subplanning.lesstofid = lesstof.lesstofid AND subplanning.planningid = $subplanning->planningid AND lesblok = $lesblok";
            $query1 = mysqli_query($connectie, $sql1);
                
                
                if(mysqli_num_rows($query1) != 0){
              $les = mysqli_fetch_object($query1);    
            
            // Query voor  naam PLM'er
            $plmquery = mysqli_query($connectie, "SELECT * FROM plm WHERE plmid = $les->plmid");        
            $plmuitkomst = mysqli_fetch_object($plmquery);
            // Query voor lokaalnummer
            $lokaalquery = mysqli_query($connectie, "SELECT * FROM lokaal WHERE lokaalid = $les->lokaalid");
            $lokaaluitkomst = mysqli_fetch_object($lokaalquery);
                    
            
                echo "<td class=plm$les->plmid><div id='$les->subplanningid' style='font-size:13px;'>$les->lesstofnaam<br />$plmuitkomst->naam<br />Lokaal: $lokaaluitkomst->lokaalnaam";
                if($les->begintijd != "" && $les->eindtijd != ""){echo "<br /><img src=icons/alert.png width=10 height=10 /> $les->begintijd - $les->eindtijd";}
                elseif($les->begintijd != ""){echo "<br /><img src=icons/alert.png width=10 height=10 /> $les->begintijd";}
                elseif($les->eindtijd != ""){echo "<br /><img src=icons/alert.png width=10 height=10 /> $les->eindtijd";}
                
                echo "<div id='attach'><a href='attachment.php?plm=$les->plmid&lesstofid=$les->lesstofid&lokaal=$les->lokaalid&weeknr=$weeknr&jaarnr=$jaarnr&groepnr=$huidigegroep->groepid&lesblok=$lesblok'><img src=icons/attachment.png width=10 height=10 /></a></div></div></td>".chr(10);  
                }
                else{
            echo "<td id='lesblok-$lesblok' style='background-color:transparent;' width='145' height='60'></td>".chr(10);
                }
                
                
                }
            else{
                 echo "<td id='lesblok-$lesblok' style='background-color:transparent;' width='145' height='60'></td>".chr(10);
            }
            
            
            
            $teller++;
            
            if($teller == 6 || $teller == 11 || $teller == 16){
                echo "</tr><tr>".chr(10);
            }
            if ($teller == 11){
                for ($pauze = 1; $pauze <= 5; $pauze++){
                    echo "<td style='background-color:#9b9d9b;' width='145' height='50'><strong style='font-family:Tahoma;'><center>PAUZE</center></strong></td>".chr(10);
                }
                echo "</tr><tr>".chr(10);
            }
        }
        
        ?>

    </tr>    
        
       
    </table>

</div>
         <?php include 'footer.php'; ?>

 </div>  
  <?php

if($_SESSION['gebrww'] == md5('wachtwoord')){
    
    
    
echo "    <div id='changeww'>

      
    
    </div>
    <div id='wwchange'><h1><span>Wachtwoord</span></h1><p><span>Uw wachtwoord is nog niet gewijzigd,</span><br /><span>U dient deze nu te wijzigen:</span></p>
        <form action='changewwll.php'method='POST'>
        <span style='font-size:13px;'>Nieuw wachtwoord:</span>
            <input type='password' name='nieuw-ww1' required/><br />
        <span style='font-size:13px;'>Herhaal wachtwoord:</span>
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