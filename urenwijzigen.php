<?php
session_start();
include 'database.php';



?>
<script>
for(x = 1; x <= 20; x++){
    var test = document.getElementById('check'+x).value;
    <?php
    $check = mysqli_query($connectie, "SELECT * FROM subplanning WHERE planningid = ".$_SESSION['uren']." AND lesstofid = ".$_SESSION['uren-les']."");
    
    while($doublecheck = mysqli_fetch_object($check)){
   $gepland = mysqli_query($connectie, "SELECT * FROM subplanning WHERE planningid = ".$_SESSION['uren']." AND lesstofid != ".$_SESSION['uren-les']."");
        
        echo " 
   
   if(test == $doublecheck->lesblok){
   document.getElementById('check'+x).checked = true;
   document.getElementById('check'+x).disabled = true;
   }";
        
    while($triplecheck = mysqli_fetch_object($gepland)){    
   echo "else if(test == $triplecheck->lesblok){
   document.getElementById('check'+x).disabled = true;
   }
   ";
    }
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
<th id='kzth'><input type='checkbox' id='check1' name='blok-1' value='1' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check2' name='blok-2' value='2' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check3' name='blok-3' value='3' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check4' name='blok-4' value='4' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check5' name='blok-5' value='5' style='width:25px; height:25px;' /></th>

</tr>

<tr id='kzth'>

<td id='kzth'>Lesblok 2</td>
<th id='kzth'><input type='checkbox' id='check6' name='blok-6' value='6' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check7' name='blok-7' value='7' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check8' name='blok-8' value='8' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check9' name='blok-9' value='9' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check10' name='blok-10' value='10' style='width:25px; height:25px;' /></th>

</tr>

<tr id='kzth'>

<td id='kzth'>Lesblok 3</td>
<th id='kzth'><input type='checkbox' id='check11' name='blok-11' value='11' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check12' name='blok-12' value='12' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check13' name='blok-13' value='13' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check14' name='blok-14' value='14' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check15' name='blok-15' value='15' style='width:25px; height:25px;' /></th>

</tr>

<tr id='kzth'>

<td id='kzth'>Lesblok 4</td>
<th id='kzth'><input type='checkbox' id='check16' name='blok-16' value='16' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check17' name='blok-17' value='17' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check18' name='blok-18' value='18' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check19' name='blok-19' value='19' style='width:25px; height:25px;' /></th>
<th id='kzth'><input type='checkbox' id='check20' name='blok-20' value='20' style='width:25px; height:25px;' /></th>

</tr>

</table>