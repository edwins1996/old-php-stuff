<?php
session_start();
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
include 'database.php';
$plmid = $_GET['plm'];
$lesstofid = $_GET['lesstofid'];
$lokaalid = $_GET['lokaal'];
$weeknr = $_GET["weeknr"];
$jaarnr = $_GET["jaarnr"];
$groepnr = $_GET["groepnr"];
$lesblok = $_GET['lesblok'];

// Queries

// PLMers uit database halen
$plmquery = mysqli_query($connectie, "SELECT * FROM plm");

// Lokalen uit database halen
$lokaalquery = mysqli_query($connectie, "SELECT * FROM lokaal");

// Lesstof uit database halen
$lesquery = mysqli_query($connectie, "SELECT * FROM lesstof WHERE lesstofid = $lesstofid");
      
// Niveauquery
$niveauquery = mysqli_query($connectie, "SELECT * FROM groepen, niveaus WHERE groepen.niveauid = niveaus.niveauid AND groepen.groepid = " . $groepnr . "");
$niveau = mysqli_fetch_object($niveauquery);

// Query voor gekoppelde lesstof
$leskoppeling = "SELECT * FROM planning, subplanning, lesstof WHERE planning.planningid = subplanning.planningid AND lesstof.lesstofid = subplanning.lesstofid AND planning.weekid = $weeknr AND planning.jaar = $jaarnr AND planning.groepid = $groepnr AND subplanning.lesblok = $lesblok";
$leskoppelinguitvoer = mysqli_query($connectie, $leskoppeling);
     
 // QUERY voor urenwijzigen.php
$moreuren = mysqli_query($connectie, "SELECT * FROM subplanning, planning WHERE planning.planningid = subplanning.planningid AND planning.jaar = $jaarnr AND groepid = $groepnr AND weekid = $weeknr");
$urenmore = mysqli_fetch_object($moreuren);
      if(mysqli_num_rows($moreuren) != 0){
$_SESSION['uren'] = $urenmore->planningid;
$_SESSION['uren-les'] = $lesstofid;
      }   
?>

<html>
<head>
    
    <title>Les bewerken</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="test.css" />
     <script src="jquery/jquery.min.js"></script>
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
function myFunction() {
    var myWindow = window.open("Afbeeldingschrijven/afbeeldingenbeheer.php?type=Afbeelding", "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=500,height=600");
}
    function myFunction1() {
    var myWindow = window.open("Afbeeldingschrijven/afbeeldingenbeheer.php?type=Document", "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=500,height=600");
}
        $(document).ready(function(){
    $("#uur").click(function(){
        $("#morehours").load('urenwijzigen.php');
    });
});
    
</script>
</head>
<body>
<div id="header">
<?php include 'menu-buttons.php';?>
    
    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 



</div>    

<div id="pagina">
<div id="content">
    <h1 style="font-family:Tahoma;">Les bewerken</h1>
    <br />    
    
<form action=
      
      <?php
      
echo "lesupdate.php?weeknr=$weeknr&jaarnr=$jaarnr&groepnr=$groepnr"; 
      
      
      ?>
      method="POST">
<?php
echo "<input type='hidden' name='lesblok' value='$lesblok' />";    
    
?>
    <span>Lesstof:</span><br />

<?php    
$les = mysqli_fetch_object($lesquery);
 
    echo "<span><b>$les->lesstofnaam</b></span>
    <input type='hidden' name='lesstofselect' value='$les->lesstofid' />
    ";

    
?>    

<br /><br />
    <span>PLM'er:</span><br />
<select name="plmselect">

<?php
  while($plm = mysqli_fetch_object($plmquery)){  
    echo "<option value='$plm->plmid'";
      if($plm->plmid == $plmid){echo " selected";}
      echo ">$plm->naam</option>";
  }
?>
    
</select>
<br /><br />
    
    <span>Lokaal:</span><br />
<select name="lokaalselect">

<?php
  while($lokaal = mysqli_fetch_object($lokaalquery)){  
    echo "<option value='$lokaal->lokaalid'";
      if($lokaal->lokaalid == $lokaalid){echo " selected";}
      echo ">$lokaal->lokaalnaam</option>";
  }
      


      
?>
    
</select> 
    <?php

$koppelingles = mysqli_fetch_object($leskoppelinguitvoer);

// Lestijden 

echo "<br /><br />
<span>Andere lestijden:</span><br />";


echo "<table><tr id='kzth'><td id='kzth'><span>Begintijd:</span></td><td id='kzth'>
<input type='time' name='begintijd' value=";
    if($koppelingles->begintijd == ''){
        echo '--:--';
    }else{
     echo date($koppelingles->begintijd);
    }
echo " size=4 /></td></tr>
<tr id='kzth'><td id='kzth'><span>Eindtijd:</span></td><td id='kzth'>
<input type='time' name='eindtijd' value=";
      if($koppelingles->eindtijd == ''){
        echo '--:--';
    }else{
     echo date($koppelingles->eindtijd);
    }
      echo " size=4 /></td></tr></table>"  ; 
    

      
      
      
      
    ?><br />
    <button id='uur' type='button'>Uren toevoegen</button>
    <p id='morehours' style='margin: 0px;'></p>
    <br /><br />
    <span>Opmerkingen:</span><br />
    <?php
   
    ?>
    <textarea name='opmerkingen'><?php
      
      echo $koppelingles->koppeling;
        ?></textarea>
<br /><br />
    <span>Lesstof bij deze les: &nbsp;<a id='historiek-button' href="#" onClick="myFunction();" > -> afbeeldingenbeheer</a> <a id='historiek-button' href="#" onClick="myFunction1();" > -> documentbeheer</a></span><br />
    <textarea name='koppeling'>
<?php
    
      echo $koppelingles->inhoud;
    
    ?>
    </textarea><br />
<input type="submit" value="Wijzigen" />    
</form>
    
<?php    
echo "<a href='plannen.php?weeknr=$weeknr&jaarnr=$jaarnr&groepnr=$groepnr'><button>Terug</button></a>";
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