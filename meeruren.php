<?php
session_start();
include 'database.php';



?>
<script>
for(x = 1; x <= 20; x++){
    var test = document.getElementById('check'+x).value;
    var check = document.getElementById('check'+x).value;
    <?php
    $check = mysqli_query($connectie, "SELECT * FROM subplanning WHERE planningid = ".$_SESSION['uren']."");
    
    while($doublecheck = mysqli_fetch_object($check)){
   echo " 
   
   if(test == $doublecheck->lesblok){
   document.getElementById('check'+x).disabled = true;
   }

   ";
    }
    ?>
}

</script>
<br />
<table style='font-family:Tahoma;'>

<tr id='kzth'>

<td id='kzth'></td>
<td id='kzth' width='100' align='center'>Maandag</td>
<td id='kzth' width='100' align='center'>Dinsdag</td>
<td id='kzth' width='100' align='center'>Woensdag</td>
<td id='kzth' width='100' align='center'>Donderdag</td>
<td id='kzth' width='100' align='center'>Vrijdag</td>

</tr>

<tr id='kzth'>

<td id='kzth'>Lesblok 1</td>
<th id='kzth'><input type='checkbox' id='check1' name='ma-1' value='1' style='width:25px; height:25px;'<?php if($_SESSION['les'] == 1){
    echo " checked disabled";
} ?> /></th>
<th id='kzth'><input type='checkbox' id='check2' name='di-1' value='2' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 2){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check3' name='wo-1' value='3' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 3){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check4' name='do-1' value='4' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 4){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check5' name='vr-1' value='5' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 5){
    echo " checked disabled";
} ?>/></th>

</tr>

<tr id='kzth'>

<td id='kzth'>Lesblok 2</td>
<th id='kzth'><input type='checkbox' id='check6' name='ma-2' value='6' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 6){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check7' name='di-2' value='7' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 7){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check8' name='wo-2' value='8' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 8){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check9' name='do-2' value='9' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 9){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check10' name='vr-2' value='10' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 10){
    echo " checked disabled";
} ?>/></th>

</tr>

<tr id='kzth'>

<td id='kzth'>Lesblok 3</td>
<th id='kzth'><input type='checkbox' id='check11' name='ma-3' value='11' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 11){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check12' name='di-3' value='12' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 12){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check13' name='wo-3' value='13' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 13){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check14' name='do-3' value='14' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 14){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check15' name='vr-3' value='15' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 15){
    echo " checked disabled";
} ?>/></th>

</tr>

<tr id='kzth'>

<td id='kzth'>Lesblok 4</td>
<th id='kzth'><input type='checkbox' id='check16' name='ma-4' value='16' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 16){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check17' name='di-4' value='17' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 17){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check18' name='wo-4' value='18' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 18){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check19' name='do-4' value='19' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 19){
    echo " checked disabled";
} ?>/></th>
<th id='kzth'><input type='checkbox' id='check20' name='vr-4' value='20' style='width:25px; height:25px;' <?php if($_SESSION['les'] == 20){
    echo " checked disabled";
} ?>/></th>

</tr>

</table>