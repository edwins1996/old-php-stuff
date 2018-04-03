<?php
session_start();
include 'database.php';
$_SESSION['groep'] = 'groepen.php';
if(isset($_GET['groep'])){
$group = $_GET['groep'];
}
elseif(!isset($_GET['groep'])){
    
    $sql = mysqli_query($connectie, "SELECT * FROM groepen");
    $fetch = mysqli_fetch_object($sql);
    
    $group = $fetch->groepid;
}
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
?>


<!doctype html>
<html>

<head>
<title>Groepen</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
<link rel="stylesheet" href="plm.css" />
    
 <script src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>   
    <script>

tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,forecolor,backcolor,insertlayer,moveforward",
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
        
        
        // ____________________________________________________________________________________________________________\\
        function url(){
            
            var groep = document.getElementById("groepselect").value;
            
            location.replace("?groep="+groep);
            
        }
        
        
        $(document).ready(function(){
    $("#opmerking-wijzig").click(function(){
        $("#wijzig-groep-opmerking").slideToggle();
    });
});
    </script>
    
    <style>
        table{
            font-family:Tahoma;
        }
    
    </style>
    </head>

<body>
    

    
<div id="header">
<?php include 'menu-buttons.php';?>
    
    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 



</div>    

<div id="pagina">


    
    

<div id="content">
    <h1 style="font-family:Tahoma;">Groepen</h1>
    <br />

<?php
    
$groepen = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");    

    
    
    echo "<select id='groepselect' onchange='url();'>";
    while($groep = mysqli_fetch_object($groepen)){

        echo "<option value='$groep->groepid'";
        if($groep->groepid == $group){echo "selected";}
        echo ">$groep->niveaunaam-$groep->regionaam-$groep->cohort</option>";
    
    }    
    echo "</select>";
    
                                    
    $llselect = mysqli_query($connectie, "SELECT * FROM leerlingen WHERE leerlingen.groepid = $group");
    $groepsel = mysqli_query($connectie, "SELECT * FROM groepen WHERE groepid = $group");
    $groepfetch = mysqli_fetch_object($groepsel);

    
    echo "<br /><br />
    <table>
    
    <tr><th colspan=4 align=left>Opmerkingen:&nbsp;&nbsp;<a href='#' id='opmerking-wijzig'><img src='icons/edit.png' width=10px height=10px /></a></th></tr>
    <tr><td colspan=4>$groepfetch->opmerkingen
    <div id='wijzig-groep-opmerking' style='display: none;'>
        <form action='wijziggroepopmerking.php' method='POST'>
        
        <textarea name='wijzig-text'>$groepfetch->opmerkingen</textarea>
        <input name='groepid' type='hidden' value='$group' />
        <br />
        <input type='submit' value='Opslaan' />
        </form>
        </div>
    
    </td></tr>
    <tr style='border:none;'><th colspan=4 style='border:none;'>&nbsp;</th></tr>
    <tr style='border:none;'><th colspan=4 style='border:none;'>&nbsp;</th></tr>
    
    <tr>
    
    <th width='250'>Naam</th>
    <th width='250'>School</th>
    <th width='250'>Telefoon</th>
    <th width='250'>E-mail</th>
    
    </tr>";
    
    while($ll = mysqli_fetch_object($llselect)){
    $schoolselect = mysqli_query($connectie, "SELECT * FROM scholen WHERE schoolid = $ll->schoolid");
        $school = mysqli_fetch_object($schoolselect);
        echo "
    <tr>
    
    <td>$ll->voornaam $ll->tussenvoegsel $ll->achternaam</td>
    <td>$school->schoolnaam</td>
    <td>$ll->telefoonnummer</td>
    <td>$ll->emailadres</td>
    
    </tr>";   
    }
    echo "</table>";
    
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