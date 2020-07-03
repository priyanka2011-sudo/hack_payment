<?php include "header.php";
$link = $_SESSION['connection'];
$id=$_GET['id'];
$get_inv_query = "select * from invoice join customer on invoice.CustomerIDv=customer.CustomerId
                    join payment on invoice.PaymentID=payment.PaymentID 
                    join business on invoice.BusinessID = business.BusinessID 
                    where invoiceId=$id";
$exec_inv     = mysqli_query($link,$get_inv_query);
$result_inv	  = mysqli_fetch_assoc($exec_inv);

$get_inv_item = "select * from invoiceitem join product on invoiceitem.ProductID=product.ProductID where invoiceId=$id";
$exec_inv     = mysqli_query($link,$get_inv_item);
?>
<html>
<head>
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:Open Sans, sans-serif; font-size:11px; } 

		.main_div{background-image:url("#image_path#/include/invoice_form/templates/images/NVPSD-bg.jpg");     
                 background-image-resize:6;height:100%; 
            }
		.NVPSD_table{ padding: 40px; }
		.NVPSD_cont_top{ border-top: 1px solid #408300;border-bottom: 1px solid #408300;text-align: center; margin: 5px auto; }
		.NVPSD_cont_p{ font-size: 10px !important; margin: 0 auto; }
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
	<div class="NVPSD_table">
	<table cellspacing="0" border="" width="100%">
		<tr>
			<td width="65%">
				<img width="150px" src="img/business_logo/<?php echo $result_inv['BusinessLogo'];?>">
			</td>
			<td width="35%" align="right">
				<p><i>Developed by NVPSD team</i></p>
			</td>
		</tr>
	</table>
	<br>
	<br>
	<table cellspacing="0" border="" width="100%">
		<tr>
			<td width="55%">
			 	<br>
			 	<p><?php echo $result_inv['BusinessName'];?> </p>
			 		<p><?php echo $result_inv['BusinessAddressLine1'];?></p>
			 		<p><?php echo $result_inv['BusinessAddressLine2'];?> <br><?php echo $result_inv['BusinessCity'];?></p>
			 		<p><?php echo $result_inv['BusinessCountry'];?> </p> <?php echo $result_inv['BusinessPostalCode'];?><br>
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
			 	 	 	 	Invoice number: <span><?php echo $result_inv['InvoiceNumber'];?></span>
			 	 	 	 </td>
			 	 	 </tr>
			 	 	 <tr>
			 	 	 	 <td align="right" height="25">
			 	 	 	 	Invoice date: <?php echo $result_inv['InvoiceDate'];?>
			 	 	 	 	<br><br><br><br>
			 	 	 	 		
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
			 
			 <th align="center">Product/Service</th>
			 <th width="12%" height="30">Qty</th>
			 <th width="10%">%TAX</th>
			 <th width="12%" align="center">price per unit</th>
			 <th width="12%">total</th>
			 </tr> 
			 </thead>
		<tbody>

			Invoice Details
		<?php 
		$total_tax=$tax_amount=$total_amount=$amount=0;
		while ($row= mysqli_fetch_assoc($exec_inv)){

			if($row['taxable']==1){ // calculating tax
				$tax_amount = $row['Amount']*0.13;
				$total_tax=$total_tax+$tax_amount;
			}
			else{$tax_amount = 0;}// end calculating tax
			$total_amount=$total_amount+$row['Amount'];
			?>
		<tr>
			<td  style="border:1px solid #d2d2d2;" height="20px"><?php echo $row['ProductName'];?></td>
			<td  style="border:1px solid #d2d2d2;"><?php echo $row['Quantity'];?></td>
			<td  style="border:1px solid #d2d2d2;"><?php echo $tax_amount;?></td>
			<td  style="border:1px solid #d2d2d2;"><?php echo $row['ProductAmount'];?></td>
			<td  style="border:1px solid #d2d2d2;"><?php echo $row['Amount']+$tax_amount;?></td>
		</tr>
		<?php } ?>
		
		
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td  height="20" style="border:1px solid #d2d2d2; text-align: right; color:#000; padding-right: 5px;">sub total</td> 
			<td class="net_bgr" style="border:1px solid #d2d2d2; text-align: right; padding-right: 5px;"><?php echo $total_amount;?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td height="20" style="border:1px solid #d2d2d2; text-align: right; color:#000;  padding-right: 5px;">Tax Amount</td> 
			<td class="net_bgr" style="border:1px solid #d2d2d2; text-align: right; padding-right: 5px;"><?php echo $total_tax;?></td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td  height="20"  style="border:1px solid #d2d2d2;  text-align: right; color:#000; padding-right: 5px;">total</td> 
			<td class="net_bgr" style="border:1px solid #d2d2d2; text-align: right; padding-right: 5px;"><?php echo $total_amount+$total_tax;?></td>
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
</html>

