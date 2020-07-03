<?php

define('SMTP_INCLUDED', 1);

// Author : Mahantesh-A-Policepatil
// Please dont rename this file as smtp_old.php : This will cuase a bug in list employee and in add internal contractors page.
//
// This function has been modified as provided
// to allow multiline responses when 
// using SMTP Extensions
//
function server_parse($socket, $response, $line = __LINE__) 
{
	$server_response = '';
	while (substr($server_response, 3, 1) != ' ') 
	{
		if (!($server_response = fgets($socket, 256))) 
		{ 
			print "SMTP ERROR: Couldn't get mail server response codes";
			return false; 
		} 
	} 

	if (!(substr($server_response, 0, 3) == $response)) 
	{ 
		  print "SMTP ERROR: Ran into problems sending Mail. Response: $server_response";
		  return false; 
	} 
}

// Replacement or substitute for PHP's mail command
function smtpmail($mail_to, $subject, $message, $headers = '',$xhost1 = 'mail.webselfy.com',$xemail1 = 'info@webselfy.com' ,$xpass1= '123456')
{
	// Use your SMTP Server Host Name e.g. mail.rkproperty.in
	// $xhost = "mail.yourdomain.com";
	$xhost = $xhost1;
	
	// Use your email address from which mails are to be sent e.g. contact@yourdomain.com
	$xemail = $xemail1;

	// Use the password for the email address mentioned above
	$xpass = $xpass1;

	// Fix any bare linefeeds in the message to make it RFC821 Compliant.
	$message = preg_replace("#(?<!\r)\n#si", "\r\n", $message);

	if ($headers != '')
	{
		if (is_array($headers))
		{
			if (sizeof($headers) > 1)
			{
				$headers = join("\n", $headers);
			}
			else
			{
				$headers = $headers[0];
			}
		}
		$headers = chop($headers);

		// Make sure there are no bare linefeeds in the headers
		$headers = preg_replace('#(?<!\r)\n#si', "\r\n", $headers);

		// Ok this is rather confusing all things considered,
		// but we have to grab bcc and cc headers and treat them differently
		// Something we really didn't take into consideration originally
		$header_array = explode("\r\n", $headers);
		@reset($header_array);

		$headers = '';
		while(list(, $header) = each($header_array))
		{
			if (preg_match('#^cc:#si', $header))
			{
				$cc = preg_replace('#^cc:(.*)#si', '\1', $header);
			}
			else if (preg_match('#^bcc:#si', $header))
			{
				$bcc = preg_replace('#^bcc:(.*)#si', '\1', $header);
				$header = '';
			}
			$headers .= ($header != '') ? $header . "\r\n" : '';
		}

		$headers = chop($headers);
		if(empty($cc)) $cc = '';
		if(empty($bcc)) $bcc = '';		
		$cc = explode(',', $cc);
		$bcc = explode(',', $bcc);
	}

	if (trim($subject) == '')
	{
		print "SMTP ERROR: No email Subject specified";
		return false;
	}

	if (trim($message) == '')
	{
		print "SMTP ERROR: Email message was blank";
		return false;
	}

	// Ok we have error checked as much as we can to this point let's get on
	// it already.
	if( !$socket = @fsockopen( $xhost , '25', $errno, $errstr, 20) )
	{
		print "SMTP ERROR: Could not connect to smtp host : $errno : $errstr <br> Check host under settings tab in admin. ";
		return false;
	}

	// Wait for reply
	server_parse($socket, "220", __LINE__);
	
	// Do we want to use AUTH?, send RFC2554 EHLO, else send RFC821 HELO
	// This improved as provided by SirSir to accomodate
	if( !empty($xemail) && !empty($xpass) )
	{ 
		fputs($socket, "EHLO " . $xhost . "\r\n");
		server_parse($socket, "250", __LINE__);

		fputs($socket, "AUTH LOGIN\r\n");
		server_parse($socket, "334", __LINE__);

		fputs($socket, base64_encode($xemail) . "\r\n");
		server_parse($socket, "334", __LINE__);

		fputs($socket, base64_encode($xpass) . "\r\n");
		server_parse($socket, "235", __LINE__);
	}
	else
	{
		fputs($socket, "HELO " . $xhost . "\r\n");
		server_parse($socket, "250", __LINE__);
	}

	// From this point onward most server response codes should be 250
	// Specify who the mail is from....
	fputs($socket, "MAIL FROM: <" . $xemail . ">\r\n");
	server_parse($socket, "250", __LINE__);

	// Specify each user to send to and build to header.
	$to_header = '';

	// Add an additional bit of error checking to the To field.
	$mail_to = (trim($mail_to) == '') ? 'Undisclosed-recipients:;' : trim($mail_to);
	if (preg_match('#[^ ]+\@[^ ]+#', $mail_to))
	{
		fputs($socket, "RCPT TO: <$mail_to>\r\n");
		server_parse($socket, "250", __LINE__);
	}

	// Ok now do the CC and BCC fields...
	@reset($bcc);
	while(list(, $bcc_address) = each($bcc))
	{
		// Add an additional bit of error checking to bcc header...
		$bcc_address = trim($bcc_address);
		if (preg_match('#[^ ]+\@[^ ]+#', $bcc_address))
		{
			fputs($socket, "RCPT TO: <$bcc_address>\r\n");
			server_parse($socket, "250", __LINE__);
		}
	}

	@reset($cc);
	while(list(, $cc_address) = each($cc))
	{
		// Add an additional bit of error checking to cc header
		$cc_address = trim($cc_address);
		if (preg_match('#[^ ]+\@[^ ]+#', $cc_address))
		{
			fputs($socket, "RCPT TO: <$cc_address>\r\n");
			server_parse($socket, "250", __LINE__);
		}
	}

	// Ok now we tell the server we are ready to start sending data
	fputs($socket, "DATA\r\n");

	// This is the last response code we look for until the end of the message.
	server_parse($socket, "354", __LINE__);

	// Send the Subject Line...
	fputs($socket, "Subject: $subject\r\n");

	// Now the To Header.
	fputs($socket, "To: $mail_to\r\n");

	// Now any custom headers....
	fputs($socket, "$headers\r\n\r\n");

	// Ok now we are ready for the message...
	fputs($socket, "$message\r\n");

	// Ok the all the ingredients are mixed in let's cook this puppy...
	fputs($socket, ".\r\n");
	server_parse($socket, "250", __LINE__);

	// Now tell the server we are done and close the socket...
	fputs($socket, "QUIT\r\n");
	fclose($socket);

	return TRUE;
}

?>