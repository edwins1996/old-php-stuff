<?php
session_start();

?>
<!doctype html>
<html>

<head>
<title>Login</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="test.css" />
</head>

<body>
    

    
<div id="header">

    
    
    <img id="logo" src="ELIPS2.png" width="300" height="75"/> 



</div>    

<div id="pagina">

    

    
    
</div>
<div id="content">
    <h1 style="font-family:Tahoma;">Inloggen</h1>
    <br />
    <form action="inlogcheck.php" method="post">
    <span>Gebruikersnaam:</span><br />
    <input type="text" name="naam-gebruiker" size=25 autocomplete="off" autofocus required/>  <br />  
        
    <span>Wachtwoord:</span><br />
    <input type="password" name="wachtw-gebruiker" size=25 autocomplete="new-password" required/><br /><br />
    
    <input type="submit" value="Inloggen" />
    </form>
<?php
if(isset($_SESSION['functie'])){
    if($_SESSION['functie'] == 'nietcorrect'){
        echo "<p style='color:red;'>Gebruikersnaam en/of wachtwoord zijn onjuist.<br />Probeer het opnieuw.</p>";
    }
}    
    

    ?>
    
</div>
    
    
</body>
</html> 