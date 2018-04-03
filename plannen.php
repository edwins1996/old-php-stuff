<?php
session_start();
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
include 'database.php';


      
      
      
// Ophalen jaar/week/groep
    $weeknr = $_GET["weeknr"];
    $jaarnr = $_GET["jaarnr"];
    $groepnr = $_GET["groepnr"];
// SQL queries
$groepquery = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");
$groepquery2 = mysqli_query($connectie, "SELECT * FROM niveaus");
$lesstofquery = mysqli_query($connectie, "SELECT * FROM lesstof ORDER BY lesstofnaam");
$lesstofquery2 = mysqli_query($connectie, "SELECT * FROM lesstof ORDER BY lesperiode");

$result = "SELECT * FROM planning WHERE jaar = " . $jaarnr . " AND weekid = " . $weeknr . " AND groepid = " . $groepnr . "";
$result2 = mysqli_query($connectie, $result);
$subplanning = mysqli_fetch_object($result2);

$rst = "SELECT * FROM planning WHERE jaar = " . $jaarnr . " AND groepid = " . $groepnr . "";
$rst2 = mysqli_query($connectie, $rst);
//$subplanning2 = mysqli_fetch_object($rst2);

$niveauquery = mysqli_query($connectie, "SELECT * FROM groepen, niveaus WHERE groepen.niveauid = niveaus.niveauid AND groepen.groepid = " . $groepnr . "");
$niveau = mysqli_fetch_object($niveauquery);

?>

<!doctype html>
<html>

<head>
<title>Plannen</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
<link rel="stylesheet" href="plm.css" />
<script type="text/javascript" src="elips.js"></script>
  <script>
      
function dat(){
          
          
var weeknr = document.forms["week-selectie"]["weeknr"].value;
var jaarnr = document.forms["week-selectie"]["jaarnr"].value;
var groepnr = document.forms["week-selectie"]["groepnr"].value;

        
location.replace("plannen.php?weeknr="+weeknr+"&jaarnr="+jaarnr+"&groepnr="+groepnr);
  }
      
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var weeknr = document.forms["week-selectie"]["weeknr"].value;
    var jaarnr = document.forms["week-selectie"]["jaarnr"].value;
    var groepnr = document.forms["week-selectie"]["groepnr"].value;

    var lesstofid = data.substring(7,200);
    //alert(data.substring(0,6))
  if(data.substring(0,6) == "insert"){
      location.replace("rooster"+data.substring(0,6)+".php?jaar="+jaarnr+"&weeknr="+weeknr+"&groepid="+groepnr+"&lesstof="+lesstofid+"&lesblok="+ev.target.id+"&plmnr=0&lokaalid=0")
  }
    else if(data.substring(0,6) == "update"){
        location.replace("rooster"+data.substring(0,6)+".php?jaar="+jaarnr+"&weeknr="+weeknr+"&groepid="+groepnr+"&subplanningid="+lesstofid+"&lesblok="+ev.target.id+"&plmnr=0")
    }
	

}

function lesTerug(ev){
    
   ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var weeknr = document.forms["week-selectie"]["weeknr"].value;
    var jaarnr = document.forms["week-selectie"]["jaarnr"].value;
    var groepnr = document.forms["week-selectie"]["groepnr"].value;

    var subplanningid = data.substring(7,200);

    var histoire = confirm("Wilt u deze les ook uit de historie verwijderen?");
    
    if(histoire == true){
        location.replace("lesdeleteandhistorie.php?groepnr="+ groepnr +"&subplanningid="+ subplanningid +"&jaarnr="+ jaarnr +"&weeknr="+ weeknr);
    }else{
        location.replace("lesdelete.php?groepnr="+ groepnr +"&subplanningid="+ subplanningid +"&jaarnr="+ jaarnr +"&weeknr="+ weeknr);
    }
    
    
}

function vakform(){
    document.getElementById("vak-form").submit();
}      
function resetalert(){
          
          var res = confirm('Weet u het zeker?');
          
          if(res == true){
              location.replace("roosterreset.php?groepid=<?php echo $groepnr; ?>&weeknr=<?php echo $weeknr; ?>&jaarnr=<?php echo $jaarnr; ?>");
          }
          else{
              event.preventDefault();
          }
          
      }
</script>
</head>

<body>
    

    
<div id="header">
<?php include 'menu-buttons.php';?>
    
    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 

