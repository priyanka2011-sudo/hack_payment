<?php
	session_start();
	error_reporting(0);
	
ob_clean() ;
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('TCPDF Example 061');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */
// custom code
	//make database connection
	require_once("../common/connection.php");
	
	//include the classes file 
	require_once("../classes/home.php");
	//require_once("include/classes/ukba_applicant.php");
	require_once("../classes/nevigation.php");
	$page					= new common();
	$database_resultsObj 	= new database_results();
	//fetch the values
	$invoice_id		= isset($_GET['invoice_id']) ? $_GET['invoice_id'] : '';
	$customer_id		= isset($_GET['customer_id']) ? $_GET['customer_id'] : '';
	$num_of_days_in_month = isset($_GET['num_of_days_in_month']) ? $_GET['num_of_days_in_month'] : 30;
	$count 			= isset($_POST['count']) ? $_POST['count'] : '';
	$update_count 	= isset($_POST['update_count']) ? $_POST['update_count'] : '';
	
	$get_masterDetails = " Select * from multiple_receivable_invoices where INVOICE_ID = $invoice_id AND CUSTOMER_ID = $customer_id";
	$exec_get_masterDetails = mysql_query($get_masterDetails);
	if( !$exec_get_masterDetails )
	{
		echo '<br> Problem in getting master record details'.mysql_error();
	}
	else
	{ 
	$rowInv = mysql_fetch_array($exec_get_masterDetails);
		
//echo $Query	;
// values from database
	$inv_date				= $rowInv['INVOICE_DATE'];
	$inv_number				= $rowInv['INVOICE_NUMBER'];
	$inv_employee			= $rowInv['EMPLOYEE_ID'];
	$customer_name 			= $rowInv['CUSTOMER_ID'];
	$inv_from_date 			= $rowInv['INVOICE_FROM_DATE'];
 	$inv_to_date 			= $rowInv['INVOICE_TO_DATE'];
	$RECEIVED_FLAG 			= $rowInv['RECEIVED_FLAG'];
	$SENT_FLAG 				= $rowInv['SENT_FLAG'];
	$inv_payment_currency 	= $rowInv['CURRENCY_CODE'];
	$inv_year				= $rowInv['INVOICE_YEAR'];
	$inv_month				= $rowInv['INVOICE_MONTH'];
	$inv_amt	 			= $rowInv['INVOICE_AMOUNT'];
	$inv_rec_date			= $rowInv['RECEIVED_DATE'];
	$billing_comp			= $rowInv['BILLING_COMPANY'];
	$tax_amt				= $rowInv['TAX'];
	$vat_total_amount		= $rowInv['VAT_AMOUNT'];
	$invoice_subject		= $rowInv['INVOICE_SUBJECT'];
	$invoice_type 			= $rowInv['INVOICE_TYPE'];
	$total_amount_show		= $rowInv['TOTAL_AMOUNT'];
	$bank_id 				= $rowInv['BANK_ID'];
	$VAT_AMOUNT				= $rowInv['VAT_AMOUNT'];
	$split_dt_inv_date =	explode("-",$rowInv['INVOICE_DATE']);
	krsort($split_dt_inv_date);
	$inv_date_display = implode("-",$split_dt_inv_date);
		
	$split_dt_from_date =	explode("-",$rowInv['INVOICE_FROM_DATE']);
	krsort($split_dt_from_date);
	$inv_from_date_display = implode("-",$split_dt_from_date);
		
	$split_dt_to_date =	explode("-",$rowInv['INVOICE_TO_DATE']);
	krsort($split_dt_to_date);
	$inv_to_date_display = implode("-",$split_dt_to_date);
		
	$grand_total_with_tax_calculated = $inv_amt + $vat_total_amount;		
		
	/// Get details records 
	$selectValues		='receivable_invoices.INVOICE_ID,
						  receivable_invoices_details.INVOICE_ID,receivable_invoices_details.NUMBER_OF_DAYS
						 ,receivable_invoices_details.RATE_RECEIVED,receivable_invoices_details.RECEIVABLE_INVOICES_ID,receivable_invoices.VAT_AMOUNT';	
	$whereClause    	= 'where receivable_invoices.INVOICE_ID = receivable_invoices_details.INVOICE_ID and  receivable_invoices.INVOICE_ID='."'$invoice_id'".' '; 
	$tableName 			= 'receivable_invoices,receivable_invoices_details';						   
	
	$invRecords			= $database_resultsObj -> selectData ($selectValues,$tableName,$whereClause);
	$execInvRecords		= $database_resultsObj -> execQuery( $invRecords );	
	if ( !$execInvRecords )
	{
		echo 'Problem in query exec'.mysql_error();
	}
		//////////////  Get Bank Account Details 
	$selectBankDetails = "Select * from bank_account_details where BANK_ACCOUNT_DETAILS_ID = '$bank_id'";
	$execBankDetails = mysql_query( $selectBankDetails );
	if( !$execBankDetails )
	{
		echo' Problem in query for bank account details'.mysql_error();
	}
	elseif( mysql_num_rows($execBankDetails) > 0 )
	{
		$bankRow = mysql_fetch_array( $execBankDetails );
		$bankName = $bankRow['BANK_NAME'];
		$accountName = $bankRow['ACCOUNT_NAME'];
		$accountNumber = $bankRow['ACCOUNT_NUMBER'];
		$sortCode = $bankRow['SORT_CODE'];
	}
	////////// drop down for organosation ////
	
	$selOrg    	  = '*';
	$selTabNameOrg   = 'organizations'; 
	$whereClauseOrg  = "where ORG_ID = $billing_comp"; 
	$selOrgRecords   = $database_resultsObj -> selectData ($selOrg,$selTabNameOrg,$whereClauseOrg);
	$execOrg		  = $database_resultsObj -> execQuery( $selOrgRecords );
	$OrgOpt 		  = '';
	
	if ( mysql_num_rows ($execOrg) > 0 )
	{
		$OrgRow = mysql_fetch_array ($execOrg);
			$OrgRow_id 	 = $OrgRow['ORG_ID'];
			$OrgRow_name = $OrgRow['ORG_NAME'];
			$OrgRow_address = $OrgRow['ORG_ADDRESS'];
			$OrgRow_vat = $OrgRow['TAX'];
			$OrgRow_vat_reg_no = $OrgRow['ORG_VAT_REG_NO'];	
			$OrgRow_bank = $OrgRow['ORG_BANK'];
			$OrgRow_acc_name = $OrgRow['ORG_BANK_ACCOUNT'];
			$OrgRow_acc_no = $OrgRow['ORG_ACCOUNT_NUMBER'];
			$OrgRow_sort_code = $OrgRow['ORG_SORT_CODE'];
			$OrgRow_reg_no = $OrgRow['ORG_REG_NO'];
	}
////////// drop down for customer ////
	
	$selCust    	  = '*';
	$selTabNameCust   = 'customer_master'; 
	$whereClauseCust  = "where CUSTOMER_ID = '$customer_name'"; 
	$selCustRecords   = $database_resultsObj -> selectData ($selCust,$selTabNameCust,$whereClauseCust);
	$execCust		  = $database_resultsObj -> execQuery( $selCustRecords );
	$CustOpt 		  = '';
	
	if ( mysql_num_rows ($execCust) > 0 )
	{
		$CustRow = mysql_fetch_array ($execCust);
		$CustRow_id 	 = $CustRow['CUSTOMER_ID'];
		$CustRow_name	 = $CustRow['CUSTOMER_NAME'];
		$CustRow_address = $CustRow['CUSTOMER_ADDRESS'];
	}
////////// drop down for employee ////
}
$get_invoice_details = " Select * from multiple_receivable_invoices_details where INVOICE_ID = $invoice_id";
$exec_invoice_details = mysql_query($get_invoice_details);
if( !$exec_invoice_details )
{
	echo '<br>Problem in fetching invoice details'.mysql_error();
}

