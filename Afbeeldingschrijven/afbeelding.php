<form action="afbeeldinginsert.php" method="post" name="form1" target="_self" ENCTYPE='multipart/form-data'>
<table>
<tr  id='kzth'>
 <td id='kzth'><H3>Afbeelding toevoegen</H3>
 </td>

</tr>

  <tr id='kzth'>
      <td id='kzth'><input id="foto" name="foto" type="file" size="40" onchange="functie();" required></td>
  </tr>
</table>

<input type='submit' value=' Verstuur '>
<H3>Afbeeldingen bekijken/verwijderen</H3>
<table ><tr id='kzth'>
       <th id='kzth' align="left">Voorbeeld:</th>
   <th id='kzth' align="left">Bestandsnaam:</th>
   <th id='kzth' align="left"></th>
   </tr>
<?php
chdir('img');
$d = dir(".");
while (false !== ($entry = $d->read())) {
    if($entry!="."&&$entry!=".."){
   if(substr($entry, -3) == 'jpg'){
   echo "
	<script>
	function test(){
		var test = confirm('Weet u het zeker?');
if(test == true){
	
}else if(test != true){
	event.preventDefault();
	return false;
}
	}
</script>
   <tr id='kztr'><td id='kzth'><img src='../Afbeeldingschrijven/img/$entry' height=80px /></td><td id='kzth'><a href=img/$entry target=_blank>$entry</a></td><td id='kzth'><a href='fotodelete.php?foto=$entry' onclick='test();'><img src='icons/trash.png' width=20 /></a></td></tr>";
   }
}
}
$d->close();
?>
</table>
</form>