<?php
      if(isset($_SESSION['plm-plmid'])){
    
    ?>
<script>
 function ingepland(){
    alert("De door u geselecteerde PLM'er is al ingepland op dit tijdstip.\nWanneer u dit inplant zal er een dubbel ingepland uur ontstaan.");
    
}
</script>
<?php
   echo "<script>ingepland();</script>"; 
}      
?>
</div>    

<div id="pagina">

    

    
    

<div id="content">
    <h1 style="font-family:Tahoma;">Rooster</h1>
    <br />
    
    
        
    <br />
    <div id="menu-lijst">
        <div id='menulijst-p' style='font-family:Tahoma; font-weight:bold;'>In te plannen lessen:</div><br />
    <div id="menu-lijst-2" ondrop='lesTerug(event)' ondragover='allowDrop(event)'>
    
    <?php


    while ($stof = mysqli_fetch_object($lesstofquery)){
    if($niveau->niveauid == $stof->niveauid){ 
     // if(mysqli_num_rows($result2) != 0){  
    
          
          $lesteller = 0;
          $sqlsub = "SELECT * FROM planning WHERE groepid = " . $groepnr . "";
          $querysub = mysqli_query($connectie, $sqlsub);
          
         
          while($subsub = mysqli_fetch_object($querysub)){
              $resultaat = "SELECT * FROM subplanning WHERE lesstofid = $stof->lesstofid AND planningid = $subsub->planningid";
              
              $debug = mysqli_query($connectie, $resultaat);
            
              $lesteller = $lesteller + mysqli_num_rows($debug);
           
            
          }

      
        if($lesteller == 0  && $stof->duur != 'herhaalbaar'){
            
               
        echo '<div id="insert-' . $stof->lesstofid . '" draggable="true" ondragstart="drag(event)" style="background-color:#DFDFDF; border-radius:5px; border:1px solid; font-family:Tahoma; padding-left:5px; padding-right:-5px; margin-top:3px;">' . $stof->lesstofnaam . '</div>'; 
            
        }
  
        //}
    }
    }
 
    ?>
        </div>
    </div>
    <br />
    
    <div id="menu-lijst">
        <div id='menulijst-p' style='font-family:Tahoma; font-weight:bold;'>Herhaalbare lessen:</div><br />
    <div id="menu-lijst-2" ondrop='lesTerug(event)' ondragover='allowDrop(event)'>
    
    <?php


    while ($stof2 = mysqli_fetch_object($lesstofquery2)){
    
     // if(mysqli_num_rows($result2) != 0){  
    
          
          $lesteller = 0;
          $sqlsub = "SELECT * FROM planning WHERE groepid = " . $groepnr . "";
          $querysub = mysqli_query($connectie, $sqlsub);
          
         
          while($subsub = mysqli_fetch_object($querysub)){
              $resultaat = "SELECT * FROM subplanning WHERE lesstofid = $stof2->lesstofid AND planningid = $subsub->planningid";
              
              $debug = mysqli_query($connectie, $resultaat);
            
              $lesteller = $lesteller + mysqli_num_rows($debug);
           
            
          }

      
        if($stof2->duur == 'herhaalbaar'){
            
               
        echo '<div id="insert-' . $stof2->lesstofid . '" draggable="true" ondragstart="drag(event)" style="background-color:#8594d1; border-radius:5px; border:1px solid; font-family:Tahoma; padding-left:5px; padding-right:-5px; margin-top:3px;">' . $stof2->lesstofnaam . '</div>'; 
            
        }
  
        //}
    
    }
 
    ?>
        </div>
    </div>
    
    
    
    
    
    
    <div id="planning-raster">
        
	    <div id='les-add-delete'>    
    <a href="lescreate.php?niv=<?php echo $groepnr; ?>">
        <button style="float:right;">Toevoegen</button>
    </a>
    
            <a href="pdf.php?groepid=<?php echo $groepnr; ?>&weeknr=<?php echo $weeknr; ?>&jaarnr=<?php echo $jaarnr; ?>">
        <button style="float:right; margin-right:5px;">Downloaden</button>
        </a>
            <a href="#">
        <button style="float:right; margin-right:5px;" onclick="resetalert();">Reset</button>
        </a>
    </div>
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
       <span>Groep:</span>            
<select id="groepnr" name="groep" onChange="dat();">            
<?php
  while ($records = mysqli_fetch_object($groepquery)) {
      echo '<option value="' . $records->groepid . '"';
       if($groepnr==$records->groepid){echo ' selected';} 
      echo '>' . $records->niveaunaam . '-' . $records->regionaam . '-' . $records->cohort . '</option>'.chr(10);
  }        
            
