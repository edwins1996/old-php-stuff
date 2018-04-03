<?php
session_start();
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
include 'database.php';
$plmnr = $_GET['plmnr'];
$jaar = $_GET['jaar'];
$weeknr = $_GET['weeknr'];
$groepid = $_GET['groepid'];
$lesstof = $_GET['lesstof'];
$lesblok = $_GET['lesblok'];
$lokaalid = $_GET['lokaalid'];
$les = substr($lesblok, 8);
$_SESSION['les'] = $les;
      
//echo $jaar . ' / ' . $weeknr . ' / ' . $groepid . ' / ' . $lesstof . ' / ' . $les . '<br />';
// PlanningidQueries
$result = mysqli_query($connectie, "SELECT * FROM planning WHERE jaar = " . $jaar . " AND weekid = " . $weeknr . " AND groepid = " . $groepid . "");
$lestijden = mysqli_query($connectie, "SELECT * FROM planning WHERE jaar = " . $jaar . " AND weekid = " . $weeknr . " AND groepid = " . $groepid . "");
$result2 = mysqli_query($connectie, "SELECT * FROM planning WHERE jaar = " . $jaar . " AND weekid = " . $weeknr . "");
//echo mysqli_num_rows($result);
// PLM ingepland



if(mysqli_num_rows($result) == 0){

$query = mysqli_query($connectie, "INSERT INTO planning(planningid, weekid, groepid, jaar) VALUES ('', '$weeknr', '$groepid', '$jaar')");
    $planningid = mysqli_insert_id($connectie);
        $subplanningid = mysqli_fetch_object($result2);

    $plmingepland = "SELECT * FROM subplanning, planning WHERE planning.planningid = subplanning.planningid AND subplanning.plmid = $plmnr AND subplanning.lesblok = $les AND planning.weekid = $weeknr AND planning.jaar = $jaar";
    $plmgepland = mysqli_query($connectie, $plmingepland);
     $lokaalingepland = "SELECT * FROM subplanning, planning WHERE planning.planningid = subplanning.planningid AND subplanning.lokaalid = $lokaalid AND subplanning.lesblok = $les AND planning.weekid = $weeknr AND planning.jaar = $jaar";
   $lokaalgepland = mysqli_query($connectie, $lokaalingepland);

  //  echo '<br />' . mysqli_num_rows($plmgepland);
  //  echo '<br />' . $plmingepland;
}
else{
   $finfo = mysqli_fetch_object($result);
    $planningid = $finfo->planningid;
    $subplanningid = mysqli_fetch_object($result2);

    $plmingepland = "SELECT * FROM subplanning, planning WHERE planning.planningid = subplanning.planningid AND subplanning.plmid = $plmnr AND subplanning.lesblok = $les AND planning.weekid = $weeknr AND planning.jaar = $jaar";
    $plmgepland = mysqli_query($connectie, $plmingepland);
     $lokaalingepland = "SELECT * FROM subplanning, planning WHERE planning.planningid = subplanning.planningid AND subplanning.lokaalid = $lokaalid AND subplanning.lesblok = $les AND planning.weekid = $weeknr AND planning.jaar = $jaar";
   $lokaalgepland = mysqli_query($connectie, $lokaalingepland);
   // echo '<br />' . mysqli_num_rows($plmgepland);
   // echo '<br />' . $plmingepland;
}
// QUERY voor meeruren.php
$moreuren = mysqli_query($connectie, "SELECT * FROM subplanning WHERE planningid = $planningid");
$urenmore = mysqli_fetch_object($moreuren);
      if(mysqli_num_rows($moreuren) != 0){
$_SESSION['uren'] = $urenmore->planningid;
      }

?>
<html>
<head>
    <title>Les plannen</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
<link rel="stylesheet" href="plm.css" />
    <script src="jquery/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#uur").click(function(){
        $("#morehours").load('meeruren.php');
    });
});
    
    function dat(){
          
          
var weeknr = document.forms["invoersub"]["weeknr"].value;
var jaarnr = document.forms["invoersub"]["jaar"].value;
var groepnr = document.forms["invoersub"]["groepid"].value;
var lesstof = document.forms["invoersub"]["lesstof"].value;
var lesblok = document.forms["invoersub"]["lesblok"].value;
var plmnr = document.forms["invoersub"]["plm"].value;
var lokaalid = document.forms["invoersub"]["lokaal"].value;

        
location.replace("roosterinsert.php?jaar="+jaarnr+"&weeknr="+weeknr+"&groepid="+groepnr+"&lesstof="+lesstof+"&lesblok="+lesblok+"&plmnr="+plmnr+"&lokaalid="+lokaalid);
  }
