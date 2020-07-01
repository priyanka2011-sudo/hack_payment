<html>
<?php include "header.php"; ?>
<head>
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:Open Sans, sans-serif; font-size:11px; } 

		.main_div{background-image:url("#image_path#/include/invoice_form/templates/images/Charisma-bg.jpg");     
                 background-image-resize:6;height:100%; 
            }
		.Charisma_table{ padding: 40px; }
		.charisma_cont_top{ border-top: 1px solid #408300;border-bottom: 1px solid #408300;text-align: center; margin: 5px auto; }
		.charisma_cont_p{ font-size: 10px !important; margin: 0 auto; }
		.inhead{ font-size:25px; color:#408300; font-weight: 500; text-transform: uppercase; }
		.table_cont  thead tr th{ background-color:#408300; border-top: 1px solid #408300;border-bottom: 1px solid #408300; color:#fff; text-align: center;}
		.table_cont thead tr th:nth-child(1) {border-left: 1px solid #408300;  }
		.table_cont thead tr th:nth-child(5) {border-right: 1px solid #408300; }
		.table_cont{  }
		.Payments_T tr td{ padding-left: 15px; }
		.net_bg{background-color:#408300; color: #fff; font-weight: bold; padding-left: 10px;}
		.net_bgr{ border-bottom:2px solid #408300; text-align: right; }
	</style>
	<title>Invoice</title>
</head>

<body class="">
	<div class="main_div">
	<div class="Charisma_table">
	<table cellspacing="0" border="" width="100%">
		<tr>
			<td width="65%">
				<img width="150px" src="Media/logo.png">
			</td>
			<td width="35%" align="right">
				<p><i>Developed by NVPSD team</i></p>
			</td>
		</tr>
		<tr>
			<td class="charisma_cont_top" colspan="2" width="100%" height="20">
				<table width="100%" cellspacing="0" cellpadding="0" >
					<tr>
						<td width="50%" align="left" style="padding-left:10px">
							<p class="charisma_cont_p">E :&nbsp;&nbsp; asdf123@mail.com</p>
						</td>
						<td width="50%" align="right" style="padding-right:10px">
							<p class="charisma_cont_p">W : &nbsp;&nbsp;www.asdf123.ca</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br>
	<br>
	<table cellspacing="0" border="" width="100%">
		<tr>
			<td width="55%">
			 	<br>
			 	<p>CUSTOMER_NAME:</p>
			 		<p>CUSTOMER ADDRESS:</p>
			 		<p>CUSTOMER ADDRESS 1:<br>CUSTOMER ADDRESS 2</p>
			 		<p>COUNTRY:</p>POSTAL_CODE:<br>
			 		
			 </td>
			 <td width="30%" align="center">
			 	 <table cellspacing="0" border="" width="100%">
			 	 	 <tr>
			 	 	 	 <td align="right" height="45" style="padding-left:40px; vertical-align:top;">
			 	 	 	 	<h3 class="inhead">Invoice</h3>
			 	 	 	 </td>
			 	 	 </tr>
			 	 	 <tr>
			 	 	 	 <td  align="right" height="25">
			 	 	 	 	Invoice number: <span>##########</span>
			 	 	 	 </td>
			 	 	 </tr>
			 	 	 <tr>
			 	 	 	 <td align="right" height="25">
			 	 	 	 	Invoice date: MM/DD/YYYY
			 	 	 	 	<br><br><br><br>
			 	 	 	 		DUE_DATE
			 	 	 	 </td>
			 	 	 </tr>
			 	<!--  	 <tr>
			 	 	 	 <td align="left" height="25">
			 	 	 	 	Account Ref BANYANTR
			 	 	 	 </td>
			 	 	 </tr>
 -->			 	 </table>
			 </td>
		</tr>
	</table><br>
	<table class="table_cont" cellspacing="0" width="100%" style="border-bottom: none;">
		<!-- #PAYROLL_CONSULTANT# -->
	</table>
	<br><br>
	<table class="table_cont" cellspacing="0" width="100%">
	  <thead>
		<tr>
			 <th width="12%" height="30">Qty</th>
			 <th align="center">Description</th>
			 <th width="10%">%TAX</th>
			 <th width="12%" align="center">price per unit</th>
			 <th width="12%">total</th>
			 </tr> 
			 </thead>
		<tbody>

			Invoice Details
		
		<tr>
			<td  style="border:1px solid #d2d2d2;" height="20px"></td>
			<td  style="border:1px solid #d2d2d2;"></td>
			<td  style="border:1px solid #d2d2d2;"></td>
			<td  style="border:1px solid #d2d2d2;"></td>
			<td  style="border:1px solid #d2d2d2;"></td>
		</tr>
		<tr>
			<td  style="border:1px solid #d2d2d2;" height="20px"></td>
			<td  style="border:1px solid #d2d2d2;"></td>
			<td  style="border:1px solid #d2d2d2;"></td>
			<td  style="border:1px solid #d2d2d2;"></td>
			<td  style="border:1px solid #d2d2d2;"></td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td  height="20" style="border:1px solid #d2d2d2; text-align: right; color:#000; padding-right: 5px;">sub total</td> 
			<td class="net_bgr" style="border:1px solid #d2d2d2; text-align: right; padding-right: 5px;">sub total</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td height="20" style="border:1px solid #d2d2d2; text-align: right; color:#000;  padding-right: 5px;">tax amount</td> 
			<td class="net_bgr" style="border:1px solid #d2d2d2; text-align: right; padding-right: 5px;">total tax amount</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td height="20" style="border:1px solid #d2d2d2; text-align: right; color:#000; padding-right: 5px;">discount</td> 
			<td class="net_bgr" style="border:1px solid #d2d2d2; text-align: right; padding-right: 5px;">$00.00</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td  height="20"  style="border:1px solid #d2d2d2;  text-align: right; color:#000; padding-right: 5px;">total</td> 
			<td class="net_bgr" style="border:1px solid #d2d2d2; text-align: right; padding-right: 5px;">$000.00</td>
		</tbody>
		
	</table>
     <!-- <table cellspacing="0" width="100%" style="margin: 2px auto;">
     	<tr>
			<td width="55%" style="border:2px solid #408300">
			      <table  cellspacing="0" width="100%" >
							#BANK_DETAILS#
								 	
				
				
				 </table>
			</td>
			<td width="40%"></td>
			
		</tr>
     </table>


     <table cellspacing="0" width="100%" style="margin: 2px auto;">
     	<tr>
			<td width="55%" style="border:2px solid #408300" align="center">
				
				 <table class="Payments_T" cellspacing="0" width="100%" >
				 	  <tr>
				 	  	<td height="20" align="center" style="font-size:9px; padding:0px;">We reserve the right to charge interest on late paid invoices at the rate of 8% above bank
base rates under the Late Payment of Commercial Debts (Interest) Act 1998</td>
				 	  </tr>
				 	  
				 </table>
				
			</td>
			<td width="40%">
				
			</td>
		</tr>
     </table> -->
    
</div>
</body>
<?php include "footer.php"; ?>
</html>
