<?php
session_start();
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
include 'database.php';
$wijzigarray = array("Groep", "Les", "Docent", "Student", "School", "Lokaal");
$keuze = $_GET['keuze'];
$id = $_GET['id'];


?>
<!doctype html>
<html>

<head>
<title>Wijzigen</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
 <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,|,tablecontrols,",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor,|,insertlayer,moveforward,movebackward,absolute",
		theme_advanced_buttons3 : "hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "style.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
    

function url(){
var a = document.forms["wijzig"]["wijzig2"].value;

if(a == 'Groep'){
<?php
$group = mysqli_query($connectie, "SELECT * FROM groepen");
$groupfetch = mysqli_fetch_object($group);
?>	
location.replace("wijzigen.php?keuze=" + a +"&id=<?php echo $groupfetch->groepid; ?>");
}
else if(a == 'Les'){
<?php
$lesson = mysqli_query($connectie, "SELECT * FROM lesstof");
$lessonfetch = mysqli_fetch_object($lesson);
?>	
location.replace("wijzigen.php?keuze=" + a +"&id=<?php echo $lessonfetch->lesstofid; ?>");	
}
else if(a == 'Docent'){
<?php
$teacher = mysqli_query($connectie, "SELECT * FROM plm");
$teacherfetch = mysqli_fetch_object($teacher);
?>
location.replace("wijzigen.php?keuze=" + a +"&id=<?php echo $teacherfetch->plmid; ?>");	
}
else if(a == 'Student'){
<?php
$students = mysqli_query($connectie, "SELECT * FROM leerlingen");
$studentsfetch = mysqli_fetch_object($students);
?>
location.replace("wijzigen.php?keuze=" + a +"&id=<?php echo $studentsfetch->leerlingid; ?>");	
}
else if(a == 'School'){
<?php
$schools = mysqli_query($connectie, "SELECT * FROM scholen");
$schoolsfetch = mysqli_fetch_object($schools);
?>
location.replace("wijzigen.php?keuze=" + a +"&id=<?php echo $schoolsfetch->schoolid; ?>");	
}
else if(a == 'Lokaal'){
<?php
$room = mysqli_query($connectie, "SELECT * FROM lokaal");
$roomfetch = mysqli_fetch_object($room);
?>
location.replace("wijzigen.php?keuze=" + a +"&id=<?php echo $roomfetch->lokaalid; ?>");	
}
}
function url2(){
    var a = document.forms["wijzig"]["wijzig2"].value;
    var b = document.forms["wijzig"]["les"].value;
    location.replace("wijzigen.php?keuze=" + a +"&id="+b);
}
function myFunction() {
    var myWindow = window.open("Afbeeldingschrijven/afbeeldingenbeheer.php?type=Afbeelding", "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=500,height=600");
}
    function myFunction1() {
    var myWindow = window.open("Afbeeldingschrijven/afbeeldingenbeheer.php?type=Document", "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=500,height=600");
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
    <h1 style="font-family:Tahoma;">Wijzigen</h1>
    <form id="wijzig" action="" method="POST">
    <select id="wijzig2" name="wijzig-keuze" onChange="url();">
<?php
  for($x = 0; $x <= 5; $x++){
      echo "<option value=$wijzigarray[$x]";
      if($wijzigarray[$x] == $keuze){echo " selected";}
      echo ">$wijzigarray[$x]</option>";
  }      
        
?>
    </select>
   
<?php
if($keuze == 'Les'){
    $query = mysqli_query($connectie, "SELECT * FROM lesstof");
    
    
        
        echo '<select id="les" name="wijzig-keuze" onChange="url2();">';

  while($lesstof = mysqli_fetch_object($query)){
      echo "<option value=$lesstof->lesstofid";
      if($lesstof->lesstofid == $id){echo " selected";}
      echo ">$lesstof->lesstofnaam</option>";
  }      
        

    echo '</select></form>';
    
    $query2 = mysqli_query($connectie, "SELECT * FROM lesstof, niveaus WHERE lesstofid = $id AND niveaus.niveauid = lesstof.niveauid"); 
    $lesvalue = mysqli_fetch_object($query2);
    $niveauquery = mysqli_query($connectie, "SELECT * FROM niveaus");
    
    echo "<p>";?>
    <form action='submitlesstofchanges.php' method='POST'>
    <table>
    <?php
    echo "<input type='hidden' value='".crypt($lesvalue->lesstofid, 'LICT')."' name='lesid' />
    <tr id='tr'><td id='td' style='width:100px;'>Lesnaam:</td><td id='td'><input type='text' value='$lesvalue->lesstofnaam' name='lesnaam' size=40 /></td></tr>
    <tr id='tr'><td id='td' style='width:100px;'>Lestitel:</td><td id='td'><input type='text' value='$lesvalue->lesstoftitel' name='lestitel' maxlength=20 /></td></tr>
    
    <tr id='tr'><td id='td'>Niveau:</td><td id='td'>    <select name='lesniveau'>";
                    
    while($niveau = mysqli_fetch_object($niveauquery)){
        echo "<option value='$niveau->niveauid'";
		if($lesvalue->niveauid == $niveau->niveauid){echo " selected";}
		echo ">$niveau->niveaunaam</option>";
    }
    
    
    
    echo "</select></td></tr>";
    $herharray = array('niet herhaalbaar', 'herhaalbaar');
        echo "<tr id='tr'><td id='td'>Herhaalbaar:</td><td id='td'><select name='herhaalbaar'>
    <option value='$herharray[0]'";
	if($lesvalue->duur == $herharray[0]){echo " selected";}
	echo ">Niet herhaalbaar</option>
    <option value='$herharray[1]'";
	if($lesvalue->duur == $herharray[1]){echo " selected";}
	echo ">Herhaalbaar</option>
    
    </select></td></tr>
    <tr id='tr'><td id='td'>Inhoud:</td><td id='td'><textarea name='lesinhoud'>$lesvalue->inhoud</textarea></td></tr>
    <tr id='tr'><td id='td'></td><td id='td'><a id='historiek-button' href='#' onClick='myFunction();' > -> afbeeldingenbeheer</a> <a id='historiek-button' href='#' onClick='myFunction1();' > -> documentenbeheer</a></td></tr>
    ";
    ?>
    <tr id='tr'><td id='td'><input type="submit" value='Wijzigen' /></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";
          
}
        if($keuze == 'School'){
    $query = mysqli_query($connectie, "SELECT * FROM scholen");
    
    
        
        echo '<select id="les" name="wijzig-keuze" onChange="url2();">';

  while($school = mysqli_fetch_object($query)){
      echo "<option value=$school->schoolid";
      if($school->schoolid == $id){echo " selected";}
      echo ">$school->schoolnaam</option>";
  }      
        

    echo '</select></form>';
      
    $query2 = mysqli_query($connectie, "SELECT * FROM scholen WHERE schoolid = $id");        
    $schoolvalue = mysqli_fetch_object($query2);
    
    echo "<p>";?>
    <form action='submitschoolchanges.php' method='POST'>
    <table>
    <?php
    echo "<tr id='tr'><td id='td' style='width:100px;'>Schoolnaam:</td><td id='td'><input type='hidden' value='".crypt($schoolvalue->schoolid, 'LICT')."' name='schoolid' /><input type='text' value='$schoolvalue->schoolnaam' name='schoolnaam' /></td></tr>
    <tr id='tr'><td id='td'>Adres:</td><td id='td'><input type='text' value='$schoolvalue->adres' name='schooladres' /></td></tr>
    <tr id='tr'><td id='td'>Postcode:</td><td id='td'><input type='text' value='$schoolvalue->postcode' name='schoolpostcode' /></td></tr>
    <tr id='tr'><td id='td'>Plaats:</td><td id='td'><input type='text' value='$schoolvalue->plaatsnaam' name='schoolplaats' /></td></tr>
    <tr id='tr'><td id='td'>Telefoon:</td><td id='td'><input type='text' value='$schoolvalue->telefoonnummer' name='schooltelefoon' /></td></tr>
    <tr id='tr'><td id='td'>POC:</td><td id='td'><input type='text' value='$schoolvalue->POC' name='schoolpoc' /></td></tr>
    <tr id='tr'><td id='td'>E-mail:</td><td id='td'><input type='text' value='$schoolvalue->email' name='schoolemail' /></td></tr>
    <tr id='tr'><td id='td'>Opmerkingen:</td><td id='td'><textarea name='schoolopmerking'>$schoolvalue->opmerkingen</textarea></td></tr>";
    ?>
    <tr id='tr'><td id='td'><input type="submit" value='Wijzigen' /></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";
    
          
} 
        if($keuze == 'Docent'){
    $query = mysqli_query($connectie, "SELECT * FROM plm");
    
    
        
        echo '<select id="les" name="wijzig-keuze" onChange="url2();">';

  while($docent = mysqli_fetch_object($query)){
      echo "<option value=$docent->plmid";
      if($docent->plmid == $id){echo " selected";}
      echo ">$docent->naam</option>";
  }      
        

    echo '</select></form>';
   
    $query2 = mysqli_query($connectie, "SELECT * FROM plm WHERE plmid = $id");        
    $plmvalue = mysqli_fetch_object($query2);
    
    echo "<p>";?>
    <form action='submitdocentchanges.php' method='POST'>
    <table>
    <?php
    echo "<input type='hidden' value='".crypt($plmvalue->plmid, 'LICT')."' name='plmid' />
    <tr id='tr'><td id='td' style='width:100px;'>Naam:</td><td id='td'><input type='text' value='$plmvalue->naam' name='plmnaam' /></td></tr>
    <tr id='tr'><td id='td'>PS-nummer:</td><td id='td'><input type='number' value='$plmvalue->psid' name='plmpsid' /></td></tr>
    <tr id='tr'><td id='td'>Telefoon:</td><td id='td'><input type='text' value='$plmvalue->telefoonnummer' name='plmtelefoon' /></td></tr>
    
    <tr id='tr'><td id='td' style='width:170px;'>Huidig wachtwoord:</td><td id='td'><input type='password' value='' name='plmww' /></td></tr>
    <tr id='tr'><td id='td'>Nieuw wachtwoord:</td><td id='td'><input type='password' value='' name='nieuw-plmww' /></td></tr>
    <tr id='tr'><td id='td'>Herhaling wachtwoord:</td><td id='td'><input type='password' value='' name='herhaal-plmww' /></td></tr>
    
    
    
    <tr id='tr'><td id='td'>Achtergrondkleur:</td><td id='td'><input id='chosen-value' type='text' value='$plmvalue->achtergrondkleur' name='plmachtergrond' /></td></tr>
    <tr id='tr'><td id='td'>Letterkleur:</td><td id='td'><input type='text' id='chosen-value2' value='$plmvalue->letterkleur' name='plmletterkleur' /></td></tr>";
    ?>
    <tr id='tr'><td id='td'><input type="submit" value='Wijzigen' /></td></tr>
    <?php
    if(isset($_SESSION['wwstatus'])){
        if($_SESSION['wwstatus'] == 'Niet Ok'){
            echo "<p style='font-family:Tahoma; color:red;'>Huidige wachtwoord is onjuist,<br />of nieuwe wachtwoorden komen niet overeen.</p>";
        unset($_SESSION['wwstatus']);
        }
    }    
        
        
    ?>  
    </table>
    </form>
        <?php
        function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
    
    return 'Other';
}

// Usage:

$browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);

        
        ?>
