<?php
session_start();
include 'database.php';
unset($_SESSION['groep']);
$id = $_GET['id'];
if(!isset($_GET['wj'])){
    $staticweek = mysqli_query($connectie, "SELECT * FROM planning WHERE groepid = $id");
    $static = mysqli_fetch_object($staticweek);
    if(mysqli_num_rows($staticweek) != 0){
    $week2 = "$static->jaar-$static->weekid";
    }else{
        $week2 = "0000-0";
    }
}else{
    $week2 = $_GET['wj'];
}



$weken = mysqli_query($connectie, "SELECT * FROM planning WHERE groepid = $id ORDER BY jaar DESC, weekid");

?>
<!doctype html>
<html>

<head>
<title>Historiek</title>
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
        $(document).ready(function(){
    $("#opmerking-wijzig").click(function(){
        $("#wijzig-groep-opmerking").slideToggle();
    });
});
function url(){
    var id = document.forms["historiek"]["historiek-selectie"].value;
    location.replace("lessen-historiek.php?id="+id);
}   
    function url2(){
    var week = document.forms["historiek"]["historiek-week"].value;

    location.replace("lessen-historiek.php?id=<?php echo $id; ?>&wj="+week);
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
    <h1 style="font-family:Tahoma;">Leshistoriek</h1>
    <br />
    
    
    <form id="historiek" action="" method="GET">
    
    <span>Groep: </span><select id="historiek-selectie" onChange='url();'>
    
        <?php
        $groepquery = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid");   
        
        while($groep = mysqli_fetch_object($groepquery)){
            
            echo "<option value='$groep->groepid'";
            if($id == $groep->groepid){echo "selected";}
            echo ">$groep->niveaunaam-$groep->cohort-$groep->regionaam</option>";
        }
        
        ?>
        
    </select>    
    <span>Jaar - Week:</span>
        <select id="historiek-week" onchange='url2();'>
        
            <?php
            
            while($weeks = mysqli_fetch_object($weken)){
                echo "<option value='$weeks->jaar-$weeks->weekid'";
                    if("$weeks->jaar-$weeks->weekid" == $week2){echo " selected"; }
                    echo ">$weeks->jaar - $weeks->weekid</option>";
            }
            
            
            ?>
            
        </select>
        
    </form>
    
 
    
    <br />
    <table>
        
    <?php
        // Query voor ophalen info uit historie tabel
        $jaar2 = substr($week2, 0, 4);
        $week3 = substr($week2, 5,200);
        
      
    $historiekquery = mysqli_query($connectie, "SELECT * FROM historie WHERE groepid = $id AND week = $week3 AND jaar = $jaar2");
    $historiekquery2 = mysqli_query($connectie, "SELECT * FROM groepen WHERE groepid = $id");
        $his = mysqli_fetch_object($historiekquery2);
    
        echo "<tr><th align='left' valign='top'><p>Opmerkingen:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' id='opmerking-wijzig'><img src='icons/edit.png' width=10px height=10px /></a> </p></th><td colspan=6>$his->opmerkingen
        
        <div id='wijzig-groep-opmerking' style='display: none;'>
        <form action='wijziggroepopmerking.php' method='POST'>
        
        <textarea name='wijzig-text'>$his->opmerkingen</textarea>
        <input name='groepid' type='hidden' value='$id' />
        <br />
        <input type='submit' value='Opslaan' />
        </form>
        </div>
        
        
        </td></tr>";
        echo "<tr id='tr'><td id='td'>&nbsp; </td><td id='td' colspan=6></td></tr>";
       echo "<tr><th width='200' align='left'>Groep</th><th width='250' align='left'>Lesstof</th><th width='75' align='left'>Lokaal</th><th width='150' align='left'>Lesblok</th><th width='150' align='left'>PLM</th><th width='50' align='left'>Jaar</th><th width='50' align='left'>Week</th></tr>";
        
        while($historie = mysqli_fetch_object($historiekquery)){
        // Queries voor ophalen gegevens uit tabellen adhv de ids in tabel historie
            $groepquery = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.groepid = $historie->groepid AND groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid"); 
            $lesquery = mysqli_query($connectie, "SELECT * FROM lesstof WHERE lesstofid = $historie->lesstofid");
            $lokaalquery = mysqli_query($connectie, "SELECT * FROM lokaal WHERE lokaalid = $historie->lokaalid");
            $plmquery = mysqli_query($connectie, "SELECT * FROM plm WHERE plmid = $historie->plmid");
            
        // Fetches voor bovenstaande queries
            $groep = mysqli_fetch_object($groepquery);
            $les = mysqli_fetch_object($lesquery);
            $lokaal = mysqli_fetch_object($lokaalquery);
            $plmnaam = mysqli_fetch_object($plmquery);
            
            
            echo "
            <tr>
            <td>$groep->niveaunaam-$groep->cohort-$groep->regionaam</td>
            <td>$les->lesstofnaam</td>
            <td>$lokaal->lokaalnaam</td>
            <td>$historie->lesblok</td>
            <td>$plmnaam->naam</td>
            <td>$historie->jaar</td>
            <td>$historie->week</td>
            </tr>";
        }
        
    ?>
    
    
    
    
    </table>
    
    
    </div>
    <?php include 'footer.php'; ?>
    </div>   
    
</body>
</html>