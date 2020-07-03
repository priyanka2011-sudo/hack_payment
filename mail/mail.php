<?php
//ini_set("SMTP","ayushseminarmaha.info" );
$to = "priyanka.gurav786@gmail.com";

$name=$_POST['name'];
$email =$_POST['email'];
$sub =$_POST['subject'];
$message=$_POST['msg'];


$message = "
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>HeraCorporation</title>
</head>

<body>
<table style='border: 1px solid #DFDFDF;
	background-color: #F9F9F9;
	width: 100%;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	
	color: #333;'>
	<thead>
		<th style='text-shadow: rgba(255, 255, 255, 0.796875) 0px 1px 0px;font-weight: normal;padding: 7px 7px 8px;text-align: left;
line-height: 1.3em;	font-size: 14px;border-top-color: white;
	border-bottom: 1px solid #DFDFDF; border-right: 1px solid #DFDFDF;
	color: #555; text-align:center; font-weight:bold;' colspan='2'>Hera Corporation</th>
		
		
		
	</thead>
	<tbody>
		<tr>
			<td style='font-size: 12px;	padding: 4px 7px 2px; vertical-align: top;border-top-color: white;
	border-bottom: 1px solid #DFDFDF;
	color: #555;border-right: 1px solid #DFDFDF'>Name</td>
			<td style='font-size: 12px;	padding: 4px 7px 2px; vertical-align: top;border-top-color: white;
	border-bottom: 1px solid #DFDFDF;
	color: #555;'>$name</td>
		
		</tr>
		<tr>
			<td style='font-size: 12px;	padding: 4px 7px 2px; vertical-align: top;border-top-color: white;
	border-bottom: 1px solid #DFDFDF;
	color: #555;border-right: 1px solid #DFDFDF'>Email</td>
			<td style='font-size: 12px;	padding: 4px 7px 2px; vertical-align: top;border-top-color: white;
	border-bottom: 1px solid #DFDFDF;
	color: #555;'>$email</td>
			
		</tr>
		<tr>
			<td style='font-size: 12px;	padding: 4px 7px 2px; vertical-align: top;border-top-color: white;
	border-bottom: 1px solid #DFDFDF;
	color: #555;border-right: 1px solid #DFDFDF'>Subject</td>
			<td style='font-size: 12px;	padding: 4px 7px 2px; vertical-align: top;border-top-color: white;
	border-bottom: 1px solid #DFDFDF;
	color: #555;'>$sub</td>
			
		</tr>
        
        
        <tr>
			<td style='font-size: 12px;	padding: 4px 7px 2px; vertical-align: top;border-top-color: white;
	border-bottom: 1px solid #DFDFDF;
	color: #555;border-right: 1px solid #DFDFDF'>Message</td>
			<td style='font-size: 12px;	padding: 4px 7px 2px; vertical-align: top;border-top-color: white;
	border-bottom: 1px solid #DFDFDF;
	color: #555;'>$msg</td>
			
		</tr>
	</tbody>
</table>
</body>
</html>

";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: <'.$email.'>' . "\r\n";


mail($to,$sub,$message,$headers);
header('Location:index.php');
?>