<script src="jscolor.js"></script>
<button id="achtergrondkleur-docent" style='
<?php 
if($browser == 'Firefox' || $browser == 'Internet Explorer'){
    echo "left:330px; top:-77px;";
}
            elseif($browser == 'Safari'){
    echo "left:350px; top:-67px;";
}
            else{
                echo "left:350px; top:-68px;";
            }
?> 
                                            

                                            
' class='jscolor {valueElement:"chosen-value"}'>&nbsp;</button>
<button id="letterkleur-docent" style="
<?php 
if($browser == 'Firefox' || $browser == 'Internet Explorer'){
    echo "left:298px; top:-50px;";
}
elseif($browser == 'Safari'){
    echo "left:321px; top:-99px;";
}
            else{
                echo "left:326px; top:-45px;";
            }
?> 
                                       
" class='jscolor {valueElement:"chosen-value2"}'>&nbsp;</button>
 
       
    <?php echo "</p>";
            
            
}
                if($keuze == 'Groep'){
$groepquery = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");
    
    
        
        echo '<select id="les" name="wijzig-keuze" onChange="url2();">';

  while ($records = mysqli_fetch_object($groepquery)) {
      echo '<option value="' . $records->groepid . '"';
       if($id==$records->groepid){echo ' selected';} 
      echo '>' . $records->niveaunaam . '-' . $records->regionaam . '-' . $records->cohort . '</option>'.chr(10);

      
  }
        
        

    echo '</select></form>';
 
    $query2 = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid AND groepid = $id");    
                    
    $regioquery = mysqli_query($connectie, "SELECT * FROM regios");  
    $niveauquery = mysqli_query($connectie, "SELECT * FROM niveaus");  
    
    $groepvalue = mysqli_fetch_object($query2);
    
    echo "<p>";?>
    <form action='submitgroepchanges.php' method='POST'>
    <table>
    <?php
    echo "<tr id='tr'><td id='td' style='width:100px;'>Regio:</td><td id='td'>
    
    <select name='regio'>";
    while($regio = mysqli_fetch_object($regioquery)){
        echo "<option value='$regio->regioid'";
		if($groepvalue->regioid == $regio->regioid){echo " selected"; }
		echo ">$regio->regionaam</option>".chr(10);
    }
    
    
    
    echo "</select>
    <input type='hidden' value='".crypt($groepvalue->groepid, 'LICT')."' name='groepid' />
    </td></tr>
    <tr id='tr'><td id='td'>Cohort:</td><td id='td'><input type='text' value='$groepvalue->cohort' name='cohort' /></td></tr>
    <tr id='tr'><td id='td'>Niveau:</td><td id='td'>
    
    <select name='niveau'>";
                    
    while($niveau = mysqli_fetch_object($niveauquery)){
        echo "<option value='$niveau->niveauid'";
		if($groepvalue->niveauid == $niveau->niveauid){echo " selected";}
		echo ">$niveau->niveaunaam</option>";
    }
    
    
    
    echo "</select>
    
    
    </td></tr>
    ";
    ?>
    <tr id='tr'><td id='td'>Opmerkingen:</td><td id='td'><textarea name='opmerkingengroep'><?php echo $groepvalue->opmerkingen; ?></textarea></td></tr>
    <tr id='tr'><td id='td'><input type="submit" value='Wijzigen' /></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";
                    
                    
}
        if($keuze == 'Student'){
    $query = mysqli_query($connectie, "SELECT * FROM leerlingen");
    
    
        
        echo '<select id="les" name="wijzig-keuze" onChange="url2();">';

  while($student = mysqli_fetch_object($query)){
      echo "<option value=$student->leerlingid";
      if($student->leerlingid == $id){echo " selected";}
      echo ">$student->voornaam $student->tussenvoegsel $student->achternaam</option>";
  }      
        

    echo '</select></form>';
            
    $query2 = mysqli_query($connectie, "SELECT * FROM leerlingen WHERE leerlingid = $id");        
    $studentvalue = mysqli_fetch_object($query2);
    $query3 = mysqli_query($connectie, "SELECT * FROM leerlingen, scholen WHERE leerlingen.leerlingid = $id AND scholen.schoolid = leerlingen.schoolid");        
    $studentvalue2 = mysqli_fetch_object($query3);
    $groepen = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");
            
            
    $scholen = mysqli_query($connectie, "SELECT * FROM scholen");
    
    echo "<p>";?>
    <form action='submitstudentchanges.php' method='POST'>
    <table>
    <?php
    echo "

	<tr id='tr'><td id='td' style='width:100px;'>Voornaam:</td><td id='td'><input type='hidden' value='".crypt($studentvalue->leerlingid, 'LICT')."' name='studentid' /><input type='text' value='$studentvalue->voornaam' name='studentvoornaam' /></td></tr>
    <tr id='tr'><td id='td'>Tussenvoegsel:</td><td id='td'><input type='text' value='$studentvalue->tussenvoegsel' name='studenttussenvoegsel' /></td></tr>
    <tr id='tr'><td id='td'>Achternaam:</td><td id='td'><input type='text' value='$studentvalue->achternaam' name='studentachternaam' /></td></tr>
    <tr id='tr'><td id='td'>PS-nummer:</td><td id='td'><input type='number' value='$studentvalue->psnummer' name='studentpsnummer' /></td></tr>
    <tr id='tr'><td id='td'>Telefoon:</td><td id='td'><input type='text' value='$studentvalue->telefoonnummer' name='studenttelefoon' autocomplete='off'/></td></tr>
    <tr id='tr'><td id='td'>E-mail:</td><td id='td'><input type='text' value='$studentvalue->emailadres' name='studentemail' /></td></tr>
    <tr id='tr'><td id='td'>Groep:</td><td id='td'>
    <select name='studentgroepid'>";
        
     while($groep = mysqli_fetch_object($groepen)){
         echo "<option value='$groep->groepid'";
         if($studentvalue->groepid == $groep->groepid){echo " selected";}
         echo ">$groep->niveaunaam-$groep->cohort-$groep->regionaam</option>";
     }   
        
    echo "</select></td></tr>
    <tr id='tr'><td id='td'>Schoolnaam:</td><td id='td'>
    <select name='studentschoolnaam'>";
    while($school = mysqli_fetch_object($scholen)){
        
    echo "<option value='$school->schoolid'";
        if($studentvalue2->schoolid == $school->schoolid){ echo " selected";}
        echo ">$school->schoolnaam</option>";
        
    }   
    
    echo "</select>
    </td></tr>
        <tr id='tr'><td id='td'>Wachtwoord:</td><td id='td'><input type='password' value='' name='studentwwoord' autocomplete='new-password' /></td></tr>";
            
            // Juiste opmerkingen uit database halen
            $query3 = mysqli_query($connectie, "SELECT * FROM leerlingen WHERE leerlingid = $id");
            $studentquery = mysqli_fetch_object($query3);
        
            
        echo "  <tr id='tr'><td id='td'>Opmerkingen:</td><td id='td'><textarea name='studentopmerking'>$studentquery->opmerkingen</textarea></td></tr>";
    ?>
    <tr id='tr'><td id='td'><input type="submit" value='Wijzigen' /></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";      
    
}
        
        if($keuze == 'Lokaal'){
    $query = mysqli_query($connectie, "SELECT * FROM lokaal");
    
    
        
        echo '<select id="les" name="wijzig-keuze" onChange="url2();">';

  while($lokaal = mysqli_fetch_object($query)){
      echo "<option value=$lokaal->lokaalid";
      if($lokaal->lokaalid == $id){echo " selected";}
      echo ">$lokaal->lokaalnaam</option>";
  }      
        

    echo '</select></form>';
            
            $query2 = mysqli_query($connectie, "SELECT * FROM lokaal WHERE lokaalid = $id");
            $lok  = mysqli_fetch_object($query2);
            echo "<p><table><form method='POST' action='submitlokaalchanges.php'>
            
            <tr id='tr'><td id='td'>Lokaalnaam:</td><td id='td'><input type='text' value='$lok->lokaalnaam' name='lokaalnaam' /><input type='hidden' value='".crypt($lok->lokaalid, 'LICT')."' name='lokaalid' /></td></tr>
            <tr id='tr'><td id='td'><input type='submit' value='Wijzigen' /></td><td id='td'></td></tr>
           
            
            
            
            </form> </table></p>";
            
            
        }

?>
   <!-- </form>-->        
    
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