function ingepland(){
    alert("De door u geselecteerde PLM'er en lokaal zijn al ingepland op dit tijdstip.\nWanneer u dit inplant zal er een dubbel ingepland uur ontstaan.");
    
}
    function ingepland1(){
    alert("De door u geselecteerde PLM'er is al ingepland op dit tijdstip.\nWanneer u dit inplant zal er een dubbel ingepland uur ontstaan.");
    
}
    function ingepland2(){
    alert("Het door u geselecteerde lokaal is al ingepland op dit tijdstip.\nWanneer u dit inplant zal er een dubbel ingepland uur ontstaan.");
    
}
    function uren(){
        
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
    <h1 style="font-family:Tahoma;">Les inplannen</h1>
    <br />
    <?php
    $plm = mysqli_query($connectie, "SELECT * FROM plm");
    $lokaal = mysqli_query($connectie, "SELECT * FROM lokaal");
    $lokaal2 = mysqli_query($connectie, "SELECT * FROM lokaal");
    
    
    ?>
    <form id="invoersub" method="POST" action="invoersubplanning.php">
    <input name="planningid" value="<?php echo $planningid; ?>" type="hidden" />
    
    <input name="lesstof" id="lesstof" value="<?php echo $lesstof; ?>" type="hidden" />
    <input name="jaar" id="jaar" value="<?php echo $jaar; ?>" type="hidden" />
    <input name="weeknr" id="weeknr" value="<?php echo $weeknr; ?>" type="hidden" />
    <input name="groepid" id="groepid" value="<?php echo $groepid; ?>" type="hidden" />
    <input name="lesblok" id="lesblok" value="<?php echo $lesblok; ?>" type="hidden" />
    <span>PLM'er</span><br />
    <select id="plm" name="PLM"  onChange="dat();"> 
        <option value='0'></option>
        <?php
        while($plmer = mysqli_fetch_object($plm)){
            echo '<option value="' . $plmer->plmid . '"';
            if($plmnr == $plmer->plmid){echo " selected";}
            
            echo '>' . $plmer->naam . '</option>';
        }
        ?>        
    </select><?php 
        
      if(isset($_SESSION['plmstatus'])){
          echo "<span style='color:red;'> &nbsp;Vul dit vak a.u.b.</span>";
          unset($_SESSION['plmstatus']);
      }
        
        ?>

        <br/><br />
        <span>Lokaal:</span><br />
            <select id="lokaal" name="lokaal" onChange="dat();">
                <option value='0'></option>
        <?php
        while($row = mysqli_fetch_object($lokaal2)){
            echo '<option value="' . $row->lokaalid . '"';
            if($lokaalid == $row->lokaalid){echo " selected";}
            echo '>' . $row->lokaalnaam . '</option>';
        }
        ?>        
    </select><?php 
        
      if(isset($_SESSION['lokaalstatus'])){
          echo "<span style='color:red;'> &nbsp;Vul dit vak a.u.b.</span>";
          unset($_SESSION['lokaalstatus']);
      }
        
        ?>
        <br /><br />
        <span>Andere lestijden:</span><br />
        <?php
        $lestijd = mysqli_fetch_object($lestijden);
      
        
        echo "<table><tr id='kzth'><td id='kzth'>Begintijd:</td><td id='kzth'><input type='time' name='begintijd' value='--:--' size=4/></td></tr>"  ; 
        echo "<tr id='kzth'><td id='kzth'>Eindtijd:</td><td id='kzth'><input type='time' name='eindtijd' value='--:--' size=4/></td></tr></table>"  ; 
        
        ?>
        <br /><br />
        <button id='uur' type='button'>Meer uren</button>
        <div id='morehours'></div>
        <br /><br />
        <span>Lesperiode:</span><br />
        <?php
                  $getal = 0;
          $grpselect = mysqli_query($connectie, "SELECT * FROM groepen WHERE groepid = $groepid");
          $grpuitlz = mysqli_fetch_object($grpselect);
          if($grpuitlz->niveauid == 1){
              $getal = 17;
          }
          elseif($grpuitlz->niveauid == 2){
              $getal = 27;
          }
      $lesperiode = mysqli_query($connectie, "SELECT * FROM planning WHERE planningid = $planningid");
      $lesperi = mysqli_fetch_object($lesperiode);
      
      ?>
        <select name='vakweek'>
        
        <?php 
      // Vakweek ophalen indien al ingevoerd
           

          echo "<option value=''></option>";
          echo "<option value='$lesperi->lesperiode' selected>$lesperi->lesperiode</option>";
          for($x = 1; $x < $getal; $x++){
$vakuse = mysqli_query($connectie, "SELECT * FROM planning WHERE groepid = $groepid AND lesperiode = $x");
              if(mysqli_num_rows($vakuse) == 0){
            
                 
              echo "<option value='$x'";
                  if($x == $lesperi->lesperiode){echo " selected"; }
                  echo ">$x</option>";
              
                  } 
         
              }
              
         
      
      ?>
        
        </select><br /><br />
        
        <input type="submit" value="Opslaan" />
        <?php
        echo "<div id='ingepland'>";
        if(mysqli_num_rows($plmgepland) != 0 && mysqli_num_rows($lokaalgepland) != 0){
            echo "<div style='color:red;'>PLM'er is reeds ingepland op dit tijdstip.</div>";
            echo "<div style='color:red;'>Lokaal is reeds ingepland op dit tijdstip.</div>";
            echo "<script>ingepland();</script>";
        }
      elseif(mysqli_num_rows($lokaalgepland) != 0){
            echo "<div style='color:red;'>Lokaal is reeds ingepland op dit tijdstip.</div>";
            echo "<script>ingepland2();</script>";
        }
        elseif(mysqli_num_rows($plmgepland) != 0){
            echo "<div style='color:red;'>PLM'er is reeds ingepland op dit tijdstip.</div>";
            echo "<script>ingepland1();</script>";
        }
        echo "</div>";
        
        ?>
    
    </form>
    
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