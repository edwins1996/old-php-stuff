<?php
include 'database.php';
session_start();

$showlessons = mysqli_query($connectie, "SELECT * FROM lesstof, niveaus WHERE lesstof.niveauid = niveaus.niveauid");

echo "<table border=1 style='border-collapse:collapse;'>
<tr><th>Lesstofnaam</th><th>Niveau</th></tr>";

while($les = mysqli_fetch_object($showlessons)){
echo "<tr><td width=500>$les->lesstofnaam</td><td width=100>$les->niveaunaam</td><td>$les->duur</td></tr>";
}
echo "</table>";

?>