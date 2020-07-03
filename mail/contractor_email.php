<?php
error_reporting(0);
require_once('smtp.php');


// require('phpmailer/class.phpmailer.php');
// include('phpmailer/smtp-setting.php');

$sq               = "SELECT DATE_FORMAT(IC.START_DATE,'%d-%m%-%Y') as START_DATE,
						DATE_FORMAT(IC.END_DATE,'%d-%m%-%Y') as END_DATE,
						IC.BILLING_MODE, 
						IC.ACTUAL_LOCATION,
						IC.RATE_RECEIVED,
						IC.PO_NUMBER,
						IC.END_CLIENT_NAME,
						EM.EMPLOYEE_NAME,
						EM.ORG_ID,
						EM1.EMPLOYEE_NAME AS RECRUITED_BY, 
						EM1.EMPLOYEE_ID AS EMP_ID, 
						ED.EMAIL_ADDRESS AS RECRUITED_BY_EMAIL, 
						CM.CURRENCY_CODE,
						CUSTOMER.CUSTOMER_NAME 
					FROM internal_contractors as IC 
					LEFT JOIN EMPLOYEE_MASTER AS EM 
					ON EM.EMPLOYEE_ID=IC.EMPLOYEE_ID 
					LEFT JOIN CURRENCY_MASTER AS CM 
					ON CM.CURRENCY_ID=IC.CURRENCY_CODE 
					LEFT JOIN customer_master AS CUSTOMER 
					ON IC.AGENCY_ID=CUSTOMER.CUSTOMER_ID 
					LEFT JOIN EMPLOYEE_MASTER AS EM1 
					ON EM1.EMPLOYEE_ID=IC.RECRUITED_BY 
					LEFT JOIN EMPLOYEE_DETAILS as ED
					ON EM1.EMPLOYEE_ID=ED.EMPLOYEE_ID 
					WHERE IC.CONTRACTOR_ID='$contractor_id'";

$res              = mysqli_query($link, $sq);
$row_new          = mysqli_fetch_array($res);
$START_DATE       = $row_new['START_DATE'];
$RATE_RECEIVED    = $row_new['RATE_RECEIVED'];
$END_CLIENT_NAME  = $row_new['END_CLIENT_NAME'];
$EMPLOYEE_NAME    = $row_new['EMPLOYEE_NAME'];
$RECRUITED_BY     = $row_new['RECRUITED_BY'];
$CURRENCY_CODE    = $row_new['CURRENCY_CODE'];
$CUSTOMER_NAME    = $row_new['CUSTOMER_NAME'];
$ACTUAL_LOCATION  = $row_new['ACTUAL_LOCATION'];
$END_DATE         = $row_new['END_DATE'];
$BILLING_MODE_NEW = $row_new['BILLING_MODE'];
$ORG_ID			  = $row_new['ORG_ID'];
$PO_NUMBER		  = $row_new['PO_NUMBER'];
$recruited_by_email_id = $row_new['RECRUITED_BY_EMAIL'];
if ($BILLING_MODE_NEW == '1') {
    $BILLING_MODE = "Per Day";
}
if ($BILLING_MODE_NEW == '2') {
    $BILLING_MODE = "Per Month";
}
if ($BILLING_MODE_NEW == '3') {
    $BILLING_MODE = "Per Hour";
}
/************    Code For Email ********/
//$SQL_TO = "SELECT DISTINCT ED.EMAIL_ADDRESS AS TO_EMAIL_ADDRESS,EM.EMPLOYEE_NAME FROM `EMPLOYEE_MASTER` AS EM LEFT JOIN EMPLOYEE_DETAILS AS ED ON EM.EMPLOYEE_ID=ED.EMPLOYEE_ID WHERE ED.CURRENT_RECORD_FLAG='1' AND ED.EMPLOYMENT_STATUS_ID='1' AND (ED.EMPLOYEE_GROUP LIKE '%2%' OR ED.EMPLOYEE_GROUP LIKE '%8%' OR ED.EMPLOYEE_GROUP LIKE '%10%')";
if($ORG_ID==41){
	$EMAIL_CONCAT = "bipin.mehta@datamaticshr.co.in,priyanka.lehru@datamaticshr.co.in,ratish.tawade@datamaticsgroup.com,amit.kamdar@caps-it.co.uk,ganesh.chetty@datamaticshr.co.in,devang.gandhi@datamaticsuk.com";
}
else{
	$SQL_TO ="SELECT EM.EMPLOYEE_NAME,ED.EMAIL_ADDRESS AS TO_EMAIL_ADDRESS FROM `EMPLOYEE_MASTER` AS EM
						LEFT JOIN EMPLOYEE_DETAILS AS ED
						ON EM.EMPLOYEE_ID=ED.EMPLOYEE_ID
						WHERE ED.CURRENT_RECORD_FLAG='1'
						AND ED.EMPLOYMENT_STATUS_ID='1'
						AND (ED.EMPLOYEE_GROUP LIKE '%16%')";

	$RES_TO = mysqli_query($link, $SQL_TO);
	while ($ROW_TO = mysqli_fetch_array($RES_TO)) {
	    $TO_EMAIL_ADDRESS = $ROW_TO['TO_EMAIL_ADDRESS'];
	    $EMAIL_CONCAT .= $TO_EMAIL_ADDRESS;
	    $EMAIL_CONCAT .= ',';
	}
}

// $mail->SetFrom("creams@datamaticshr.co.in");
// $mail->AddReplyTo("hr@datamaticshr.co.in");




