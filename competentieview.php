<?php
session_start();
include  'database.php';

$vakwk = $_GET['lesper'];
$groepid = $_GET['groep'];
$llid = $_GET['llid'];

$korparray = array('Klantgericht', 'Flexibel', 'Resultaatgericht');
$offarray = array('Analyseren', 'Besluitvaardig', 'Communiceren', 'Flexibel', 'Initiatief', 'Klantgericht', 'Nauwkeurig', 'Stressbestendig', 'Verantwoordelijk');

// Groepen ophalen
$groepen = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");

// Leerlingen ophalen
$leerlingen = mysqli_query($connectie, "SELECT * FROM leerlingen WHERE groepid = $groepid");


if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
      

      
      
  ?>
  
  <!doctype html>
<html>

<head>
<title>Leerlingen competenties</title>
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
        echo  "".$korpcomp->$korparray[$x].", ";
              }
              echo "],";
          }
      }
      elseif($groepniv->niveauid == 2){
          $compkorp = mysqli_query($connectie, "SELECT * FROM competenties WHERE leerlingid = $llid ORDER BY lesperiode");
          
          while($korpcomp = mysqli_fetch_object($compkorp)){
              
         echo " ['$korpcomp->lesperiode',";
         for($x = 0; $x < count($offarray); $x++){
        echo  "".$korpcomp->$offarray[$x].", ";
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
    
    <?php
    echo "<script>
    function grpchange(){
       
        var llid = document.forms['comp-ll-view']['comp-ll-select'].value;
        
        location.replace('competentieview.php?lesper=$vakwk&groep=$groepid&llid='+llid);
    }
    
    </script>";
    ?>
    
<div id="header">
<?php include 'menu-buttons.php';?>
    
    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 



</div>    

<div id="pagina">

    
    

    

<div id="content">
    <h1 style="font-family:Tahoma;">Competenties</h1>  
  <div style='float:right; width:600px; height:400px; margin-right:30px;'>
      <div id='chart_div' style='width:600px; height:400px;'></div> 
    <p style='float:right;'><a href='competentieviewgraph.php?lesper=<?php echo $vakwk; ?>&groep=<?php echo $groepid; ?>&llid=<?php echo $llid; ?>' target="_blank">Grote grafiek</a></p>
    </div>
  <form id='comp-ll-view' method="get" >

    <select id='comp-ll-select' onchange='grpchange();'>
      
    <?php
        
    while($leerling = mysqli_fetch_object($leerlingen)){
        
        echo "<option value='$leerling->leerlingid'";
        if($leerling->leerlingid == $llid){echo " selected";}
        echo ">$leerling->voornaam $leerling->tussenvoegsel $leerling->achternaam</option>";
        
    }    
    
    ?>  
      
    </select>
    
    
    </form>
  <br />
  
  <?php
      // Ophalen competenties uit db
      $comp = mysqli_query($connectie, "SELECT * FROM competenties WHERE leerlingid = $llid AND lesperiode = $vakwk");
      $comp1 = mysqli_fetch_object($comp);
    
      $llsql = mysqli_query($connectie, "SELECT * FROM leerlingen, groepen WHERE leerlingen.groepid = groepen.groepid AND leerlingen.groepid = $groepid AND leerlingen.leerlingid = $llid");
      $llsql1 = mysqli_fetch_object($llsql);
      
      
      if($llsql1->niveauid == 1){
        if(mysqli_num_rows($comp) == 0){
              echo "Deze leerling heeft zijn/haar competenties nog niet ingevuld";
          }
          else{
          echo "<table>
          <tr id='kztr'><th id='kztr' align='left'>Competentie<hr></th><th id='kztr' align='left'>Niveau<hr></th></tr>
          ";
          for($x = 0; $x < count($korparray); $x++){
              echo "<tr id='kztr'><td id='kztr'>$korparray[$x]<hr></td><td id='kztr' align='center'>".$comp1->$korparray[$x] . "<hr></td></tr>";
          }
          echo "</table>";
          }
      }
      elseif($llsql1->niveauid == 2){
          if(mysqli_num_rows($comp) == 0){
              echo "Deze leerling heeft zijn/haar competenties nog niet ingevuld";
          }
          else{
          echo "<table>
          <tr id='kztr'><th id='kztr' align='left'>Competentie<hr></th><th id='kztr' align='left'>Niveau<hr></th></tr>
          ";
          for($x = 0; $x < count($offarray); $x++){
              echo "<tr id='kztr'><td id='kztr'>$offarray[$x]<hr></td><td id='kztr' align='center'>".$comp1->$offarray[$x] . "<hr></td></tr>";
          }
          echo "</table>";
          }
      }
      
      ?>
  
 
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