?>
</select>
            


       <!-- <input type="button" onClick="dat();" value="Selecteer" />-->
        </form><br />

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
                    
            
                echo "<td class='plm$les->plmid'><div id='update-$les->subplanningid' draggable='true' ondragstart='drag(event)' style='font-size:12px; font-family:Tahoma; min-height: 57px; padding-top:3px;'>$les->lesstofnaam<br />$plmuitkomst->naam<br />Lokaal: $lokaaluitkomst->lokaalnaam";
                if($les->begintijd != "" && $les->eindtijd != ""){echo "<br /><img src=icons/alert.png width=10 height=10 /> $les->begintijd - $les->eindtijd";}
                elseif($les->begintijd != ""){echo "<br /><img src=icons/alert.png width=10 height=10 /> $les->begintijd";}
                elseif($les->eindtijd != ""){echo "<br /><img src=icons/alert.png width=10 height=10 /> $les->eindtijd";}
                echo "<div id='edit'><a href='lesbewerken.php?plm=$les->plmid&lesstofid=$les->lesstofid&lokaal=$les->lokaalid&weeknr=$weeknr&jaarnr=$jaarnr&groepnr=$groepnr&lesblok=$lesblok'><img src=icons/edit.png width=10 height=10 /></a></div></div></td>".chr(10);  
                }
                else{
            echo "<td id='lesblok-$lesblok' style='background-color:transparent;' ondrop='drop(event)' ondragover='allowDrop(event)' width='145' height='60'></td>".chr(10);
                }
                
                
                }
            else{
                 echo "<td id='lesblok-$lesblok' style='background-color:transparent;' ondrop='drop(event)' ondragover='allowDrop(event)' width='145' height='60'></td>".chr(10);
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
        <?php
      echo "<div style='font-family:Tahoma; float:right; position:relative;'>";
          $firstllid = mysqli_query($connectie, "SELECT * FROM leerlingen WHERE groepid = $groepnr");
          if(mysqli_num_rows($firstllid) == 0){
              echo "Er bevinden zich nog geen leerlingen in deze groep.";
          }else{
      if(mysqli_num_rows($result2) != 0){
          
          $leerlingidfirst = mysqli_fetch_object($firstllid);
       echo "<a style='text-decoration:none; color:blue;' href='competentieview.php?lesper=$subplanning->lesperiode&groep=$groepnr&llid=$leerlingidfirst->leerlingid'>Lesperiode: $subplanning->lesperiode</a>";
      }
      elseif(mysqli_num_rows($result2) == 0){
          echo "Lesperiode:<form style='margin:0px; position:absolute;' method='POST' id='vak-form' action='vakinsert.php?week=$weeknr&jaar=$jaarnr&groep=$groepnr'>
          <select name='vakweek' onchange='vakform();'>";
          $getal = 0;
          $grpselect = mysqli_query($connectie, "SELECT * FROM groepen WHERE groepid = $groepnr");
          $grpuitlz = mysqli_fetch_object($grpselect);
          if($grpuitlz->niveauid == 1){
              $getal = 17;
          }
          elseif($grpuitlz->niveauid == 2){
              $getal = 27;
          }
          echo "<option value=''></option>";
          for($x = 1; $x < $getal; $x++){
              $vakuse = mysqli_query($connectie, "SELECT * FROM planning WHERE groepid = $groepnr AND lesperiode = $x");
              if(mysqli_num_rows($vakuse) == 0){
              echo "<option value='$x'>$x</option>";
              }
          }
          echo "</select></form>";
      }
          }
      
      
      
      echo "</div>";
      ?>

           <table  id='tabel2'>
               <tr id='kzth'><td id='kzth' style='height:36px;'><strong></strong></td></tr>
               <tr id='kzth'><td id='kzth' style='height:60px;'><strong>08.30-10.00</strong></td></tr>
               <tr id='kzth'><td id='kzth' style='height:60px;'><strong>10.15-11.45</strong></td></tr>
               <tr id='kzth'><td id='kzth' style='height:50px;'><strong>Lunch</strong></td></tr>
               <tr id='kzth'><td id='kzth' style='height:60px;'><strong>12.45-14.15</strong></td></tr>
               <tr id='kzth'><td id='kzth' style='height:60px;'><strong>14.30-16.00</strong></td></tr>
        </table>
    </div>

</div>
    <?php include 'footer.php'; ?>
    </div>   
    
</body>
</html>
<?php
unset($_SESSION['plm-plmid']);
  }
else{
    header ('location: login.php');
}
}
else{
    header ('location: login.php');
}
?>