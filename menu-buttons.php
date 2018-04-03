 
<div id="menu-buttons">
        <?php
        $groep1query = mysqli_query($connectie, "SELECT groepid FROM groepen");
        $plm1query = mysqli_query($connectie, "SELECT * FROM plm WHERE psid = ".$_SESSION["gebrnaam"]."");
        $plm1var = mysqli_fetch_object($plm1query);
        $groep1var = mysqli_fetch_object($groep1query);
        ?>
        <a href="plannen.php?weeknr=<?php echo date('W');?>&jaarnr=<?php echo date('Y');?>&groepnr=<?php echo $groep1var->groepid;?>"><button id="button1">Plannen</button></a>
        <a href="beheer.php"><button id="button2">Beheer</button></a>
        <a href="persrooster.php?weeknr=<?php echo date('W');?>&jaarnr=<?php echo date('Y');?>&plmnr=<?php echo $plm1var->plmid;?>"><button id="button3">Mijn rooster</button></a>
        <a href="groepen.php"><button id="button1">Groepen</button></a>
     
    </div>  