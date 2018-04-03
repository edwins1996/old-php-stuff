<?php
session_start();
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
include 'database.php';
$wijzigarray = array("Groep", "Les", "Docent", "Student", "School", "Lokaal");
$keuze = $_GET['keuze'];
//$id = $_GET['id'];


?>
<!doctype html>
<html>

<head>
<title>Toevoegen</title>
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
		content_css : "test.css",

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
var a = document.forms["toevoegen"]["toevoegen2"].value;

location.replace("toevoegen.php?keuze=" + a);
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
    <h1 style="font-family:Tahoma;">Toevoegen</h1>
    <form id="toevoegen" action="" method="POST">
    <select id="toevoegen2" name="wijzig-keuze" onChange="url();">
<?php
  for($x = 0; $x <= 5; $x++){
      echo "<option value=$wijzigarray[$x]";
      if($wijzigarray[$x] == $keuze){echo " selected";}
      echo ">$wijzigarray[$x]</option>";
  }      
        
?>
    </select>
    </form>
<?php
if($keuze == 'Les'){

    $niveauquery = mysqli_query($connectie, "SELECT * FROM niveaus");
    $maxlesid = mysqli_query($connectie, "SELECT MAX(lesstofid) as lesid FROM lesstof");
    $maxles = mysqli_fetch_object($maxlesid);
    
    $lesles = mysqli_query($connectie, "SELECT * FROM lesstof WHERE lesstofid = $maxles->lesid");
    $les1 = mysqli_fetch_object($lesles);
    
    
    echo "<p>";?>
    <form action='insertlesstof.php' method='POST'>
    <table>
    <?php
    echo "
    <tr id='tr'><td id='td' style='width:100px;'>Lesnaam:</td><td id='td'><input type='text' name='lesnaam' size=30 required/></td></tr>
    <tr id='tr'><td id='td' style='width:100px;'>Lestitel:</td><td id='td'><input type='text' name='lestitel' maxlength='20' required/></td></tr>
    
    <tr id='tr'><td id='td'>Niveau:</td><td id='td'>    <select name='lesniveau'>";
                    
    while($niveau = mysqli_fetch_object($niveauquery)){
        echo "<option value='$niveau->niveauid'";
        if($les1->niveauid == $niveau->niveauid){echo " selected";}
        echo ">$niveau->niveaunaam</option>";
    }
    
    
    
    echo "</select></td></tr>
    <tr id='tr'><td id='td'>Herhaalbaar:</td><td id='td'><select name='herhaalbaar'>
    <option value='niet herhaalbaar'>Niet herhaalbaar</option>
    <option value='herhaalbaar'>Herhaalbaar</option>
    
    </select></td></tr>
    <tr id='tr'><td id='td'>Inhoud:</td><td id='td'><textarea name='lesinhoud'></textarea></td></tr>
        <tr id='tr'><td id='td'></td><td id='td'><a id='historiek-button' href='#' onClick='myFunction();' > -> afbeeldingenbeheer</a> <a id='historiek-button' href='#' onClick='myFunction1();' > -> documentenbeheer</a></td></tr>
    ";
    ?>
    <tr id='tr'><td id='td'><input type="submit" value='Toevoegen' /></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";
          
}
        if($keuze == 'School'){
            $regio = mysqli_query($connectie, "SELECT * FROM regios");
            
    echo "<p>";?>
    <form action='insertschool.php' method='POST'>
    <table>
    <?php
    echo "<tr id='tr'><td id='td' style='width:100px;'>Schoolnaam:</td><td id='td'><input type='text' name='schoolnaam' required/></td></tr>
    <tr id='tr'><td id='td'>Adres:</td><td id='td'><input type='text' name='schooladres' required/></td></tr>
    <tr id='tr'><td id='td'>Postcode:</td><td id='td'><input type='text' name='schoolpostcode' required/></td></tr>
    <tr id='tr'><td id='td'>Plaats:</td><td id='td'><input type='text' name='schoolplaats' required/></td></tr>
     <tr id='tr'><td id='td'>Regio:</td><td id='td'>
     <select name='regio'>";
     while($reg = mysqli_fetch_object($regio)){
         echo "<option value='$reg->regioid'>$reg->regionaam</option>";
     }        
     
    echo "  </td></tr>
    <tr id='tr'><td id='td'>Telefoon:</td><td id='td'><input type='text' name='schooltelefoon' /></td></tr>
    <tr id='tr'><td id='td'>POC:</td><td id='td'><input type='text' name='schoolpoc' /></td></tr>
    <tr id='tr'><td id='td'>E-mail:</td><td id='td'><input type='text' name='schoolemail' /></td></tr>
    <tr id='tr'><td id='td'>Opmerkingen:</td><td id='td'><textarea name='schoolopmerking'></textarea></td></tr>
    ";
    ?>
    <tr id='tr'><td id='td'><input type="submit" value='Toevoegen' /></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";
    
          
} 
        if($keuze == 'Docent'){
    
    echo "<p>";?>
    <form action='insertdocent.php' method='POST'>
    <table>
    <?php
    echo "<tr id='tr'><td id='td' style='width:100px;'>Naam:</td><td id='td'><input type='text' name='plmnaam' required/></td></tr>
    <tr id='tr'><td id='td'>PS-nummer:</td><td id='td'><input type='number' name='plmpsid' required/></td></tr>
    <tr id='tr'><td id='td'>Telefoon:</td><td id='td'><input type='text' name='plmtelefoon' /></td></tr>
    <tr id='tr'><td id='td'>Wachtwoord:</td><td id='td'><input type='text' name='plmww' required/></td></tr>
    <tr id='tr'><td id='td'>Achtergrondkleur:</td><td id='td'><input id='chosen-value' type='text' name='plmachtergrond' /></td></tr>
    <tr id='tr'><td id='td'>Letterkleur:</td><td id='td'><input type='text' id='chosen-value2' name='plmletterkleur' /></td></tr>";
    ?>
    <tr id='tr'><td id='td'><input type="submit" value='Toevoegen' /></td></tr>
        
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

$browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);

        
        ?>
