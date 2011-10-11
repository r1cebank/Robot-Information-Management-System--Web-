<?php
include ("../../database/conn.php");
require ("../../fpdf16/fpdf.php");
$id = $_REQUEST['id'];
$sql="SELECT * FROM teams WHERE id = '$id'";
$result = mysql_query($sql) or die("Parse Error");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$team_id = $row['team_id'];
$name = $row['name'];
$picture = $row['picture'];
$url = $row['url'];
$about = $row['about'];
$language = $row['language'];
$control = $row['control'];
$parts_broken = $row['parts_broken'];
$comment = $row['comment'];
$driver_picture = $row['driver_picture'];
$logo = $row['logo'];
$user = $row['user'];
$division = $row['division'];
$pdf=new FPDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetFont('Arial','',12);
//Background color
$pdf->SetFillColor(200,220,255);
//Title
$pdf->Cell(0,6,"Army Ants RIMS Team Report",0,1,'L',true);
//Line break
$pdf->Ln(4);
$pdf->Cell(0,6,"Team Number: $team_id",0,4);
$pdf->Cell(0,6,"Division: $division",0,4);
$pdf->Cell(0,6,"Name: $name",0,4);
$pdf->SetTextColor(0,0,255);
$pdf->Write(5,"Website: ".$url,$url);
$pdf->Ln(14);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"About this team:",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$about,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Programming Language: ",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$language,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Control System: ",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$control,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Parts Broken: ",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$parts_broken,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Comment: ",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$comment,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Entry Added By: ",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$user,0,4);
$pdf->SetTextColor(0,0,0);
if(file_exists ($logo))
{
	$pdf->Image($logo,180,18,20);
}
$pdf->Ln(4);
$pdf->Line($pdf->GetX()+10,$pdf->GetY()+2,$pdf->GetX()+190,$pdf->GetY()+2);
$pdf->Ln(4);
$pdf->Cell(0,6,"Photo Gallary: ",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Ln(4);
$pdf->Cell(0,6,"               Robot Photo                                                                  Driver Photo",0,4);
$pdf->SetTextColor(0,0,0);
if(file_exists ($picture))
{
	$pdf->Image($picture,20,$pdf->GetY()+10,80);
}
else
{
	$pdf->Image("../../team_photo/unavailable.jpg",20,$pdf->GetY()+10,80);
}
if(file_exists ($driver_picture))
{
	$pdf->Image($driver_picture,120,$pdf->GetY()+10,80);
}
else
{
	$pdf->Image("../../team_photo/unavailable.jpg",120,$pdf->GetY()+10,80);
}
$pdf->Output();
?>