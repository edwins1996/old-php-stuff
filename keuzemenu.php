<?php
ob_start();
session_start();
include 'database.php';

if(isset($_SESSION['functie'])){
  if($_SESSION['functie'] == 'PLM'){
?>
<!doctype html>
<html>

<head>
<title>Keuzemenu</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
    <style>
        a{
            text-decoration: none;
            color:black;
        }
    
    </style>
</head>

<body>
    

    
<div id="header">
  
    
    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 



</div>    

<div id="pagina">
   

    
    

<div id="content">
    <h1 style="font-family:Tahoma;"></h1>
    <center>
        <div id="keuze-menu">
            <table id='keuzetabel'><tr id="kztr">
                <th id="kzth" width='200'><a href="location.php"><div id='keuze'><img src='icons/planning.png' width='250' height='250' /><br /><br />Plannen</div></a></th>
                <th id="kzth"><a href="beheer.php"><div id='keuze' ><img src='icons/beheer.png' width='250' height='250' /><br /><br />Beheer</div></a></th>
                </tr>
            </table>
               
    
    </div>
    </center>
</div>
         <?php include 'footer.php'; ?>

 </div>  
  <?php

if($_SESSION['gebrww'] == md5('wachtwoord')){
    
    
    
echo "    <div id='changeww'>

      
    
    </div>
    <div id='wwchange'><h1><span>Wachtwoord</span></h1><p><span>Uw wachtwoord is nog niet gewijzigd,</span><br /><span>U dient deze nu te wijzigen:</span></p>
        <form action='changeww.php'method='POST'>
        <span style='font-size:13px'>Nieuw wachtwoord:</span>
            <input type='password' name='nieuw-ww1' required/><br />
        <span style='font-size:13px'>Herhaal wachtwoord:</span>
            <input type='password' name='nieuw-ww2' required/>
        <br /><br />
            <input type='submit' value='Wijzigen' />
        ";
    if(isset($_SESSION['changeNotOk'])){
        echo "<p>Wachtwoorden komen niet overeen<br />Voer een opnieuw het wachtwoord in.</p>";
    }
    
    echo"
        </form>
    </div>";
            
            
    }
?>
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