<script src="jscolor.js"></script>
<button id="achtergrondkleur-docent" style='
<?php 
if($browser == 'Firefox' || $browser == 'Internet Explorer'){
    echo "left:296px; top:-77px;";
}
            elseif($browser == 'Safari'){
    echo "left:330px; top:-100px;";
}
            else{
                echo "left:300px; top:-68px;";
            }
?> 
                                            

                                            
' class='jscolor {valueElement:"chosen-value"}'>&nbsp;</button>
<button id="letterkleur-docent" style="
<?php 
if($browser == 'Firefox' || $browser == 'Internet Explorer'){
    echo "left:266px; top:-50px;";
}
            elseif($browser == 'Safari'){
    echo "left:301px; top:-67px;";
}
            else{
                echo "left:276px; top:-45px;";
            }
?> 
                                       
" class='jscolor {valueElement:"chosen-value2"}'>&nbsp;</button>
 
       
    <?php echo "</p>";
            
            
}
                if($keuze == 'Groep'){
            
    $regioquery = mysqli_query($connectie, "SELECT * FROM regios");  
    $niveauquery = mysqli_query($connectie, "SELECT * FROM niveaus");  
    

    
    echo "<p>";?>
    <form action='insertgroep.php' method='POST'>
    <table>
    <?php
    echo "<tr id='tr'><td id='td' style='width:100px;'>Regio:</td><td id='td'>
    
    <select name='regio'>";
    while($regio = mysqli_fetch_object($regioquery)){
        echo "<option value='$regio->regioid'>$regio->regionaam</option>";
    }
    
    
    
    echo "</select>
  
    </td></tr>
    <tr id='tr'><td id='td'>Cohort:</td><td id='td'><input type='text' name='cohort' required/></td></tr>
    <tr id='tr'><td id='td'>Niveau:</td><td id='td'>
    
    <select name='niveau'>";
                    
    while($niveau = mysqli_fetch_object($niveauquery)){
        echo "<option value='$niveau->niveauid'>$niveau->niveaunaam</option>";
    }
    
    
    
    echo "</select>
    
    
    </td></tr>
    ";
    ?>
        <tr id='tr'><td id='td'>Opmerkingen:</td><td id='td'><textarea name='groepopmerkingen'></textarea></td></tr>
    <tr id='tr'><td id='td'><input type="submit" value='Toevoegen' /></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";
                    
                    
}
        if($keuze == 'Student'){
    $groepen = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");           
    $scholen = mysqli_query($connectie, "SELECT * FROM scholen");
            $maxid = mysqli_query($connectie, "SELECT MAX(leerlingid) as leerid FROM leerlingen");
            $maxllid = mysqli_fetch_object($maxid);
            
            $info = mysqli_query($connectie, "SELECT * FROM leerlingen WHERE leerlingid = $maxllid->leerid");
            $idinfo = mysqli_fetch_object($info);
     
    echo "<p>";?>
    <form action='insertstudent.php' method='POST'>
    <table>
    <?php
    echo "<tr id='tr'><td id='td' style='width:100px;'>Voornaam:</td><td id='td'><input type='text' name='studentvoornaam' autocomplete='off' required/></td></tr>
    <tr id='tr'><td id='td'>Tussenvoegsel:</td><td id='td'><input type='text' name='studenttussenvoegsel' /></td></tr>
    <tr id='tr'><td id='td'>Achternaam:</td><td id='td'><input type='text' name='studentachternaam' required/></td></tr>
    <tr id='tr'><td id='td'>PS-nummer:</td><td id='td'><input type='number' name='studentpsnummer' required/></td></tr>
    <tr id='tr'><td id='td'>Telefoon:</td><td id='td'><input type='text' name='studenttelefoon' /></td></tr>
    <tr id='tr'><td id='td'>E-mail:</td><td id='td'><input type='text' name='studentemail' /></td></tr>
    <tr id='tr'><td id='td'>Groep:</td><td id='td'>
    <select name='studentgroepid'>";
        
     while($groep = mysqli_fetch_object($groepen)){
         echo "<option value='$groep->groepid'";
         if($groep->groepid == $idinfo->groepid){echo " selected";}
         echo ">$groep->niveaunaam-$groep->cohort-$groep->regionaam</option>";
     }   
        
    echo "</select></td></tr>
    <tr id='tr'><td id='td'>Schoolnaam:</td><td id='td'>
    <select name='studentschoolnaam'>";
    while($school = mysqli_fetch_object($scholen)){
        
    echo "<option value='$school->schoolid'";
        if($school->schoolid == $idinfo->schoolid){echo " selected";}
        echo ">$school->schoolnaam</option>";
        
    }   
    
    echo "</select>
    </td></tr>
        <tr id='tr'><td id='td'>Wachtwoord:</td><td id='td'><input type='text' name='studentwwoord' value='wachtwoord' /></td></tr>
        <tr id='tr'><td id='td'>Opmerkingen:</td><td id='td'><textarea name='studentopmerking'></textarea></td></tr>
        ";
    ?>
    <tr id='tr'><td id='td'><input type="submit" value='Toevoegen' /></td></tr>
        
    </table>
    </form>
    <?php echo "</p>";      
    
}
     if($keuze == 'Lokaal'){

            echo "<p><table><form method='POST' action='insertlokaal.php'>
            
            <tr id='tr'><td id='td'>Lokaalnaam:</td><td id='td'><input type='text' name='lokaalnaam' required/></td></tr>
            <tr id='tr'><td id='td'><input type='submit' value='Toevoegen' /></td><td id='td'></td></tr>
           
            
            
            
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