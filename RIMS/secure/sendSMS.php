<?php
session_start();
include ("randomPass.php");
include ("../database/conn.php");
require("phpmailer/class.phpmailer.php");
define('GUSER', 'banningyou@gmail.com'); // Gmail username
define('GPWD', '*frc3792'); // Gmail password
function smtpmailer($to, $from, $from_name, $subject, $body)
{ 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = GUSER;  
	$mail->Password = GPWD;           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send())
	{
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	}
	else
	{
		$error = 'Message sent!';
		return true;
	}
}
//5738197368@email.uscc.net
function sendAct ($user)
{
	if($user == 'rocky')
	{
		$email = "5738197368@email.uscc.net";
	}
	else if($user == 'admin')
	{
		$email = '7652377298@txt.att.net';
	}
	else
	{
		$email = '7652377298@txt.att.net';
	}
	$str = random_string(8);
	smtpmailer($email, GUSER, 'RIMS System protection', "User ".$user." is disabled", "You need to activate your account using the following code: [   ".$str."   ]");
	return $str;
}
?>