<?php
include ("../../database/conn.php");
require ("../../fpdf16/fpdf.php");
$id = $_REQUEST['id'];
//Get team id for logo
$sql="SELECT * FROM match_info WHERE id = '$id'";
$result = mysql_query($sql) or die("Parse Error");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$team_id = $row['team_id'];
//Get Logo
$sql="SELECT * FROM teams WHERE team_id = '$team_id'";
$result = mysql_query($sql) or die("Parse Error");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$logo = $row['logo'];
//General gets
$sql="SELECT * FROM match_info WHERE id = '$id'";
$result = mysql_query($sql) or die("Parse Error");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$alliance = $row['alliance'];
if($alliance == 0)
$alliance = "Red";
else if($alliance == 1)
$alliance = "Blue";
$match_id = $row['match_id'];
$score = $row['score'];
$win = $row['win'];
if($win == 0)
$win = "Lose";
else if($win == 1)
$win = "Win";
$perf = $row['performance'];
$auto = $row['auto'];
if($auto == 1)
$auto = "Working :)";
else if($auto == 0)
$auto = "Not working";
$auto_score = $row['auto_score'];
$tele = $row['tele'];
if($tele == 1)
$tele = "Working :)";
else if($tele == 0)
$tele = "Not working";
$tele_score = $row['tele_score'];
$penalty = $row['penalty'];
$comment = $row['comment'];
$user = $row['user'];
$pdf=new FPDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetFont('Arial','',12);
//Background color
$pdf->SetFillColor(200,220,255);
//Title
$pdf->Cell(0,6,"Army Ants RIMS Match Report",0,1,'L',true);
//Line break
$pdf->Ln(4);
$pdf->Cell(0,6,"Team Number: $team_id",0,4);
if($alliance == "Red")
$pdf->SetTextColor(255,0,0);
else
$pdf->SetTextColor(0,0,255);
$pdf->Cell(0,6,"Alliance: $alliance",0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Match number:",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$match_id,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Match result:",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$win,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Alliance Score:",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$score,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Autonomous:",0,4);
if($auto == "Working :)")
$pdf->SetTextColor(50,205,50);
else
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,6,$auto,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Autonomous Score:",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$auto_score,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Teleop:",0,4);
if($tele == "Working :)")
$pdf->SetTextColor(50,205,50);
else
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,6,$tele,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Teleop Score:",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$tele_score,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Penalty:",0,4);
if($penalty > 0)
$pdf->SetTextColor(255,0,0);
else
$pdf->SetTextColor(50,205,50);
$pdf->Cell(0,6,$penalty,0,4);
if(file_exists ($logo))
{
	$pdf->Image($logo,180,18,20);
}
$pdf->Ln(4);
$pdf->Line($pdf->GetX()+10,$pdf->GetY()+2,$pdf->GetX()+190,$pdf->GetY()+2);
$pdf->Ln(4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Comments:",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$comment,0,4);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,"Entry entered by:",0,4);
$pdf->SetTextColor(107,142,35);
$pdf->Cell(0,6,$user,0,4);
$pdf->Output();
?>