// define some HTML content with style
$html =
'<style type="text/css">
	body
	{
		font-family:Arial, Helvetica, sans-serif;
		
	}
	td
	{
		border: 1px solid black;
	}
	table
	{
		border:none;
		
	}
	input
	{
		border:hidden;
	}
	.orgBg
	{
	background-color:#FF6600;
	color:#FFFFFF;
	
	
	}
</style>

<span>

<table width=100% style="">
		
    	<tr align="center"  style="height:900px;" >
			<td><center ><span style="background-color:#FF6600;color:#FFFFFF; font-family:Arial, Helvetica, sans-serif;font-weight:bold; font-size:80px;" >'.$OrgRow_name.'</span></center><p style="color:#000099;">'.$OrgRow_address.'<br></p></td>
        </tr>
		
		<br><br>
		<tr>
 			<table style="width:230px;border:thin solid #000000;" cellpadding="0" cellspacing="0" >
        		<tr><td align="left" > <b>Date:</b> '.@date('d/m/Y',@strtotime($inv_date_display)).'</td></tr>
				
     		</table>
		</tr>	
	 <br />
     <br />
	 
	 
	 <tr>
		<td width="370">
			<table width="100%" style="border: thin solid #000000;">
				<tr><td width="350" colspan="2" style="border:thin solid #000000;"><b>Company Details</b></td>
				</tr>
				<tr><td style="border:none;"><b>Company Reg. Number</b></td><td style="border:none;">:'.$OrgRow_reg_no.'</td></tr>
				<tr>';
				if( $OrgRow_name == 'Datamatics India' )
				{
					$html.='<td style="border:none;"> <b>Service Tax Number</b></td><td style="border:none;">:'.$OrgRow_vat_reg_no.'</td>';
				}
				else
				{	
					$html.='<td style="border:none;"><b>VAT Reg. Number</b></td><td style="border:none;">:'.$OrgRow_vat_reg_no.'</td>';
				}
				$html.='</tr>
				<tr><td style="border:none;"><b>Invoice Number</b></td><td style="border:none;">:'.$inv_number.'</td></tr>
			</table>
	  </td>
		<td width="310" valign="top" >
			<table style="border:thin solid #000000;">
			<tr><td style="border:thin solid #000000;"><b>Customer Details</b></td></tr>
			<tr><td ><span>'.$CustRow_name.'<br /></span><br>
						<span style="font-size:30px;">'.$CustRow_address.'
						</span></td></tr>
			
			
		  </table>
	  </td>
	</tr>
	<BR />
    <BR />				
    <BR />
	<table border="0"width="100%" style="margin-top:120px;border:thin solid #000000;" cellpadding="0" cellspacing="0">
    <tr style="border: 1px solid black;">
		<td style="border: 1px solid black;" colspan="2"> <b>Subject</b></td>
    </tr>
	<tr>';
	if($invoice_subject != '')
	{
		$html .='<td style="border: 1px solid black; color:#000099;" align="left" colspan="4"> '.$invoice_subject.'
		 </td>';
	}
	else
	{ 	
		$invoice_subject = 'Consultancy services for the month of '.ucwords($inv_month).' '. $inv_year.' ';
		$html .='<td style="border: 1px solid black;color:#000099;" align="left" colspan="4"> '.$invoice_subject.'
		</td>';
	}	
	$html .='</tr>	
	</table>
	<BR />
    <BR />
		<table width="100%" align="center" cellpadding="0" cellspacing="0" >
			<tr  style="border:thin solid #000000;">
			<td style="background-color:#FAC090;"><strong>Consultant Name</strong></td>
            <td style="background-color:#FAC090;"><strong>Days</strong></td>
            <td style="background-color:#FAC090;"><strong>Rate/Month</strong></td>
            <td style="background-color:#FAC090;"><strong>Expenses</strong></td>
			<td style="background-color:#FAC090;"> <strong>Service Tax</strong></td>
			<td style="background-color:#FAC090;"> <strong> Total<br>(Including Tax) </strong></td>
			<td style="background-color:#FAC090;"> <strong>TDS</strong></td>
			
			<td style="background-color:#FAC090;"> <strong>Amount<br> To be Paid</strong></td>
			</tr>';	
			if( !$exec_invoice_details )
			{
				echo '<br>Problem in fetching invoice details'.mysql_error();
			}
		
			elseif ( mysql_num_rows ($exec_invoice_details) <= 0 )
			{
				$html.='<tr>
							<td colspan="5" align="center"> No details available</td>
						</tr>';
			}
			else
			{
				$total_amt = 0;
				$rate_per_day_total = 0;
				$expense_total = 0;
				$service_tax_total = 0;
				$tax_including_total = 0;
				$tds_total = 0;
				
				while( $rowDetails = mysql_fetch_array($exec_invoice_details))
				{
					$employee_id	= $rowDetails[EMPLOYEE_ID];
					$contr_type		= $rowDetails[CONTRACTOR_TYPE];
					if( $employee_id != 0 )
					{
					
					if($contr_type == 'int')// get name of internal contractor
					{
					
					/****************************/
					
					/****************************/
						$get_int_contactors	= "SELECT DISTINCT (internal_contractors.EMPLOYEE_ID) contrId , Employee_master.Employee_name contrName,
												   EMPLOYEE_MASTER.ORG_ID,EMPLOYEE_DETAILS.EMPLOYEE_ID,internal_contractors.AGENCY_ID,EMPLOYEE_DETAILS.EMPLOYMENT_STATUS_ID,
												   internal_contractors.START_DATE st_date,internal_contractors.END_DATE end_date
												   FROM internal_contractors
												   LEFT JOIN employee_master ON ( employee_master.EMPLOYEE_ID = Internal_contractors.employee_id)
												   LEFT JOIN EMPLOYEE_DETAILS ON ( employee_master.EMPLOYEE_ID = EMPLOYEE_DETAILS.EMPLOYEE_ID)
												   WHERE 
												   EMPLOYEE_DETAILS.EMPLOYMENT_STATUS_ID != 2 AND EMPLOYEE_DETAILS.BILLABLE_FLAG = 1 
												   AND EMPLOYEE_MASTER.ORG_ID = 41  AND AGENCY_ID = $customer_id
												   AND internal_contractors.EMPLOYEE_ID = $employee_id";
						$exec_int_contactors	= mysql_query($get_int_contactors);	
						if( !$exec_int_contactors )
						{
							die('Problem in fetching internal contractor name'.mysql_error());
						}
						elseif( mysql_num_rows($exec_int_contactors) > 0 )
						{
							while( $row_int_contr	= mysql_fetch_array($exec_int_contactors))
							{
								$contr_name	= $row_int_contr['contrName'];
							}	
						}
					}
					$no_of_days_hrs = $rowDetails[NUMBER_OF_DAYS];
					$rate_per_day   = $rowDetails[RATE_RECEIVED];	
					if( isset ($rowDetails[EXPENSES] ) )
					{
						$expenses	= $rowDetails[EXPENSES];	
					}
					else
					{
						$expenses	= 0;	
					}	
					$vat 			= $rowDetails[VAT_APPLIED];	
					
					if( !is_numeric($rate_per_day))
					{
						$row_total = 1 * $no_of_days_hrs;
					}
					elseif ( !is_numeric($no_of_days_hrs) )
					{
						$row_total = $rate_per_day * 1;
					}
					else
					{
						$row_total =  (($rate_per_day * $no_of_days_hrs)/$num_of_days_in_month)+$expenses+$vat;
					}
					$tds = 	($row_total * 10 )/100;
					$amt_to_be_paid = $row_total - $tds;
					$html.='<tr>
					<td align="left">'.$contr_name.' </td>
					<td>'.$no_of_days_hrs.' </td>
					<td align="right">'.$rate_per_day.'&nbsp;&nbsp;'.' </td>
					<td align="right" >'.@number_format($expenses,'2','.','').'&nbsp;&nbsp;'.' </td>
					<td align="right">'.$vat.'&nbsp;&nbsp;'. ' </td>
					<td align="right">'.number_format($row_total,'2','.','').'&nbsp;&nbsp;'.' </td>
				
					<td align="right">'.number_format($tds,'2','.','').'&nbsp;&nbsp;'.' </td>
					<td align="right">'.number_format($amt_to_be_paid,'2','.','').'&nbsp;&nbsp;'.' </td>
					</tr>';
					$rate_per_day_total = $rate_per_day_total + $rate_per_day;
					$expense_total = $expense_total + $expenses ;
					$service_tax_total = $service_tax_total + $vat;
					$tax_including_total = $tax_including_total + $row_total;
					$tds_total = $tds_total + $tds;
					$total_amt =$total_amt + $amt_to_be_paid;
				}
			}	
		}	
			
		$html.='
		<tr style="background-color:#FAC090;">
			<td align="left" style="background-color:#FAC090;font-weight:bold">TOTAL :</td>
				<td style="background-color:#FAC090;">
				</td>
				<td style="background-color:#FAC090;">'.number_format($rate_per_day_total,'2','.','').'
				</td>
				<td style="">'.number_format($expense_total,'2','.','').'
				</td>
				<td style="">'.number_format($service_tax_total,'2','.','').'
				</td>
				<td style="">'.number_format($tax_including_total,'2','.','').'
				</td>
				<td style="">'.number_format($tds_total,'2','.','').'
				</td>
				<td  align="right" style="">'.number_format($total_amt,'2','.','').'&nbsp;&nbsp;'.' </td>
			</tr>
		</table>
		<br><br>
		<table width="600" border="0" cellpadding="0" cellspacing="0" style="width:auto; margin-top:50px; border: thin solid #000000;" >
		<tr>
			<td colspan="2" style="border:none;text-decoration: underline; padding:1px;">
				<strong>  <u>Bank Account Details</u>:</strong> 
			</td>
		</tr>
        <tr>
        	<td style="border:none;">
        		<b>Bank</b>&nbsp;&nbsp;            </td>
			<td style="border:none;"> : '.$bankName.'</td>
        </tr>
		 <tr>
        	<td style="border:none;">
        		<b>Account Name</b>  &nbsp;&nbsp;
            </td>
			<td style="border:none;"> : '.$accountName.'</td>
         </tr>
		 <tr>
        	<td style="border:none;">
        		<b>Account Number</b>  &nbsp;&nbsp;
            </td>
			<td style="border:none;" > : '.$accountNumber.'</td>
         </tr>
		 <tr>
        	<td style="border:none;">
        		<b>Sort Code</b>  &nbsp;&nbsp;
            </td>
			<td style="border:none;" > : '.$sortCode.'</td>
         </tr>
		