$recipients=explode(",",$EMAIL_CONCAT);
foreach($recipients as $email){
	// $mail->AddCC($email);
	$cc_email      = $cc_email."$email";
    $cc_email      = $cc_email.", ";
}
// $mail->AddAddress($recruited_by_email_id);
// $to_email       = "hr@datamaticshr.co.in, $recruited_by_email_id";

//$mail->AddAddress("admin@datamaticsuk.com");
//$mail->AddBCC("vijay.bagde@datamaticshr.co.in");
$absolutePath = dirname(__FILE__);
$pos          = strpos($absolutePath, 'include\\');
$absolutePath = substr($absolutePath, 0, $pos);
$attachment_file = $absolutePath . 'include/contract_form/' . $pdf_folder . '/' . $employee_id . '_' . $template_fields['#employee_name'] . '_india.pdf';

// Attachment part needs to be done : By Mahantesh-A-Policepatil..

// $mail->AddAttachment($absolutePath . 'include/contract_form/' . $pdf_folder . '/' . $employee_id . '_' . $template_fields['#employee_name'] . '_uk.pdf');

$subject  = "CREAMS :Internal Contractors";
// $mail->WordWrap = 80;
		if($ORG_ID==41){
			$message = "<html>
						<body bgcolor=#B5ACAF> 
							<p>Dear All,</p>
							<p>  $EMPLOYEE_NAME has joined $CUSTOMER_NAME $ACTUAL_LOCATION, please find below details.</p>
							<p>Employee Name : $EMPLOYEE_NAME </p>
							<p>Contact Start Date : $START_DATE </p>
							<p>Contact End Date  : $END_DATE </p>
							<p>Billing Mode  : $BILLING_MODE </p>
							<p>PO NUMBER  : $PO_NUMBER </p>
							<p>Customer Name  : $CUSTOMER_NAME </p>
							<p>End Client  : $END_CLIENT_NAME </p>
							<p>Recruited By  : $RECRUITED_BY </p>
							<br> <br> <br>
							Thanks<br>
							<b> CREAMS Support Team </b>
						</body> 
					</html>";
			}
		else{
			$message ="<html>
					<body bgcolor=#B5ACAF> 
						<p>Dear All,</p>
						<p>  $EMPLOYEE_NAME has joined $CUSTOMER_NAME $ACTUAL_LOCATION, please find below details.</p>
						<p>Employee Name : $EMPLOYEE_NAME </p>
						<p>Contact Start Date : $START_DATE </p>
						<p>Contact End Date  : $END_DATE </p>
						<p>Billing Mode  : $BILLING_MODE </p>
						<p>Customer Name  : $CUSTOMER_NAME </p>
						<p>End Client  : $END_CLIENT_NAME </p>
						<p>Recruited By  : $RECRUITED_BY </p>
						<br> <br> <br>
						Thanks<br>
						<b> CREAMS Support Team </b>
					</body> 
				</html>";
		}


//$to = "hr@datamaticsgroup.com, $recruited_by_email_id";
$fromEmail = "creams@datamaticshr.co.in";
$to = "priyanka.gurav786@gmail.com";
$subject = "CREAMS :Internal Contractors";

/* GET File Variables */
$fileName = $template_fields['#employee_name'] . '_india.pdf';
$tmpName = $attachment_file;

/* Start of headers */
//$headers = "From: $fromEmail";

if (file($tmpName)) {
  /* Reading file ('rb' = read binary)  */
  $file = fopen($tmpName,'rb');
  $data = fread($file,filesize($tmpName));
  fclose($file);

  /* a boundary string */
  $randomVal = md5(time());
  $mimeBoundary = "==Multipart_Boundary_x{$randomVal}x";

  /* Header for File Attachment */
  $newline = "\r\n";
  $headers .= "\nMIME-Version: 1.0\n";
  $headers .= "Content-Type: multipart/mixed;\n" ;
  $headers .= " boundary=\"{$mimeBoundary}\"";
  $headers .= "From: $fromEmail";
  //$headers .= "cc: " . $cc_email . $newline;

 //  $newline = "\r\n";

 // $headers  = "MIME-Version: 1.0" . $newline;
 // $headers .= "Content-type: multipart/mixed; charset=UTF-8" . $newline;
 // $headers .= " boundary=\"{$mimeBoundary}\"";
 // $headers .= "X-Mailer: php" . $newline;
 // $headers .= "From: " . $from_email . $newline;
 // $headers .= "cc: " . $cc_email . $newline;  

  /* Multipart Boundary above message */
  // $message = "This is a multi-part message in MIME format.\n\n" .
  // "--{$mimeBoundary}\n" .
  // "Content-Type: text/html; charset=\"iso-8859-1\"\n" .
  // "Content-Transfer-Encoding: 7bit\n\n" .
  $message . "\n\n";

  /* Encoding file data */
  $data = chunk_split(base64_encode($data));

  /* Adding attchment-file to message*/
  // $message .= "--{$mimeBoundary}\n" .
  // "Content-Type: {$fileType};\n" .
  // " name=\"{$fileName}\"\n" .
  // "Content-Transfer-Encoding: base64\n\n" .
  // $data . "\n\n" .
  // "--{$mimeBoundary}--\n";
}

$flgchk = smtpmail($to, $subject, $message, $headers);

if($flgchk) 
{
	echo "<p class='success'>Contact Mail Sent.</p>"; 	
}
echo "<p class='error'>Problem in Sending Mail.</p>";

?>

