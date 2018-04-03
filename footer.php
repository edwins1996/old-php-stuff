<?php


?>


<script>
function uitlog(){
document.getElementById("uitlog").submit();
}

</script>
<footer style='font-family:Tahoma;'><form id="uitlog" action="uitloggen.php"><center>

    <?php
    
    // Ophalen juiste gebruikersnaam uit tabel leerlingen of PLM
    if($_SESSION['functie'] == 'Leerling'){
        $gebrquery = mysqli_query($connectie, "SELECT * FROM leerlingen WHERE psnummer = '".$_SESSION['gebrnaam']."'");
        $gebr = mysqli_fetch_object($gebrquery);
        echo "<br />U bent ingelogd als <strong>$gebr->voornaam $gebr->tussenvoegsel $gebr->achternaam</strong>";
    }
    elseif($_SESSION['functie'] == 'PLM'){
                $gebrquery = mysqli_query($connectie, "SELECT * FROM plm WHERE psid = '".$_SESSION['gebrnaam']."'");
        $gebr = mysqli_fetch_object($gebrquery);
        
        echo "<br />U bent ingelogd als <strong>$gebr->naam</strong>";
    }
	
    
    
    
    
    
    
    
    ?>
    
    <div id='logout'><a id='logouthref' href='#' onClick='uitlog();'>Uitloggen</a></div>
    
    
    </center></form></footer>


<!--<img id='uitlogimg' src='icons/logout.png' width='20' height='20' />-->