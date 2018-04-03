<?php
require('fpdf181/fpdf.php');
include 'database.php';
session_start();

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf-> SetY(5);
$pdf-> SetX(5);
$pdf->Image('icons/leerdockict.jpg',5,5,-300);

$weeknr = $_GET['weeknr'];
$jaarnr = $_GET['jaarnr'];
$groepid = $_GET['groepid'];
$week_start = new DateTime();
$week_start->setISODate($jaarnr,$weeknr);
$datum=$week_start->format('Y-m-d');

//QUERY'S

 $subb1 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 1");
 $subb2 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 2");
 $subb3 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 3");
 $subb4 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 4");
 $subb5 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 5");
 $subb6 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 6");
 $subb7 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 7");
 $subb8 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 8");
 $subb9 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 9");
 $subb10 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 10");
 $subb11 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 11");
 $subb12 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 12");
 $subb13 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 13");
 $subb14 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 14");
 $subb15 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 15");
 $subb16 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 16");
 $subb17 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 17");
 $subb18 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 18");
 $subb19 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 19");
 $subb20 = mysqli_query($connectie, "SELECT * FROM planning, subplanning, lesstof, plm, lokaal WHERE lokaal.lokaalid = subplanning.lokaalid AND subplanning.plmid = plm.plmid AND planning.planningid = subplanning.planningid AND weekid = $weeknr AND jaar = $jaarnr AND groepid = $groepid AND lesstof.lesstofid = subplanning.lesstofid AND lesblok = 20");

$subpl1 = mysqli_fetch_object($subb1);
$subpl2 = mysqli_fetch_object($subb2);
$subpl3 = mysqli_fetch_object($subb3);
$subpl4 = mysqli_fetch_object($subb4);
$subpl5 = mysqli_fetch_object($subb5);
$subpl6 = mysqli_fetch_object($subb6);
$subpl7 = mysqli_fetch_object($subb7);
$subpl8 = mysqli_fetch_object($subb8);
$subpl9 = mysqli_fetch_object($subb9);
$subpl10 = mysqli_fetch_object($subb10);
$subpl11 = mysqli_fetch_object($subb11);
$subpl12 = mysqli_fetch_object($subb12);
$subpl13 = mysqli_fetch_object($subb13);
$subpl14 = mysqli_fetch_object($subb14);
$subpl15 = mysqli_fetch_object($subb15);
$subpl16 = mysqli_fetch_object($subb16);
$subpl17 = mysqli_fetch_object($subb17);
$subpl18 = mysqli_fetch_object($subb18);
$subpl19 = mysqli_fetch_object($subb19);
$subpl20 = mysqli_fetch_object($subb20);

$grpselect = mysqli_query($connectie, "SELECT * FROM groepen, regios, niveaus WHERE groepen.regioid = regios.regioid AND groepen.niveauid = niveaus.niveauid AND groepen.groepid = $groepid");
$grp = mysqli_fetch_object($grpselect);

$pdf->SetFillColor(255, 153, 0);
$pdf->SetFont('Arial','B',21);
$pdf->Cell(102.5,10,"",0,0,'R');
$pdf->Cell(185,30.75,"    Rooster week $weeknr - $jaarnr $grp->niveaunaam-$grp->regionaam-$grp->cohort",0,1,'L',1);
$pdf->Cell(120,5,"",0,1);
$pdf->Cell(40,10,"",0,1);



$pdf->SetFillColor(153, 153, 153);
$pdf->SetFont('Arial','B',14);

$pdf->Cell(40,10,"",0,0);
$pdf->Cell(40,10,"MAANDAG",0,0,'C',1);
$pdf->Cell(40,10,'DINSDAG',0,0,'C',1);
$pdf->Cell(40,10,'WOENSDAG',0,0,'C',1);
$pdf->Cell(40,10,'DONDERDAG',0,0,'C',1);
$pdf->Cell(40,10,'VRIJDAG',0,1,'C',1);

$pdf->SetFont('Arial','B',14);

$pdf->Cell(40,7.5,"",0,0);
$pdf->Cell(40,7.5,''.date("d-m-Y",strtotime($datum)).'',0,0,'C',1);
$pdf->Cell(40,7.5,''.date("d-m-Y",strtotime("+1 days",strtotime($datum))).'',0,0,'C',1);
$pdf->Cell(40,7.5,''.date("d-m-Y",strtotime("+2 days",strtotime($datum))).'',0,0,'C',1);
$pdf->Cell(40,7.5,''.date("d-m-Y",strtotime("+3 days",strtotime($datum))).'',0,0,'C',1);
$pdf->Cell(40,7.5,''.date("d-m-Y",strtotime("+4 days",strtotime($datum))).'',0,1,'C',1);


$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,'08:30 - 10:00',0,0, 'C',1);