</table>

</span>

';

echo $html;
// output the HTML content
//$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// *******************************************************************
// HTML TIPS & TRICKS
// *******************************************************************

// REMOVE CELL PADDING
//
// $pdf->SetCellPadding(0);
// 
// This is used to remove any additional vertical space inside a 
// single cell of text.

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// REMOVE TAG TOP AND BOTTOM MARGINS
//
// $tagvs = array('p' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0)));
// $pdf->setHtmlVSpace($tagvs);
// 
// Since the CSS margin command is not yet implemented on TCPDF, you
// need to set the spacing of block tags using the following method.

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// SET LINE HEIGHT
//
// $pdf->setCellHeightRatio(1.25);
// 
// You can use the following method to fine tune the line height
// (the number is a percentage relative to font height).

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// CHANGE THE PIXEL CONVERSION RATIO
//
// $pdf->setImageScale(0.47);
// 
// This is used to adjust the conversion ratio between pixels and 
// document units. Increase the value to get smaller objects.
// Since you are using pixel unit, this method is important to set the
// right zoom factor.
// 
// Suppose that you want to print a web page larger 1024 pixels to 
// fill all the available page width.
// An A4 page is larger 210mm equivalent to 8.268 inches, if you 
// subtract 13mm (0.512") of margins for each side, the remaining 
// space is 184mm (7.244 inches).
// The default resolution for a PDF document is 300 DPI (dots per 
// inch), so you have 7.244 * 300 = 2173.2 dots (this is the maximum 
// number of points you can print at 300 DPI for the given width).
// The conversion ratio is approximatively 1024 / 2173.2 = 0.47 px/dots
// If the web page is larger 1280 pixels, on the same A4 page the 
// conversion ratio to use is 1280 / 2173.2 = 0.59 pixels/dots

// *******************************************************************

// reset pointer to the last page
//$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Invoice.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>