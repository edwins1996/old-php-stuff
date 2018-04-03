<?php

session_start();
include 'database.php';

// $_GETS
$vakweekid = $_GET['lesperiode'];
$jaar = $_GET['jaar'];
$week = $_GET['week'];


$korparray = array('Klantgericht', 'Flexibel', 'Resultaatgericht');
$offarray = array('Analyseren', 'Besluitvaardig', 'Communiceren', 'Flexibel', 'Initiatief', 'Klantgericht', 'Nauwkeurig', 'Stressbestendig', 'Verantwoordelijk');

// Ophalen niveau van leerling
$llniv = mysqli_query($connectie, "SELECT * FROM leerlingen, groepen WHERE leerlingen.psnummer = ".$_SESSION['gebrnaam']." AND leerlingen.groepid = groepen.groepid");
$llniveau = mysqli_fetch_object($llniv);

$groepid = $llniveau->groepid;
$llid = $llniveau->leerlingid;

// Niveau ophalen indien al ingevuld
if($vakweekid != ''){
$bekendniveau = mysqli_query($connectie, "SELECT * FROM competenties WHERE leerlingid = $llniveau->leerlingid AND lesperiode = $vakweekid");
$atmniveau = mysqli_fetch_object($bekendniveau);
}
else{
    
}

if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'Leerling'){
?>
<!doctype html>
<html>

<head>
<title>Competenties</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
<link rel="stylesheet" href="plm.css" />
    <style>
      
                rect:first-of-type{
            fill:transparent;
        }
    
    </style>
<script type="text/javascript" src="charts/gstatic-charts.js"></script>
<script>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            
          ['Lesperiode', 
          
           <?php
      $groepsel = mysqli_query($connectie, "SELECT * FROM groepen WHERE groepid = $groepid");
      $groepniv = mysqli_fetch_object($groepsel);
      
      if($groepniv->niveauid == 1){
            for($x = 0; $x < count($korparray); $x++){
                echo "'$korparray[$x]',";
            }     
      }
      elseif($groepniv->niveauid == 2){
            for($x = 0; $x < count($offarray); $x++){
                echo "'$offarray[$x]',";
            }     
      }
      
           ?>
           
          
          ],
            
        <?php 
      
      if($groepniv->niveauid == 1){
          $compkorp = mysqli_query($connectie, "SELECT * FROM competenties WHERE leerlingid = $llid ORDER BY lesperiode");
          
          while($korpcomp = mysqli_fetch_object($compkorp)){
              
         echo " ['$korpcomp->lesperiode',";
         for($x = 0; $x < count($korparray); $x++){
             $korpo1 = $korparray[$x];
        echo  "".$korpcomp->$korpo1.", ";
              }
              echo "],";
          }
      }
      elseif($groepniv->niveauid == 2){
          $compkorp = mysqli_query($connectie, "SELECT * FROM competenties WHERE leerlingid = $llid ORDER BY lesperiode");
          
          while($korpcomp = mysqli_fetch_object($compkorp)){
              
         echo " ['$korpcomp->lesperiode',";
         for($x = 0; $x < count($offarray); $x++){
             $oof1 = $offarray[$x];
        echo  "".$korpcomp->$oof1.", ";
              }
              echo "],";
          }
      }
      ?>
        ]);

        var options = {
            
                   <?php 
      echo "
          chart: {";
      $naamll = mysqli_query($connectie, "SELECT * FROM leerlingen WHERE leerlingid = $llid");
      $namell = mysqli_fetch_object($naamll);
      echo "title: 'Competenties $namell->voornaam $namell->tussenvoegsel $namell->achternaam',
            subtitle: 'Weergegeven per lesperiode',
            ";
          ?>
          },
                 
          bars: 'vertical', // Required for Material Bar Charts.

        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
          
        chart.draw(data, options);
      }
     </script>
</head>

<body>
    

    
<div id="header">
  
    
    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 
<?php
 echo "<a href='leerling-rooster.php?weeknr=".date('W')."&jaarnr=".date('Y')."'><button id='button3' style='margin-right:5px;'>Mijn rooster</button></a>";

