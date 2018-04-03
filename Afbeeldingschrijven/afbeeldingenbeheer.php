<?php
session_start();
include '../database.php';
if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
$bestand = $_GET['type'];
$types = array("Afbeelding", "Document");
?>

<html>
<head>
<title>Beheer afbeeldingen</title>
<link rel="icon" href="./favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="../test.css" />    
    <script>
	function dat(){
		var type = document.forms["type"]["bestand"].value;

        
location.replace("afbeeldingenbeheer.php?type="+type);
	}
	
    function functie(){
        var foto = document.getElementById("foto").value;
        input= document.getElementById("foto");
        filesize = input.files[0];
       if(filesize.size > 25000000){
           alert("Uw afbeelding is te groot, selecteer een nieuwe.")
           document.getElementById("foto").value = "";
       }
        else{
        var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "foto=" + foto.substring(12);
     xhr.open("POST", "bestaat_foto.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 xhr.onreadystatechange = display_data;
	 
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
       if(xhr.responseText > 0){
           alert("Er bestaat al een bestand met deze naam op de server.\nKies een andere naam.");
           document.getElementById("foto").value = "";
       }	   
	 
      } else {
        alert('There was a problem with the request.');
      }
     }
	}
    }
    }
    
    </script>
</head>
<body>
    <div id="header">
        <script>
        function window(){
            myWindow.close();
        }
        </script>
        <button id="button1" onclick="window.top.close();">Sluiten</button>
    
    
    <img id="logo" src="../ELIPS2.png" width="300" height="75"/> 



</div>    

<div id="pagina">
<div id="content">
    <a href="../lists/lijst-bijwerken.php?type=<?php echo $bestand; ?>"><button style='float:right;'>Bestandenlijst updaten</button></a> 
<form id='type' action='' method='GET'>
<select onChange="dat();" id="bestand">
<?php
for ($x = 0; $x < 2; $x++){
echo "<option value='$types[$x]'";
if($bestand == $types[$x]){echo " selected";}
echo ">$types[$x]</option>";
}
?>
</select>
</form>
    <?php
	if(isset($_SESSION['status'])){
		if($_SESSION['status'] == 'Niet goed'){
			echo "<script>alert('Niet het juiste type document toegevoegd')</script>";
			unset($_SESSION['status']);
		}
	}
	if($bestand == 'Afbeelding'){
	include 'afbeelding.php';
	}
	elseif($bestand == 'Document'){
		include 'document.php';
	}
	?>
        </div>
    
    </div>  
</body>
</html>
<?php
unset($_SESSION['plm-plmid']);
  }
else{
    header ('location: ../login.php');
}
}
else{
    header ('location: ../login.php');
}
?>