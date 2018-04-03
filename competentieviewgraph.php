<?php
include 'database.php';
session_start();

$vakwk = $_GET['lesper'];
$groepid = $_GET['groep'];
$llid = $_GET['llid'];

$korparray = array('Klantgericht', 'Flexibel', 'Resultaatgericht');
$offarray = array('Analyseren', 'Besluitvaardig', 'Communiceren', 'Flexibel', 'Initiatief', 'Klantgericht', 'Nauwkeurig', 'Stressbestendig', 'Verantwoordelijk');

// Groepen ophalen
$groepen = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");

// Leerlingen ophalen
$leerlingen = mysqli_query($connectie, "SELECT * FROM leerlingen WHERE groepid = $groepid");


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
    <body style='background-color:#DEDEDE;'>
        <h1 style="font-family:Tahoma;">Competenties<a href=# onclick="window.top.close();" style="float:right; margin-right:10px; text-decoration:none;">Sluiten</a></h1>
        
        <div id='chart_div' style='width:auto; height:700px;'></div>
    </body>
</html>