$pdf->SetFont('Arial','',10);
if(mysqli_num_rows($subb1) != 0){
 
$val1 = substr($subpl1->achtergrondkleur, 1,2);
$val2 = substr($subpl1->achtergrondkleur, 3,2);
$val3 = substr($subpl1->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);    
$vall1 = substr($subpl1->letterkleur, 1,2);
$vall2 = substr($subpl1->letterkleur, 3,2);
$vall3 = substr($subpl1->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les1 = substr($subpl1->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les1",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb2) != 0){
$val1 = substr($subpl2->achtergrondkleur, 1,2);
$val2 = substr($subpl2->achtergrondkleur, 3,2);
$val3 = substr($subpl2->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl2->letterkleur, 1,2);
$vall2 = substr($subpl2->letterkleur, 3,2);
$vall3 = substr($subpl2->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les2 = substr($subpl2->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les2",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb3) != 0){
$val1 = substr($subpl3->achtergrondkleur, 1,2);
$val2 = substr($subpl3->achtergrondkleur, 3,2);
$val3 = substr($subpl3->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);   
$vall1 = substr($subpl3->letterkleur, 1,2);
$vall2 = substr($subpl3->letterkleur, 3,2);
$vall3 = substr($subpl3->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les3 = substr($subpl3->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les3",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb4) != 0){
$val1 = substr($subpl4->achtergrondkleur, 1,2);
$val2 = substr($subpl4->achtergrondkleur, 3,2);
$val3 = substr($subpl4->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);   
$vall1 = substr($subpl4->letterkleur, 1,2);
$vall2 = substr($subpl4->letterkleur, 3,2);
$vall3 = substr($subpl4->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les4 = substr($subpl4->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les4",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb5) != 0){
$val1 = substr($subpl5->achtergrondkleur, 1,2);
$val2 = substr($subpl5->achtergrondkleur, 3,2);
$val3 = substr($subpl5->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl5->letterkleur, 1,2);
$vall2 = substr($subpl5->letterkleur, 3,2);
$vall3 = substr($subpl5->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les5 = substr($subpl5->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les5",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}



$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0,'L',1);

$pdf->SetFont('Arial',"",10);
if(mysqli_num_rows($subb1) != 0){
$val1 = substr($subpl1->achtergrondkleur, 1,2);
$val2 = substr($subpl1->achtergrondkleur, 3,2);
$val3 = substr($subpl1->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);   
$vall1 = substr($subpl1->letterkleur, 1,2);
$vall2 = substr($subpl1->letterkleur, 3,2);
$vall3 = substr($subpl1->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl1->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb2) != 0){
$val1 = substr($subpl2->achtergrondkleur, 1,2);
$val2 = substr($subpl2->achtergrondkleur, 3,2);
$val3 = substr($subpl2->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl2->letterkleur, 1,2);
$vall2 = substr($subpl2->letterkleur, 3,2);
$vall3 = substr($subpl2->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl2->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb3) != 0){
$val1 = substr($subpl3->achtergrondkleur, 1,2);
$val2 = substr($subpl3->achtergrondkleur, 3,2);
$val3 = substr($subpl3->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);  
$vall1 = substr($subpl3->letterkleur, 1,2);
$vall2 = substr($subpl3->letterkleur, 3,2);
$vall3 = substr($subpl3->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl3->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb4) != 0){
$val1 = substr($subpl4->achtergrondkleur, 1,2);
$val2 = substr($subpl4->achtergrondkleur, 3,2);
$val3 = substr($subpl4->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);  
$vall1 = substr($subpl4->letterkleur, 1,2);
$vall2 = substr($subpl4->letterkleur, 3,2);
$vall3 = substr($subpl4->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl4->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb5) != 0){
$val1 = substr($subpl5->achtergrondkleur, 1,2);
$val2 = substr($subpl5->achtergrondkleur, 3,2);
$val3 = substr($subpl5->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl5->letterkleur, 1,2);
$vall2 = substr($subpl5->letterkleur, 3,2);
$vall3 = substr($subpl5->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl5->naam",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0,'',1);

$pdf->SetFont('Arial',"",10);
if(mysqli_num_rows($subb1) != 0){
$val1 = substr($subpl1->achtergrondkleur, 1,2);
$val2 = substr($subpl1->achtergrondkleur, 3,2);
$val3 = substr($subpl1->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);    
$vall1 = substr($subpl1->letterkleur, 1,2);
$vall2 = substr($subpl1->letterkleur, 3,2);
$vall3 = substr($subpl1->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl1->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb2) != 0){
$val1 = substr($subpl2->achtergrondkleur, 1,2);
$val2 = substr($subpl2->achtergrondkleur, 3,2);
$val3 = substr($subpl2->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl2->letterkleur, 1,2);
$vall2 = substr($subpl2->letterkleur, 3,2);
$vall3 = substr($subpl2->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl2->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb3) != 0){
$val1 = substr($subpl3->achtergrondkleur, 1,2);
$val2 = substr($subpl3->achtergrondkleur, 3,2);
$val3 = substr($subpl3->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl3->letterkleur, 1,2);
$vall2 = substr($subpl3->letterkleur, 3,2);
$vall3 = substr($subpl3->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl3->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb4) != 0){
$val1 = substr($subpl4->achtergrondkleur, 1,2);
$val2 = substr($subpl4->achtergrondkleur, 3,2);
$val3 = substr($subpl4->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);  
$vall1 = substr($subpl4->letterkleur, 1,2);
$vall2 = substr($subpl4->letterkleur, 3,2);
$vall3 = substr($subpl4->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl4->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb5) != 0){
$val1 = substr($subpl5->achtergrondkleur, 1,2);
$val2 = substr($subpl5->achtergrondkleur, 3,2);
$val3 = substr($subpl5->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);  
$vall1 = substr($subpl5->letterkleur, 1,2);
$vall2 = substr($subpl5->letterkleur, 3,2);
$vall3 = substr($subpl5->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl5->lokaalnaam",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}



if(mysqli_num_rows($subb1) != 0 || mysqli_num_rows($subb2) != 0 || mysqli_num_rows($subb3) != 0 || mysqli_num_rows($subb4) != 0 || mysqli_num_rows($subb5) != 0){
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0, 'C',1);
    if(mysqli_num_rows($subb1) != 0){
$val1 = substr($subpl1->achtergrondkleur, 1,2);
$val2 = substr($subpl1->achtergrondkleur, 3,2);
$val3 = substr($subpl1->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);    
$vall1 = substr($subpl1->letterkleur, 1,2);
$vall2 = substr($subpl1->letterkleur, 3,2);
$vall3 = substr($subpl1->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl1->eindtijd != '' && $subpl1->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl1->begintijd - $subpl1->eindtijd",0,0,'L',1);
}
  elseif($subpl1->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl1->eindtijd",0,0,'L',1);
}   elseif($subpl1->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl1->begintijd",0,0,'L',1);
}     
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
        
    $pdf->Cell(40,6,"",0,0,'L',1);
}
    if(mysqli_num_rows($subb2) != 0){
$val1 = substr($subpl2->achtergrondkleur, 1,2);
$val2 = substr($subpl2->achtergrondkleur, 3,2);
$val3 = substr($subpl2->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl2->letterkleur, 1,2);
$vall2 = substr($subpl2->letterkleur, 3,2);
$vall3 = substr($subpl2->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl2->eindtijd != '' && $subpl2->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl2->begintijd - $subpl2->eindtijd",0,0,'L',1);

}
   elseif($subpl2->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl2->eindtijd",0,0,'L',1);
}   elseif($subpl2->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl2->begintijd",0,0,'L',1);
}       
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
    if(mysqli_num_rows($subb3) != 0){
$val1 = substr($subpl3->achtergrondkleur, 1,2);
$val2 = substr($subpl3->achtergrondkleur, 3,2);
$val3 = substr($subpl3->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl3->letterkleur, 1,2);
$vall2 = substr($subpl3->letterkleur, 3,2);
$vall3 = substr($subpl3->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl3->eindtijd != '' && $subpl3->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl3->begintijd - $subpl3->eindtijd",0,0,'L',1);

}
      elseif($subpl3->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl3->eindtijd",0,0,'L',1);
}   elseif($subpl3->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl3->begintijd",0,0,'L',1);
}    
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
if(mysqli_num_rows($subb4) != 0){
$val1 = substr($subpl4->achtergrondkleur, 1,2);
$val2 = substr($subpl4->achtergrondkleur, 3,2);
$val3 = substr($subpl4->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl4->letterkleur, 1,2);
$vall2 = substr($subpl4->letterkleur, 3,2);
$vall3 = substr($subpl4->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl4->eindtijd != '' && $subpl4->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl4->begintijd - $subpl4->eindtijd",0,0,'L',1);

}
   elseif($subpl4->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl4->eindtijd",0,0,'L',1);
}  elseif($subpl4->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl4->begintijd",0,0,'L',1);
}        
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
    if(mysqli_num_rows($subb5) != 0){
$val1 = substr($subpl5->achtergrondkleur, 1,2);
$val2 = substr($subpl5->achtergrondkleur, 3,2);
$val3 = substr($subpl5->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl5->letterkleur, 1,2);
$vall2 = substr($subpl5->letterkleur, 3,2);
$vall3 = substr($subpl5->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl5->eindtijd != '' && $subpl5->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl5->begintijd - $subpl5->eindtijd",0,0,'L',1);

}
   elseif($subpl5->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl5->eindtijd",0,0,'L',1);
}    elseif($subpl5->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl5->begintijd",0,1,'L',1);
}      
else{
    $pdf->Cell(40,6,"",0,1,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,1,'L',1);
}
}



$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,4,"",0,0, 'C',1);

$pdf->SetFont('Arial',"",10);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,1,'',1);

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40,6,'10:15 - 11:45',0,0, 'C',1);

$pdf->SetFont('Arial',"",10);
if(mysqli_num_rows($subb6) != 0){
$val1 = substr($subpl6->achtergrondkleur, 1,2);
$val2 = substr($subpl6->achtergrondkleur, 3,2);
$val3 = substr($subpl6->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl6->letterkleur, 1,2);
$vall2 = substr($subpl6->letterkleur, 3,2);
$vall3 = substr($subpl6->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les6 = substr($subpl6->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les6",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb7) != 0){
$val1 = substr($subpl7->achtergrondkleur, 1,2);
$val2 = substr($subpl7->achtergrondkleur, 3,2);
$val3 = substr($subpl7->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);    
$vall1 = substr($subpl7->letterkleur, 1,2);
$vall2 = substr($subpl7->letterkleur, 3,2);
$vall3 = substr($subpl7->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les7 = substr($subpl7->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les7",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb8) != 0){
$val1 = substr($subpl8->achtergrondkleur, 1,2);
$val2 = substr($subpl8->achtergrondkleur, 3,2);
$val3 = substr($subpl8->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl8->letterkleur, 1,2);
$vall2 = substr($subpl8->letterkleur, 3,2);
$vall3 = substr($subpl8->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les8 = substr($subpl8->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les8",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb9) != 0){
$val1 = substr($subpl9->achtergrondkleur, 1,2);
$val2 = substr($subpl9->achtergrondkleur, 3,2);
$val3 = substr($subpl9->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl9->letterkleur, 1,2);
$vall2 = substr($subpl9->letterkleur, 3,2);
$vall3 = substr($subpl9->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les9 = substr($subpl9->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les9",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb10) != 0){
$val1 = substr($subpl10->achtergrondkleur, 1,2);
$val2 = substr($subpl10->achtergrondkleur, 3,2);
$val3 = substr($subpl10->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);  
$vall1 = substr($subpl10->letterkleur, 1,2);
$vall2 = substr($subpl10->letterkleur, 3,2);
$vall3 = substr($subpl10->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les10 = substr($subpl10->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les10",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0,'',1);

$pdf->SetFont('Arial',"",10);
if(mysqli_num_rows($subb6) != 0){
$val1 = substr($subpl6->achtergrondkleur, 1,2);
$val2 = substr($subpl6->achtergrondkleur, 3,2);
$val3 = substr($subpl6->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl6->letterkleur, 1,2);
$vall2 = substr($subpl6->letterkleur, 3,2);
$vall3 = substr($subpl6->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl6->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb7) != 0){
$val1 = substr($subpl7->achtergrondkleur, 1,2);
$val2 = substr($subpl7->achtergrondkleur, 3,2);
$val3 = substr($subpl7->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);  
$vall1 = substr($subpl7->letterkleur, 1,2);
$vall2 = substr($subpl7->letterkleur, 3,2);
$vall3 = substr($subpl7->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl7->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb8) != 0){
$val1 = substr($subpl8->achtergrondkleur, 1,2);
$val2 = substr($subpl8->achtergrondkleur, 3,2);
$val3 = substr($subpl8->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl8->letterkleur, 1,2);
$vall2 = substr($subpl8->letterkleur, 3,2);
$vall3 = substr($subpl8->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl8->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb9) != 0){
$val1 = substr($subpl9->achtergrondkleur, 1,2);
$val2 = substr($subpl9->achtergrondkleur, 3,2);
$val3 = substr($subpl9->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);  
$vall1 = substr($subpl9->letterkleur, 1,2);
$vall2 = substr($subpl9->letterkleur, 3,2);
$vall3 = substr($subpl9->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl9->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb10) != 0){
$val1 = substr($subpl10->achtergrondkleur, 1,2);
$val2 = substr($subpl10->achtergrondkleur, 3,2);
$val3 = substr($subpl10->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);  
$vall1 = substr($subpl10->letterkleur, 1,2);
$vall2 = substr($subpl10->letterkleur, 3,2);
$vall3 = substr($subpl10->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl10->naam",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}

$pdf->SetFont('Arial',"",10);
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0,'',1);

if(mysqli_num_rows($subb6) != 0){
$val1 = substr($subpl6->achtergrondkleur, 1,2);
$val2 = substr($subpl6->achtergrondkleur, 3,2);
$val3 = substr($subpl6->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);  
$vall1 = substr($subpl6->letterkleur, 1,2);
$vall2 = substr($subpl6->letterkleur, 3,2);
$vall3 = substr($subpl6->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl6->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb7) != 0){
$val1 = substr($subpl7->achtergrondkleur, 1,2);
$val2 = substr($subpl7->achtergrondkleur, 3,2);
$val3 = substr($subpl7->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl7->letterkleur, 1,2);
$vall2 = substr($subpl7->letterkleur, 3,2);
$vall3 = substr($subpl7->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl7->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb8) != 0){
    $val1 = substr($subpl8->achtergrondkleur, 1,2);
$val2 = substr($subpl8->achtergrondkleur, 3,2);
$val3 = substr($subpl8->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);  
$vall1 = substr($subpl8->letterkleur, 1,2);
$vall2 = substr($subpl8->letterkleur, 3,2);
$vall3 = substr($subpl8->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl8->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb9) != 0){
$val1 = substr($subpl9->achtergrondkleur, 1,2);
$val2 = substr($subpl9->achtergrondkleur, 3,2);
$val3 = substr($subpl9->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl9->letterkleur, 1,2);
$vall2 = substr($subpl9->letterkleur, 3,2);
$vall3 = substr($subpl9->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl9->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb10) != 0){
    $val1 = substr($subpl10->achtergrondkleur, 1,2);
$val2 = substr($subpl10->achtergrondkleur, 3,2);
$val3 = substr($subpl10->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);   
$vall1 = substr($subpl10->letterkleur, 1,2);
$vall2 = substr($subpl10->letterkleur, 3,2);
$vall3 = substr($subpl10->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl10->lokaalnaam",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}

if(mysqli_num_rows($subb6) != 0 || mysqli_num_rows($subb7) != 0 || mysqli_num_rows($subb8) != 0 || mysqli_num_rows($subb9) != 0 || mysqli_num_rows($subb10) != 0){
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0, 'C',1);
if(mysqli_num_rows($subb6) != 0){
$val1 = substr($subpl6->achtergrondkleur, 1,2);
$val2 = substr($subpl6->achtergrondkleur, 3,2);
$val3 = substr($subpl6->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);    
$vall1 = substr($subpl6->letterkleur, 1,2);
$vall2 = substr($subpl6->letterkleur, 3,2);
$vall3 = substr($subpl6->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl6->eindtijd != '' && $subpl6->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl6->begintijd - $subpl6->eindtijd",0,0,'L',1);

}
 elseif($subpl6->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl6->eindtijd",0,0,'L',1);
}   elseif($subpl6->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl6->begintijd",0,0,'L',1);
}      
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
if(mysqli_num_rows($subb7) != 0){
$val1 = substr($subpl7->achtergrondkleur, 1,2);
$val2 = substr($subpl7->achtergrondkleur, 3,2);
$val3 = substr($subpl7->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl7->letterkleur, 1,2);
$vall2 = substr($subpl7->letterkleur, 3,2);
$vall3 = substr($subpl7->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl7->eindtijd != '' && $subpl7->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl7->begintijd - $subpl7->eindtijd",0,0,'L',1);

}
  elseif($subpl7->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl7->eindtijd",0,0,'L',1);
}    elseif($subpl7->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl7->begintijd",0,0,'L',1);
}      
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
    if(mysqli_num_rows($subb8) != 0){
$val1 = substr($subpl8->achtergrondkleur, 1,2);
$val2 = substr($subpl8->achtergrondkleur, 3,2);
$val3 = substr($subpl8->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl8->letterkleur, 1,2);
$vall2 = substr($subpl8->letterkleur, 3,2);
$vall3 = substr($subpl8->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl8->eindtijd != '' && $subpl8->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl8->begintijd - $subpl8->eindtijd",0,0,'L',1);

}
 elseif($subpl8->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl8->eindtijd",0,0,'L',1);
}  elseif($subpl8->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl8->begintijd",0,0,'L',1);
}         
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
    if(mysqli_num_rows($subb9) != 0){
$val1 = substr($subpl9->achtergrondkleur, 1,2);
$val2 = substr($subpl9->achtergrondkleur, 3,2);
$val3 = substr($subpl9->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl9->letterkleur, 1,2);
$vall2 = substr($subpl9->letterkleur, 3,2);
$vall3 = substr($subpl9->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl9->eindtijd != '' && $subpl9->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl9->begintijd - $subpl9->eindtijd",0,0,'L',1);

}
  elseif($subpl9->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl9->eindtijd",0,0,'L',1);
}  elseif($subpl9->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl9->begintijd",0,0,'L',1);
}        
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
    if(mysqli_num_rows($subb10) != 0){
$val1 = substr($subpl10->achtergrondkleur, 1,2);
$val2 = substr($subpl10->achtergrondkleur, 3,2);
$val3 = substr($subpl10->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl10->letterkleur, 1,2);
$vall2 = substr($subpl10->letterkleur, 3,2);
$vall3 = substr($subpl10->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl10->eindtijd != '' && $subpl10->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl10->begintijd - $subpl10->eindtijd",0,0,'L',1);

}
 elseif($subpl10->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl10->eindtijd",0,0,'L',1);
}   elseif($subpl10->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl10->begintijd",0,1,'L',1);
}        
else{
    $pdf->Cell(40,6,"",0,1,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,1,'L',1);
}
}

$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,4,"",0,0, 'C',1);

$pdf->SetFont('Arial',"",10);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,1,'',1);


$pdf->SetFillColor(153, 153, 153);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'Lunch',0,0,'C',1);

$pdf->SetFont('Arial',"",10);
$pdf->Cell(40,6,'PAUZE',0,0,'C',1);
$pdf->Cell(40,6,'PAUZE',0,0,'C',1);
$pdf->Cell(40,6,'PAUZE',0,0,'C',1);
$pdf->Cell(40,6,'PAUZE',0,0,'C',1);
$pdf->Cell(40,6,'PAUZE',0,1,'C',1);

$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,4,"",0,0, 'C',1);

$pdf->SetFont('Arial',"",10);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,1,'',1);

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40,6,'12:45 - 14:15',0,0, 'C',1);

$pdf->SetFont('Arial',"",10);
if(mysqli_num_rows($subb11) != 0){
$val1 = substr($subpl11->achtergrondkleur, 1,2);
$val2 = substr($subpl11->achtergrondkleur, 3,2);
$val3 = substr($subpl11->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);   
$vall1 = substr($subpl11->letterkleur, 1,2);
$vall2 = substr($subpl11->letterkleur, 3,2);
$vall3 = substr($subpl11->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les11 = substr($subpl11->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les11",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb12) != 0){
$val1 = substr($subpl12->achtergrondkleur, 1,2);
$val2 = substr($subpl12->achtergrondkleur, 3,2);
$val3 = substr($subpl12->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl12->letterkleur, 1,2);
$vall2 = substr($subpl12->letterkleur, 3,2);
$vall3 = substr($subpl12->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les12 = substr($subpl12->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les12",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb13) != 0){
$val1 = substr($subpl13->achtergrondkleur, 1,2);
$val2 = substr($subpl13->achtergrondkleur, 3,2);
$val3 = substr($subpl13->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl13->letterkleur, 1,2);
$vall2 = substr($subpl13->letterkleur, 3,2);
$vall3 = substr($subpl13->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les13 = substr($subpl13->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les13",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb14) != 0){
$val1 = substr($subpl14->achtergrondkleur, 1,2);
$val2 = substr($subpl14->achtergrondkleur, 3,2);
$val3 = substr($subpl14->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl14->letterkleur, 1,2);
$vall2 = substr($subpl14->letterkleur, 3,2);
$vall3 = substr($subpl14->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les14 = substr($subpl14->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les14",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb15) != 0){
$val1 = substr($subpl15->achtergrondkleur, 1,2);
$val2 = substr($subpl15->achtergrondkleur, 3,2);
$val3 = substr($subpl15->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl15->letterkleur, 1,2);
$vall2 = substr($subpl15->letterkleur, 3,2);
$vall3 = substr($subpl15->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les15 = substr($subpl15->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les15",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0,'',1);

$pdf->SetFont('Arial',"",10);
if(mysqli_num_rows($subb11) != 0){
$val1 = substr($subpl11->achtergrondkleur, 1,2);
$val2 = substr($subpl11->achtergrondkleur, 3,2);
$val3 = substr($subpl11->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl11->letterkleur, 1,2);
$vall2 = substr($subpl11->letterkleur, 3,2);
$vall3 = substr($subpl11->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl11->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb12) != 0){
    $val1 = substr($subpl12->achtergrondkleur, 1,2);
$val2 = substr($subpl12->achtergrondkleur, 3,2);
$val3 = substr($subpl12->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl12->letterkleur, 1,2);
$vall2 = substr($subpl12->letterkleur, 3,2);
$vall3 = substr($subpl12->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl12->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb13) != 0){
$val1 = substr($subpl13->achtergrondkleur, 1,2);
$val2 = substr($subpl13->achtergrondkleur, 3,2);
$val3 = substr($subpl13->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl13->letterkleur, 1,2);
$vall2 = substr($subpl13->letterkleur, 3,2);
$vall3 = substr($subpl13->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);    
$pdf->Cell(40,6,"$subpl13->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb14) != 0){
$val1 = substr($subpl14->achtergrondkleur, 1,2);
$val2 = substr($subpl14->achtergrondkleur, 3,2);
$val3 = substr($subpl14->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3); 
$vall1 = substr($subpl14->letterkleur, 1,2);
$vall2 = substr($subpl14->letterkleur, 3,2);
$vall3 = substr($subpl14->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl14->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb15) != 0){
$val1 = substr($subpl15->achtergrondkleur, 1,2);
$val2 = substr($subpl15->achtergrondkleur, 3,2);
$val3 = substr($subpl15->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl15->letterkleur, 1,2);
$vall2 = substr($subpl15->letterkleur, 3,2);
$vall3 = substr($subpl15->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl15->naam",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0,'',1);

$pdf->SetFont('Arial',"",10);
if(mysqli_num_rows($subb11) != 0){
$val1 = substr($subpl11->achtergrondkleur, 1,2);
$val2 = substr($subpl11->achtergrondkleur, 3,2);
$val3 = substr($subpl11->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl11->letterkleur, 1,2);
$vall2 = substr($subpl11->letterkleur, 3,2);
$vall3 = substr($subpl11->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl11->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb12) != 0){
$val1 = substr($subpl12->achtergrondkleur, 1,2);
$val2 = substr($subpl12->achtergrondkleur, 3,2);
$val3 = substr($subpl12->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl12->letterkleur, 1,2);
$vall2 = substr($subpl12->letterkleur, 3,2);
$vall3 = substr($subpl12->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl12->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb13) != 0){
$val1 = substr($subpl13->achtergrondkleur, 1,2);
$val2 = substr($subpl13->achtergrondkleur, 3,2);
$val3 = substr($subpl13->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl13->letterkleur, 1,2);
$vall2 = substr($subpl13->letterkleur, 3,2);
$vall3 = substr($subpl13->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl13->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb14) != 0){
$val1 = substr($subpl14->achtergrondkleur, 1,2);
$val2 = substr($subpl14->achtergrondkleur, 3,2);
$val3 = substr($subpl14->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl14->letterkleur, 1,2);
$vall2 = substr($subpl14->letterkleur, 3,2);
$vall3 = substr($subpl14->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl14->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb15) != 0){
    $val1 = substr($subpl15->achtergrondkleur, 1,2);
$val2 = substr($subpl15->achtergrondkleur, 3,2);
$val3 = substr($subpl15->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl15->letterkleur, 1,2);
$vall2 = substr($subpl15->letterkleur, 3,2);
$vall3 = substr($subpl15->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl15->lokaalnaam",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}

if(mysqli_num_rows($subb11) != 0 || mysqli_num_rows($subb12) != 0 || mysqli_num_rows($subb13) != 0 || mysqli_num_rows($subb14) != 0 || mysqli_num_rows($subb15) != 0){
    
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0, 'C',1);
    if(mysqli_num_rows($subb11) != 0){
$val1 = substr($subpl11->achtergrondkleur, 1,2);
$val2 = substr($subpl11->achtergrondkleur, 3,2);
$val3 = substr($subpl11->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);    
$vall1 = substr($subpl11->letterkleur, 1,2);
$vall2 = substr($subpl11->letterkleur, 3,2);
$vall3 = substr($subpl11->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl11->eindtijd != '' && $subpl11->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl11->begintijd - $subpl11->eindtijd",0,0,'L',1);

}
 elseif($subpl11->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl11->eindtijd",0,0,'L',1);
}    elseif($subpl11->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl11->begintijd",0,0,'L',1);
}       
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
    if(mysqli_num_rows($subb12) != 0){
$val1 = substr($subpl12->achtergrondkleur, 1,2);
$val2 = substr($subpl12->achtergrondkleur, 3,2);
$val3 = substr($subpl12->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl12->letterkleur, 1,2);
$vall2 = substr($subpl12->letterkleur, 3,2);
$vall3 = substr($subpl12->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl12->eindtijd != '' && $subpl12->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl12->begintijd - $subpl12->eindtijd",0,0,'L',1);

}
 elseif($subpl12->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl12->eindtijd",0,0,'L',1);
}   elseif($subpl12->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl12->begintijd",0,0,'L',1);
}        
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
    if(mysqli_num_rows($subb13) != 0){
        
$val1 = substr($subpl13->achtergrondkleur, 1,2);
$val2 = substr($subpl13->achtergrondkleur, 3,2);
$val3 = substr($subpl13->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl13->letterkleur, 1,2);
$vall2 = substr($subpl13->letterkleur, 3,2);
$vall3 = substr($subpl13->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl13->eindtijd != '' && $subpl13->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl13->begintijd - $subpl13->eindtijd",0,0,'L',1);

}
 elseif($subpl13->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl13->eindtijd",0,0,'L',1);
}    elseif($subpl13->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl13->begintijd",0,0,'L',1);
}       
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
if(mysqli_num_rows($subb14) != 0){    
$val1 = substr($subpl14->achtergrondkleur, 1,2);
$val2 = substr($subpl14->achtergrondkleur, 3,2);
$val3 = substr($subpl14->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl14->letterkleur, 1,2);
$vall2 = substr($subpl14->letterkleur, 3,2);
$vall3 = substr($subpl14->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl14->eindtijd != '' && $subpl14->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl14->begintijd - $subpl14->eindtijd",0,0,'L',1);

}
 elseif($subpl14->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl14->eindtijd",0,0,'L',1);
}      elseif($subpl14->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl14->begintijd",0,0,'L',1);
}     
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
if(mysqli_num_rows($subb15) != 0){
$val1 = substr($subpl15->achtergrondkleur, 1,2);
$val2 = substr($subpl15->achtergrondkleur, 3,2);
$val3 = substr($subpl15->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl15->letterkleur, 1,2);
$vall2 = substr($subpl15->letterkleur, 3,2);
$vall3 = substr($subpl15->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl15->eindtijd != '' && $subpl15->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl15->begintijd - $subpl15->eindtijd",0,0,'L',1);

}
  elseif($subpl15->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl15->eindtijd",0,0,'L',1);
}   elseif($subpl15->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl15->begintijd",0,1,'L',1);
}       
else{
    $pdf->Cell(40,6,"",0,1,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,1,'L',1);
}
}

$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,4,"",0,0, 'C',1);

$pdf->SetFont('Arial',"",10);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,0,'',1);
$pdf->Cell(40,4,"",0,1,'',1);

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40,6,'14:30 - 16:00',0,0, 'C',1);

$pdf->SetFont('Arial',"",10);
if(mysqli_num_rows($subb16) != 0){
$val1 = substr($subpl16->achtergrondkleur, 1,2);
$val2 = substr($subpl16->achtergrondkleur, 3,2);
$val3 = substr($subpl16->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl16->letterkleur, 1,2);
$vall2 = substr($subpl16->letterkleur, 3,2);
$vall3 = substr($subpl16->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les16 = substr($subpl16->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les16",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb17) != 0){
$val1 = substr($subpl17->achtergrondkleur, 1,2);
$val2 = substr($subpl17->achtergrondkleur, 3,2);
$val3 = substr($subpl17->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl17->letterkleur, 1,2);
$vall2 = substr($subpl17->letterkleur, 3,2);
$vall3 = substr($subpl17->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les17 = substr($subpl17->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les17",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb18) != 0){
$val1 = substr($subpl18->achtergrondkleur, 1,2);
$val2 = substr($subpl18->achtergrondkleur, 3,2);
$val3 = substr($subpl18->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl18->letterkleur, 1,2);
$vall2 = substr($subpl18->letterkleur, 3,2);
$vall3 = substr($subpl18->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les18 = substr($subpl18->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les18",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb19) != 0){
$val1 = substr($subpl19->achtergrondkleur, 1,2);
$val2 = substr($subpl19->achtergrondkleur, 3,2);
$val3 = substr($subpl19->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl19->letterkleur, 1,2);
$vall2 = substr($subpl19->letterkleur, 3,2);
$vall3 = substr($subpl19->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les19 = substr($subpl19->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les19",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb20) != 0){
$val1 = substr($subpl20->achtergrondkleur, 1,2);
$val2 = substr($subpl20->achtergrondkleur, 3,2);
$val3 = substr($subpl20->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl20->letterkleur, 1,2);
$vall2 = substr($subpl20->letterkleur, 3,2);
$vall3 = substr($subpl20->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$les20 = substr($subpl20->lesstoftitel, 0, 20);
$pdf->Cell(40,6,"$les20",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0,'',1);

$pdf->SetFont('Arial',"",10);
if(mysqli_num_rows($subb16) != 0){
$val1 = substr($subpl16->achtergrondkleur, 1,2);
$val2 = substr($subpl16->achtergrondkleur, 3,2);
$val3 = substr($subpl16->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl16->letterkleur, 1,2);
$vall2 = substr($subpl16->letterkleur, 3,2);
$vall3 = substr($subpl16->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl16->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb17) != 0){
$val1 = substr($subpl17->achtergrondkleur, 1,2);
$val2 = substr($subpl17->achtergrondkleur, 3,2);
$val3 = substr($subpl17->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl17->letterkleur, 1,2);
$vall2 = substr($subpl17->letterkleur, 3,2);
$vall3 = substr($subpl17->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl17->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb18) != 0){
$val1 = substr($subpl18->achtergrondkleur, 1,2);
$val2 = substr($subpl18->achtergrondkleur, 3,2);
$val3 = substr($subpl18->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl18->letterkleur, 1,2);
$vall2 = substr($subpl18->letterkleur, 3,2);
$vall3 = substr($subpl18->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl18->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb19) != 0){
$val1 = substr($subpl19->achtergrondkleur, 1,2);
$val2 = substr($subpl19->achtergrondkleur, 3,2);
$val3 = substr($subpl19->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl19->letterkleur, 1,2);
$vall2 = substr($subpl19->letterkleur, 3,2);
$vall3 = substr($subpl19->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl19->naam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb20) != 0){
$val1 = substr($subpl20->achtergrondkleur, 1,2);
$val2 = substr($subpl20->achtergrondkleur, 3,2);
$val3 = substr($subpl20->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl20->letterkleur, 1,2);
$vall2 = substr($subpl20->letterkleur, 3,2);
$vall3 = substr($subpl20->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"$subpl20->naam",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0,'',1);

$pdf->SetFont('Arial',"",10);
if(mysqli_num_rows($subb16) != 0){
$val1 = substr($subpl16->achtergrondkleur, 1,2);
$val2 = substr($subpl16->achtergrondkleur, 3,2);
$val3 = substr($subpl16->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl16->letterkleur, 1,2);
$vall2 = substr($subpl16->letterkleur, 3,2);
$vall3 = substr($subpl16->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl16->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb17) != 0){
$val1 = substr($subpl17->achtergrondkleur, 1,2);
$val2 = substr($subpl17->achtergrondkleur, 3,2);
$val3 = substr($subpl17->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl17->letterkleur, 1,2);
$vall2 = substr($subpl17->letterkleur, 3,2);
$vall3 = substr($subpl17->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl17->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb18) != 0){
$val1 = substr($subpl18->achtergrondkleur, 1,2);
$val2 = substr($subpl18->achtergrondkleur, 3,2);
$val3 = substr($subpl18->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl18->letterkleur, 1,2);
$vall2 = substr($subpl18->letterkleur, 3,2);
$vall3 = substr($subpl18->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl18->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb19) != 0){
$val1 = substr($subpl19->achtergrondkleur, 1,2);
$val2 = substr($subpl19->achtergrondkleur, 3,2);
$val3 = substr($subpl19->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl19->letterkleur, 1,2);
$vall2 = substr($subpl19->letterkleur, 3,2);
$vall3 = substr($subpl19->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl19->lokaalnaam",0,0,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,0,'',1);  
}
if(mysqli_num_rows($subb20) != 0){
$val1 = substr($subpl20->achtergrondkleur, 1,2);
$val2 = substr($subpl20->achtergrondkleur, 3,2);
$val3 = substr($subpl20->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl20->letterkleur, 1,2);
$vall2 = substr($subpl20->letterkleur, 3,2);
$vall3 = substr($subpl20->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
$pdf->Cell(40,6,"Lokaal : $subpl20->lokaalnaam",0,1,'L',1);
}
else{
  $pdf->SetFillColor(222, 225, 229); $pdf->SetTextColor(0, 0, 0); $pdf->Cell(40,6,'Geen les',0,1,'',1);  
}

if(mysqli_num_rows($subb16) != 0 || mysqli_num_rows($subb17) != 0 || mysqli_num_rows($subb18) != 0 || mysqli_num_rows($subb19) != 0 || mysqli_num_rows($subb20) != 0){
$pdf->SetFillColor(153, 153, 153);
$pdf->Cell(40,6,"",0,0, 'C',1);
   if(mysqli_num_rows($subb16) != 0){
$val1 = substr($subpl16->achtergrondkleur, 1,2);
$val2 = substr($subpl16->achtergrondkleur, 3,2);
$val3 = substr($subpl16->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);    
$vall1 = substr($subpl16->letterkleur, 1,2);
$vall2 = substr($subpl16->letterkleur, 3,2);
$vall3 = substr($subpl16->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl16->eindtijd != '' && $subpl16->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl16->begintijd - $subpl16->eindtijd",0,0,'L',1);

}
 elseif($subpl16->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl16->eindtijd",0,0,'L',1);
}  elseif($subpl16->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl16->begintijd",0,0,'L',1);
}         
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       if(mysqli_num_rows($subb17) != 0){
$val1 = substr($subpl17->achtergrondkleur, 1,2);
$val2 = substr($subpl17->achtergrondkleur, 3,2);
$val3 = substr($subpl17->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl17->letterkleur, 1,2);
$vall2 = substr($subpl17->letterkleur, 3,2);
$vall3 = substr($subpl17->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl17->eindtijd != '' && $subpl17->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl17->begintijd - $subpl17->eindtijd",0,0,'L',1);

}
 elseif($subpl17->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl17->eindtijd",0,0,'L',1);
}   elseif($subpl17->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl17->begintijd",0,0,'L',1);
}        
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       if(mysqli_num_rows($subb18) != 0){
$val1 = substr($subpl18->achtergrondkleur, 1,2);
$val2 = substr($subpl18->achtergrondkleur, 3,2);
$val3 = substr($subpl18->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl18->letterkleur, 1,2);
$vall2 = substr($subpl18->letterkleur, 3,2);
$vall3 = substr($subpl18->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl18->eindtijd != '' && $subpl18->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl18->begintijd - $subpl18->eindtijd",0,0,'L',1);

}
  elseif($subpl18->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl18->eindtijd",0,0,'L',1);
}   elseif($subpl18->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl18->begintijd",0,0,'L',1);
}       
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       if(mysqli_num_rows($subb19) != 0){
$val1 = substr($subpl19->achtergrondkleur, 1,2);
$val2 = substr($subpl19->achtergrondkleur, 3,2);
$val3 = substr($subpl19->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl19->letterkleur, 1,2);
$vall2 = substr($subpl19->letterkleur, 3,2);
$vall3 = substr($subpl19->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl19->eindtijd != '' && $subpl19->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl19->begintijd - $subpl19->eindtijd",0,0,'L',1);

}
  elseif($subpl19->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl19->eindtijd",0,0,'L',1);
} 
             elseif($subpl19->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl19->begintijd",0,0,'L',1);
} 
else{
    $pdf->Cell(40,6,"",0,0,'L',1);
}
       }else{ $pdf->SetFillColor(222, 222, 222);

    $pdf->Cell(40,6,"",0,0,'L',1);
}
    
    if(mysqli_num_rows($subb20) != 0){
        
$val1 = substr($subpl20->achtergrondkleur, 1,2);
$val2 = substr($subpl20->achtergrondkleur, 3,2);
$val3 = substr($subpl20->achtergrondkleur, 5,2);
$value = hexdec($val1);
$value1 = hexdec($val2);
$value2 = hexdec($val3);
$vall1 = substr($subpl20->letterkleur, 1,2);
$vall2 = substr($subpl20->letterkleur, 3,2);
$vall3 = substr($subpl20->letterkleur, 5,2);
$valuee = hexdec($vall1);
$valuee1 = hexdec($vall2);
$valuee2 = hexdec($vall3);    
$pdf->SetTextColor($valuee, $valuee1, $valuee2);
$pdf->SetFillColor($value, $value1, $value2);
if($subpl20->eindtijd != '' && $subpl20->begintijd != ''){
    $pdf->Cell(40,6,"!Tijden! : $subpl20->begintijd - $subpl20->eindtijd",0,0,'L',1);

}
  elseif($subpl20->eindtijd != ''){
$pdf->Cell(40,6,"!Eindtijd! : $subpl20->eindtijd",0,0,'L',1);
}   
  elseif($subpl20->begintijd != ''){
$pdf->Cell(40,6,"!Begintijd! : $subpl20->begintijd",0,1,'L',1);
}      
else{
    $pdf->Cell(40,6,"",0,1,'L',1);
}
    }else{ $pdf->SetFillColor(222, 222, 222);
    $pdf->Cell(40,6,"",0,1,'L',1);
}
}



$pdf->Output('D', "ROOSTER$weeknr-$jaarnr-$grp->niveaunaam-$grp->regionaam-$grp->cohort.pdf");
?>