<?php
session_start();
$input="foto";
$foto1=$_FILES[$input]['tmp_name'];
//$target= $place.$_FILES[$input]['name'];
$telling = substr($_FILES[$input]['name'], 0, strrpos($_FILES[$input]['name'], "."));
echo $telling . '<br /> test' . $telling;


if ($_FILES[$input]['size']){$naamfoto1=$telling.".jpg";}
function ResizeImage($im,$maxwidth,$maxheight,$name,$dir){
global $newwidth;
global $newheight;
        $width = imagesx($im);
        $height = imagesy($im);

        if(($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)){
                if($maxwidth && $width > $maxwidth){
                        $widthratio = $maxwidth/$width;
                        $RESIZEWIDTH=true;
                }
                if($maxheight && $height > $maxheight){
                        $heightratio = $maxheight/$height;
                        $RESIZEHEIGHT=true;
                }
                if($RESIZEWIDTH && $RESIZEHEIGHT){
                        if($widthratio < $heightratio){
                                $ratio = $widthratio;
                        }else{
                                $ratio = $heightratio;
                        }
                }elseif($RESIZEWIDTH){
                        $ratio = $widthratio;
                }elseif($RESIZEHEIGHT){
                        $ratio = $heightratio;
                }
            $newwidth = $width * $ratio;
        $newheight = $height * $ratio;
                if(function_exists("imagecopyresampled")){
                      $newim = imagecreatetruecolor($newwidth, $newheight);
                      imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                }else{
                        $newim = imagecreate($newwidth, $newheight);
                      imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                }
        ImageJpeg ($newim,$dir.$name .".jpg");
                ImageDestroy ($newim);
echo" Verkleind en toegevoegd/gewijzigd <br>Breedte x Hoogte=".$newwidth." x ".$newheight;
        }else{
                ImageJpeg ($im,$dir.$name .".jpg");
            $newwidth = $width;
        $newheight = $height;
echo" Niet verkleind maar toegevoegd/gewijzigd <br>Breedte x Hoogte=".$newwidth." x ".$newheight;
        }



}

$place="../Afbeeldingschrijven/img/";
$RESIZEWIDTH=800;
$RESIZEHEIGHT=800;
    


$FILENAME=$telling;
if($_FILES[$input]['size']){

if($_FILES[$input]['type'] == "image/pjpeg" || $_FILES[$input]['type'] == "image/jpeg"){
   $im = imagecreatefromjpeg($_FILES[$input]['tmp_name']);
}
elseif($_FILES[$input]['type'] == "image/x-png" || $_FILES[$input]['type'] == "image/png"){
 $im = imagecreatefrompng($_FILES[$input]['tmp_name']);
}
elseif($_FILES[$input]['type'] == "image/gif"){
 $im = imagecreatefromgif($_FILES[$input]['tmp_name']);
}
     if($im){
                if(file_exists("$FILENAME.jpg")){
                        unlink("$FILENAME.jpg");
                }
        $width = imagesx($im);
        $height = imagesy($im);
$FILENAME2 = str_replace(" ", "_", $FILENAME);
ResizeImage($im,$RESIZEWIDTH,$RESIZEHEIGHT,$FILENAME2,$place);
            ImageDestroy ($im);
echo $input." ".$place.$FILENAME."<br>";
        }
		else{
			$_SESSION['status'] = 'Niet goed'; 
           
		}
}     
        //echo "copy($foto1,$target)";
header ('location: ../lists/documentlist.php');
//header("Location: afbeeldingenbeheer.php");
?>