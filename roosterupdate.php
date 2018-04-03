<?php
session_start();
include 'database.php';

$jaar = $_GET['jaar'];
$weeknr = $_GET['weeknr'];
$groepid = $_GET['groepid'];
$subplanningid = $_GET['subplanningid'];
$lesblok = $_GET['lesblok'];
$les = substr($lesblok, 8);

//echo $jaar . ' / ' . $weeknr . ' / ' . $groepid . ' / ' . $lesstof . ' / ' . $les . '<br />';

$result2 = mysqli_query($connectie, "SELECT * FROM planning WHERE jaar = " . $jaar . " AND weekid = " . $weeknr . "");
$subplanningid2 = mysqli_fetch_object($result2);
?>

<script>
 function ingepland(){
    alert("De door u geselecteerde PLM'er is al ingepland op dit tijdstip.\nWanneer u dit inplant zal er een dubbel ingepland uur ontstaan.");
    
}
</script>


<?php
$result = mysqli_query($connectie, "SELECT * FROM planning WHERE jaar = " . $jaar . " AND weekid = " . $weeknr . " AND groepid = " . $groepid . "");
//echo mysqli_num_rows($result);




   $finfo = mysqli_fetch_object($result);
    $planningid = $finfo->planningid;



// Alert tijdens updaten
$plmselect = mysqli_query($connectie, "SELECT * FROM subplanning WHERE subplanningid = $subplanningid");

$plm = mysqli_fetch_object($plmselect);
echo mysqli_num_rows($plmselect);
echo '<br />'. $planningid . ' / ' . $les . ' / ' . $plm->plmid;
$plmingepland = "SELECT * FROM planning, subplanning WHERE planning.planningid = subplanning.planningid AND planning.weekid = $weeknr AND planning.jaar = $jaar AND subplanning.lesblok = $les AND subplanning.plmid = $plm->plmid";
$plmgepland = mysqli_query($connectie, $plmingepland);
echo '<br />'.$plmingepland. ' / ' . mysqli_num_rows($plmgepland);
if(mysqli_num_rows($plmgepland) != 0){
            $_SESSION['plm-plmid'] = 'Ingepland';
            //echo "<script>ingepland();</script>";
        }

$query = mysqli_query($connectie, "UPDATE subplanning SET lesblok = $les WHERE planningid = $planningid AND subplanningid = $subplanningid");

// Update query voor historie
$historiequery = mysqli_query($connectie, "UPDATE historie SET lesblok = $les WHERE groepid = $groepid AND subplanningid = $subplanningid");

$kwerie = mysqli_query($connectie, "SELECT * FROM planning WHERE planningid = $planningid");
$pagina = mysqli_fetch_object($kwerie);
//header ("refresh: 0.01; URL=plannen.php?weeknr=$pagina->weekid&jaarnr=$pagina->jaar&groepnr=$pagina->groepid");

header ("location: plannen.php?weeknr=$pagina->weekid&jaarnr=$pagina->jaar&groepnr=$pagina->groepid");

?>
