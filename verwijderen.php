<?php
session_start();
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
include 'database.php';
$verwijderarray = array("Groep", "Docent", "Student", "School", "Lokaal");
$keuze = $_GET['keuze'];
$id = $_GET['id'];
?>

<!doctype html>
<html>

<head>
<title>Verwijderen</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
    
    <script>
function url(){
var a = document.forms["verwijder"]["verwijder2"].value;

if(a == 'Groep'){
<?php
$group = mysqli_query($connectie, "SELECT * FROM groepen");
$groupfetch = mysqli_fetch_object($group);
?>	
location.replace("verwijderen.php?keuze=" + a +"&id=<?php echo $groupfetch->groepid; ?>");
}
else if(a == 'Les'){
<?php
$lesson = mysqli_query($connectie, "SELECT * FROM lesstof");
$lessonfetch = mysqli_fetch_object($lesson);
?>	
location.replace("verwijderen.php?keuze=" + a +"&id=<?php echo $lessonfetch->lesstofid; ?>");	
}
else if(a == 'Docent'){
<?php
$teacher = mysqli_query($connectie, "SELECT * FROM plm");
$teacherfetch = mysqli_fetch_object($teacher);
?>
location.replace("verwijderen.php?keuze=" + a +"&id=<?php echo $teacherfetch->plmid; ?>");	
}
else if(a == 'Student'){
<?php
$students = mysqli_query($connectie, "SELECT * FROM leerlingen");
$studentsfetch = mysqli_fetch_object($students);
?>
location.replace("verwijderen.php?keuze=" + a +"&id=<?php echo $studentsfetch->leerlingid; ?>");	
}
else if(a == 'School'){
<?php
$schools = mysqli_query($connectie, "SELECT * FROM scholen");
$schoolsfetch = mysqli_fetch_object($schools);
?>
location.replace("verwijderen.php?keuze=" + a +"&id=<?php echo $schoolsfetch->schoolid; ?>");	
}
else if(a == 'Lokaal'){
<?php
$room = mysqli_query($connectie, "SELECT * FROM lokaal");
$roomfetch = mysqli_fetch_object($room);
?>
location.replace("verwijderen.php?keuze=" + a +"&id=<?php echo $roomfetch->lokaalid; ?>");	
}
}
function url2(){
    var a = document.forms["verwijder"]["verwijder2"].value;
    var b = document.forms["verwijder"]["docent"].value;
    location.replace("verwijderen.php?keuze=" + a +"&id="+b);
}
        
        function verwijderen(){
            var zeker = confirm("Weet u het zeker?");
            if (zeker == true){
                
            document.getElementById("deletedocent").submit();
            }
            else{
               
            }
        }
        function verwijderen1(){
            var zeker = confirm("Weet u het zeker?");
            if (zeker == true){
                
            document.getElementById("deletegroep").submit();
            }
            else{
               
            }
        }
        function verwijderen2(){
            var zeker = confirm("Weet u het zeker?");
            if (zeker == true){
                
            document.getElementById("deleteles").submit();
            }
            else{
               
            }
        }
        function verwijderen3(){
            var zeker = confirm("Weet u het zeker?");
            if (zeker == true){
                
            document.getElementById("deletestudent").submit();
            }
            else{
               
            }
        }
                function verwijderen4(){
            var zeker = confirm("Weet u het zeker?");
            if (zeker == true){
                
            document.getElementById("deleteschool").submit();
            }
            else{
               
            }
        }
                function verwijderen5(){
            var zeker = confirm("Weet u het zeker?");
            if (zeker == true){
                
            document.getElementById("deletelokaal").submit();
            }
            else{
               
            }
        }
        function groepverwijderen(){
            var alertt = alert("U kunt deze groep niet verwijderen.\nEr zijn nog leerlingen in deze groep ingedeeld.");
            if(alertt == true){
                event.preventDefault();
            }
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
    <h1 style="font-family:Tahoma;">Verwijderen</h1>
    
    <form id="verwijder" action="" method="POST">
    <select id="verwijder2" name="verwijder-keuze" onChange="url();">
<?php
  for($x = 0; $x < count($verwijderarray); $x++){
      echo "<option value=$verwijderarray[$x]";
      if($verwijderarray[$x] == $keuze){echo " selected";}
      echo ">$verwijderarray[$x]</option>";
  }      
        
?>
    </select>
    
        
        
       
 <?php
        
         if($keuze == 'Docent'){
    $query = mysqli_query($connectie, "SELECT * FROM plm");
    
    
        
        echo '<select id="docent" name="wijzig-keuze" onChange="url2();">';

  while($docent = mysqli_fetch_object($query)){
      echo "<option value=$docent->plmid";
      if($docent->plmid == $id){echo " selected";}
      echo ">$docent->naam</option>";
  }      
        

    echo '</select></form>';
   
    $query2 = mysqli_query($connectie, "SELECT * FROM plm WHERE plmid = $id");        
    $plmvalue = mysqli_fetch_object($query2);
    
    echo "<p>";
        
    if(isset($_SESSION['status'])){
        echo "<p style='color:red; margin:0px;'>U heeft niet het juiste wachtwoord ingevoerd.</p><br />";
        unset($_SESSION['status']);
    }    
        
        ?>
    <form action='deletedocent.php' id='deletedocent' method='POST'>
    <table>
    <?php
    echo "<input type='hidden' value='$plmvalue->plmid' name='plmid' />
    <tr id='tr'><td id='td' style='width:100px;'>Naam:</td><td id='td'><input type='text' value='$plmvalue->naam' name='plmnaam' disabled/></td></tr>
    <tr id='tr'><td id='td'>PS-nummer:</td><td id='td'><input type='text' value='$plmvalue->psid' name='plmpsid' disabled/></td></tr>
    <tr id='tr'><td id='td'>Telefoon:</td><td id='td'><input type='text' value='$plmvalue->telefoonnummer' name='plmtelefoon' disabled /></td></tr>
    <tr id='tr'><td id='td'>Wachtwoord:</td><td id='td'><input type='text' value='bij gebruiker bekend' name='plmww' disabled /></td></tr>
    <tr id='tr'><td id='td'>Achtergrondkleur:</td><td id='td'><input type='text' value='$plmvalue->achtergrondkleur' name='plmachtergrond' disabled/></td></tr>
    <tr id='tr'><td id='td'>Letterkleur:</td><td id='td'><input type='text' value='$plmvalue->letterkleur' name='plmletterkleur' disabled/></td></tr>
    <tr id='tr'><td id='td' colspan=2>&nbsp;</td></tr>
    <tr id='tr'><td id='td' colspan=2>Voer het juiste wachtwoord in om te verwijderen:</td></tr>
    <tr id='tr'><td id='td'>Wachtwoord:</td><td id='td'><input type='password' name='wachtwoord' /></td></tr>
    <tr id='tr'><td id='td' colspan=2>&nbsp;</td></tr>
    ";
    ?>
        

        
    <tr id='tr'><td id='td'><input type="button" value='Verwijderen' onclick="verwijderen();"/></td></tr>
        
    </table>
    </form>

 
       
    <?php echo "</p>";
            
            
}
        if($keuze == 'Groep'){
$groepquery = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");
    
    
        
        echo '<select id="docent" name="verwijder-keuze" onChange="url2();">';

  while ($records = mysqli_fetch_object($groepquery)) {
      echo '<option value="' . $records->groepid . '"';
       if($id==$records->groepid){echo ' selected';} 
      echo '>' . $records->niveaunaam . '-' . $records->regionaam . '-' . $records->cohort . '</option>'.chr(10);

      
  }
        
        

    echo '</select></form>';
 
    $query2 = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid AND groepid = $id");    
                    

    
    $groepvalue = mysqli_fetch_object($query2);
    
    echo "<p>";?>
    <form action='deletegroep.php' id='deletegroep' method='POST'>
    <table>
    <?php
    echo "<tr id='tr'><td id='td' style='width:100px;'>Regio:</td><td id='td'>
    
    <input type='text' name='regio' value='$groepvalue->regionaam' disabled />
    <input type='hidden' value='$groepvalue->groepid' name='groepid' />
    </td></tr>
    <tr id='tr'><td id='td'>Cohort:</td><td id='td'><input type='text' value='$groepvalue->cohort' name='cohort' disabled /></td></tr>
    <tr id='tr'><td id='td'>Niveau:</td><td id='td'>
    <input type='text' name='niveau' value='$groepvalue->niveaunaam' disabled />    
    </td></tr>
    ";
            
            $SQL = mysqli_query($connectie, "SELECT * FROM leerlingen WHERE groepid = $groepvalue->groepid");
            
    if(mysqli_num_rows($SQL) == 0){
   echo "<tr id='tr'><td id='td'><input type='button' value='Verwijderen' onclick='verwijderen1();'/></td></tr>";
    }else{
   echo "<tr id='tr'><td id='td'><input type='button' value='Verwijderen' onclick='groepverwijderen();'/></td></tr>";
    }
     ?>   
    </table>
    </form>
    <?php echo "</p>";
                    
                    
}
        if($keuze == 'Les'){
    $query = mysqli_query($connectie, "SELECT * FROM lesstof");
    
    
        
        echo '<select id="docent" name="verwijder-keuze" onChange="url2();">';

  while($lesstof = mysqli_fetch_object($query)){
      echo "<option value=$lesstof->lesstofid";
      if($lesstof->lesstofid == $id){echo " selected";}
      echo ">$lesstof->lesstofnaam</option>";
  }      
        

    echo '</select></form>';
    
    $query2 = mysqli_query($connectie, "SELECT * FROM lesstof, niveaus WHERE lesstofid = $id AND niveaus.niveauid = lesstof.niveauid"); 
    $lesvalue = mysqli_fetch_object($query2);
    
    
    echo "<p>";?>
    <form action='deletelesstof.php' id='deleteles' method='POST'>
    <table>
    <?php
    echo "<input type='hidden' value='$lesvalue->lesstofid' name='lesid' /><tr id='tr'><td id='td' style='width:100px;'>Lesnaam:</td><td id='td'>
    <input type='text' value='$lesvalue->lesstofnaam' name='lesnaam' disabled /></td></tr>
    <tr id='tr'><td id='td'>Inhoud:</td><td id='td'><input type='text' value='$lesvalue->inhoud' name='lesinhoud' disabled /></td></tr>
    <tr id='tr'><td id='td'>Niveau:</td><td id='td'>
    <input type='text' name='niveau' value='$lesvalue->niveaunaam' disabled />
    </td></tr>
    <tr id='tr'><td id='td'>Vaknummer:</td><td id='td'><input type='number' value='$lesvalue->vaknummer' name='lesnummer' disabled /></td></tr>
    ";
    ?>
    <tr id='tr'><td id='td'><input type="button" value='Verwijderen' onclick="verwijderen2();"/></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";
          
}
        
        if($keuze == 'Student'){
    $query = mysqli_query($connectie, "SELECT * FROM leerlingen");
    
    
        
        echo '<select id="docent" name="verwijder-keuze" onChange="url2();">';

  while($student = mysqli_fetch_object($query)){
      echo "<option value=$student->leerlingid";
      if($student->leerlingid == $id){echo " selected";}
      echo ">$student->voornaam $student->tussenvoegsel $student->achternaam</option>";
  }      
        

    echo '</select></form>';
            
    $query2 = mysqli_query($connectie, "SELECT * FROM leerlingen, scholen WHERE leerlingid = $id AND scholen.schoolid = leerlingen.schoolid");        
    $studentvalue = mysqli_fetch_object($query2);
    $groepen = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");
    $groep = mysqli_fetch_object($groepen);        
            
   
    
    echo "<p>";?>
    <form action='deletestudent.php' id='deletestudent' method='POST'>
    <table>
    <?php
    echo "<tr id='tr'><td id='td' style='width:100px;'>Voornaam:</td><td id='td'><input type='hidden' value='$studentvalue->leerlingid' name='studentid' /><input type='text' value='$studentvalue->voornaam' name='studentvoornaam' disabled/></td></tr>
    <tr id='tr'><td id='td'>Tussenvoegsel:</td><td id='td'><input type='text' value='$studentvalue->tussenvoegsel' name='studenttussenvoegsel' disabled/></td></tr>
    <tr id='tr'><td id='td'>Achternaam:</td><td id='td'><input type='text' value='$studentvalue->achternaam' name='studentachternaam' disabled/></td></tr>
    <tr id='tr'><td id='td'>PS-nummer:</td><td id='td'><input type='text' value='$studentvalue->psnummer' name='studentpsnummer' disabled/></td></tr>
    <tr id='tr'><td id='td'>Telefoon:</td><td id='td'><input type='text' value='$studentvalue->telefoonnummer' name='studenttelefoon' disabled/></td></tr>
    <tr id='tr'><td id='td'>E-mail:</td><td id='td'><input type='text' value='$studentvalue->emailadres' name='studentemail' disabled/></td></tr>
    <tr id='tr'><td id='td'>Groep:</td><td id='td'>
    <input type='text' value='$groep->niveaunaam-$groep->cohort-$groep->regionaam' disabled/>       
    </td></tr>
    <tr id='tr'><td id='td'>Schoolnaam:</td><td id='td'>
    
    <input type='text' value='$studentvalue->schoolnaam' disabled />
    </td></tr>
        <tr id='tr'><td id='td'>Wachtwoord:</td><td id='td'><input type='text' value='$studentvalue->wachtwoord' name='studentwwoord' disabled/></td></tr>";
    ?>
    <tr id='tr'><td id='td'><input type="button" value='Verwijderen' onclick="verwijderen3();" /></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";      
    
}
        if($keuze == 'School'){
    $query = mysqli_query($connectie, "SELECT * FROM scholen");
    
    
        
        echo '<select id="docent" name="verwijder-keuze" onChange="url2();">';

  while($school = mysqli_fetch_object($query)){
      echo "<option value=$school->schoolid";
      if($school->schoolid == $id){echo " selected";}
      echo ">$school->schoolnaam</option>";
  }      
        

    echo '</select></form>';
      
    $query2 = mysqli_query($connectie, "SELECT * FROM scholen WHERE schoolid = $id");        
    $schoolvalue = mysqli_fetch_object($query2);
    
    echo "<p>";?>
    <form action='deleteschool.php' id='deleteschool' method='POST'>
    <table>
    <?php
    echo "<tr id='tr'><td id='td' style='width:100px;'>Schoolnaam:</td><td id='td'><input type='hidden' value='$schoolvalue->schoolid' name='schoolid' /><input type='text' value='$schoolvalue->schoolnaam' name='schoolnaam' disabled /></td></tr>
    <tr id='tr'><td id='td'>Adres:</td><td id='td'><input type='text' value='$schoolvalue->adres' name='schooladres' disabled/></td></tr>
    <tr id='tr'><td id='td'>Postcode:</td><td id='td'><input type='text' value='$schoolvalue->postcode' name='schoolpostcode' disabled/></td></tr>
    <tr id='tr'><td id='td'>Plaats:</td><td id='td'><input type='text' value='$schoolvalue->plaatsnaam' name='schoolplaats' disabled/></td></tr>
    <tr id='tr'><td id='td'>Telefoon:</td><td id='td'><input type='text' value='$schoolvalue->telefoonnummer' name='schooltelefoon' disabled/></td></tr>
    <tr id='tr'><td id='td'>POC:</td><td id='td'><input type='text' value='$schoolvalue->POC' name='schoolpoc' disabled/></td></tr>
    <tr id='tr'><td id='td'>E-mail:</td><td id='td'><input type='text' value='$schoolvalue->email' name='schoolemail' disabled/></td></tr>";
    ?>
    <tr id='tr'><td id='td'><input type="button" value='Verwijderen' onclick="verwijderen4();" /></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";
    
          
} 
        if($keuze == 'Lokaal'){
    $query = mysqli_query($connectie, "SELECT * FROM lokaal");
    
    
        
        echo '<select id="docent" name="wijzig-keuze" onChange="url2();">';

  while($lokaal = mysqli_fetch_object($query)){
      echo "<option value=$lokaal->lokaalid";
      if($lokaal->lokaalid == $id){echo " selected";}
      echo ">$lokaal->lokaalnaam</option>";
  }      
        

    echo '</select></form>';
            
            $query2 = mysqli_query($connectie, "SELECT * FROM lokaal WHERE lokaalid = $id");
            $lok  = mysqli_fetch_object($query2);
            echo "<p><table><form method='POST' action='deletelokaal.php' id='deletelokaal'>
            
            <tr id='tr'><td id='td'>Lokaalnaam:</td><td id='td'><input type='text' value='$lok->lokaalnaam' name='lokaalnaam' disabled /><input type='hidden' value='$lok->lokaalid' name='lokaalid' /></td></tr>
            <tr id='tr'><td id='td'><input type='button' value='Verwijderen' onclick='verwijderen5();'/></td><td id='td'></td></tr>
           
            
            
            
            </form> </table></p>";
            
            
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