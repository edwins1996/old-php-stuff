<?php
session_start();
include 'database.php';
// Ophalen jaar/week/groep
    $weeknr = $_GET["weeknr"];
    $jaarnr = $_GET["jaarnr"];
    $plmnr = $_GET["plmnr"];

// PLM query
$plmquery = mysqli_query($connectie, "SELECT * FROM plm");
$groepquery = mysqli_query($connectie, "SELECT * FROM groepen");
$groep = mysqli_fetch_object($groepquery);

if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){

?>


<!doctype html>
<html>

<head>
<title>Mijn rooster</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
<link rel="stylesheet" href="plm.css" />
    
    
    <script>
    function dat(){
          
          
var weeknr = document.forms["week-selectie"]["weeknr"].value;
var jaarnr = document.forms["week-selectie"]["jaarnr"].value;
var plmnr = document.forms["week-selectie"]["plmnr"].value;

        
location.replace("persrooster.php?weeknr="+weeknr+"&jaarnr="+jaarnr+"&plmnr="+plmnr);
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
    <h1 style="font-family:Tahoma;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mijn rooster</h1>
    <br />
    <form id="week-selectie" method="GET" action="">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Week:</span>
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
       <span>PLM'er:</span>            
<select id="plmnr" name="plm" onChange="dat();">            
<?php
  while ($records = mysqli_fetch_object($plmquery)) {
      echo '<option value="' . $records->plmid . '"';
       if($plmnr==$records->plmid){echo ' selected';} 
      echo '>' . $records->naam . '</option>'.chr(10);
  }        
            
?>
</select>
       <a id='historiek-button' href='lessen-historiek.php?id=<?php echo $groep->groepid; ?>&wj=<?php echo "$jaarnr-$weeknr"; ?>'>-> Leshistoriek</a>

       <!-- <input type="button" onClick="dat();" value="Selecteer" />-->
        </form>
        <div id="planning-raster-pers-rooster">
	
        
    <table id='tabel3'>
    
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
        
       
            
       //$subplanning = mysqli_fetch_object($result2);
       //echo $subplanning->planningid;
        for ($lesblok = 1; $lesblok < 21; $lesblok++){
       // Les query
            $result = "SELECT * FROM planning, subplanning WHERE planning.planningid = subplanning.planningid AND planning.jaar = $jaarnr AND planning.weekid = $weeknr AND subplanning.plmid = $plmnr";
            $result2 = mysqli_query($connectie, $result);
            
            echo "<td id='lesblok-$lesblok' style='background-color:transparent;' width='145' height='60'>";
            
            while($subplanning = mysqli_fetch_object($result2)){
            //    echo $subplanning->planningid . '<br />';
            
                
            if($subplanning->lesblok == $lesblok){
            // Hier komen lokaal, lesstof en groepsnaam
                $groepsnaamquery = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.groepid = $subplanning->groepid AND groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");
                $lesstofquery = mysqli_query($connectie, "SELECT * FROM lesstof WHERE lesstofid = $subplanning->lesstofid");
                $lokaalquery = mysqli_query($connectie, "SELECT * FROM lokaal WHERE lokaalid = $subplanning->lokaalid");
                                
                $groepsnaam = mysqli_fetch_object($groepsnaamquery);
                $lesstofnaam = mysqli_fetch_object($lesstofquery);
                $lokaalnaam = mysqli_fetch_object($lokaalquery);
                
                //echo "$groepsnaam->niveaunaam-$groepsnaam->cohort-$groepsnaam->regionaam";
              echo "<div title='Groep: \n$groepsnaam->niveaunaam-$groepsnaam->cohort-$groepsnaam->regionaam\nLokaal:\n$lokaalnaam->lokaalnaam";
              
              if($subplanning->begintijd != "" && $subplanning->eindtijd != ""){echo "\nAfwijkende tijden:\n$subplanning->begintijd - $subplanning->eindtijd";}
                elseif($subplanning->begintijd != ""){echo "\nAfwijkende begintijd:\n$subplanning->begintijd";}
                elseif($subplanning->eindtijd != ""){echo "\nAfwijkende eindtijd:\n$subplanning->eindtijd";}
              
              echo "'>$lesstofnaam->lesstofnaam</div>";
            }
            }
              echo "</td>".chr(10);
         
                 
            
            
            
            
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
        //}
        ?>

    </tr>    
        
        
    </table>
    
   
    </div>
    
    
    
    
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