?>
</div>    

<div id="pagina">
   

    
    

<div id="content">
    
 <?php
// Vakweek ophalen
    $query = mysqli_query($connectie, "SELECT * FROM planning WHERE weekid = $week AND jaar = $jaar AND groepid = $llniveau->groepid");
      $queryresult = mysqli_fetch_object($query);
     
      
      if($vakweekid == ''){
          echo "Er is (nog) geen competentie invulschema voor deze week.";
      }
      elseif($vakweekid != $queryresult->lesperiode){
         // if($vakweekid != $queryresult->vakweek){
             // echo "Er is (nog) geen competentie invulschema voor deze week.";
          //}
      }
      elseif($vakweekid == $queryresult->lesperiode){
      echo "   <h1 style='font-family:Tahoma;'>Competenties lesperiode $vakweekid</h1>";
      
?>
    <div style='float:right; width:600px; height:400px; margin-right:30px;'>
      <div id='chart_div' style='width:600px; height:400px;'></div> 
    <p style='float:right;'><a href='competentieviewgraph.php?lesper=<?php echo $vakweekid; ?>&groep=<?php echo $groepid; ?>&llid=<?php echo $llid; ?>' target="_blank">Grote grafiek</a></p>
    </div>
    <?php
echo "<form action='llcompinsert.php' method='POST'>    
    
    <table style='border-collapse:collapse;'>
    <tr id='kzth'>
        <th id='kzth' style='width:150px; height:40px; text-align:left; font-size:20px; font-family:Tahoma;'>Competenties</th>
        </tr>";
             

      
      
      
      if($llniveau->niveauid == 1){
          
          echo "<input type='hidden' value='$jaar' name='jaar' />";
          echo "<input type='hidden' value='$week' name='week' />";
          echo "<input type='hidden' value='$llniveau->groepid' name='groep' />";
          echo "<input type='hidden' value='$vakweekid' name='vakweek' />";
          
          
      for($x = 0; $x < count($korparray); $x++) {
          echo "<tr id='kzth'><td id='kzth' style='width:150px; height:40px; text-align:left; font-family:Tahoma;'>$korparray[$x]</td> <td id='kzth'>
          
          <select name='$korparray[$x]'>";
          
          for($niv = 0; $niv < 5; $niv++){
          echo "<option value='$niv'";
              if(mysqli_num_rows($bekendniveau)!= 0){ 
                  
                  $korpo = $korparray[$x];
                  if($niv == $atmniveau->$korpo){echo " selected";}
              
              }
              
              echo ">Niveau $niv</option>";
        
              
          }
          echo "</select>
          </td>
          
          </tr>";
      }
      }
        elseif($llniveau->niveauid == 2){
            
          echo "<input type='hidden' value='$jaar' name='jaar' />";
          echo "<input type='hidden' value='$week' name='week' />";
          echo "<input type='hidden' value='$llniveau->groepid' name='groep' />";
          echo "<input type='hidden' value='$vakweekid' name='vakweek' />";
            
      for($x = 0; $x < count($offarray); $x++) {
          echo "<tr id='kzth'><td id='kzth' style='width:150px; height:40px; text-align:left; font-family:Tahoma;'>$offarray[$x]<hr></td>
          <td id='kzth'>
          
          <select name='$offarray[$x]'>";
          
          for($niv = 0; $niv < 5; $niv++){
          echo "<option value='$niv'";
              if(mysqli_num_rows($bekendniveau)!= 0){
                  $oof = $offarray[$x];
                  
                  if($niv == $atmniveau->$oof){echo " selected";}
              }
              
              echo ">Niveau $niv</option>";
        
              
          }
          echo "</select><hr>
          </td>
          
          </tr>";
      }
      }
                ?>
            
       
<?php
echo "    
    </table>
    <input type=submit value='Opslaan' />
    </form>";
      }
          
echo "</div>";
          include 'footer.php'; ?>
<?php
echo" </div> ";
    ?>
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