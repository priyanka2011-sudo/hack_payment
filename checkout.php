<?php include "header.php";
$link = $_SESSION['connection'];
$inv_id =$_SESSION['invoiceId'];
$cust_id=$_SESSION['cust_id'];
$get_custs_query = "select * from customer join paymentmethod on paymentmethod.CustomerID=customer.CustomerId where customer.CustomerId=$cust_id";
$exec_cust  = mysqli_query($link,$get_custs_query);
$result_cust = mysqli_fetch_array($exec_cust);


$get_inv_query = "select * from invoice join merchantaccount on merchantaccount.BusinessID=invoice.BusinessID where invoiceId=$inv_id";
$exec_inv     = mysqli_query($link,$get_inv_query);
$result_inv = mysqli_fetch_array($exec_inv);


$prod_query = "select * from invoiceitem join product on invoiceitem.ProductID=product.ProductID where invoiceId=$inv_id";
$prod_exec       = mysqli_query($link,$prod_query);


$total_tax=$tax_amount=$total_amount=$amount=0;
                while ($row= mysqli_fetch_assoc($prod_exec)){
                  
                  if($row['taxable']==1){ // calculating tax
                    $tax_amount = $row['Amount']*0.13;
                    $total_tax=$total_tax+$tax_amount;
                  }
                  else{$tax_amount = 0;}// end calculating tax
                  $total_amount=$total_amount+$row['Amount'];

                  $pay_amount = $total_amount+$total_tax;

                  }

//confirm payment


 include_once("config/payment_gateway.php");
    
    $ccnum = '4111111111111111';
    $expdate= '1212';
    $cust_id= $_POST['cust_id'];
    $gw = new gwapi;
    $gw->setLogin("Z6C4u6FwJAAr3B6fcgJ52R8aX3jBzBg4");
    $gw->setBilling("Priyanka","haha","Acme, Inc.","123 Main St","Suite 200", "Beverly Hills",
            "CA","90210","US","444-444-3333","222-333-5556","support123@example.com",
            "www.example.com");
    $gw->setShipping("Mary","Smith","na","124 Shipping Main St","Suite Ship", "Beverly Hills",
            "CA","90210","US","support@example.com");
    $gw->setOrder("1234","Big Order",1, 2, "PO1234","65.192.14.10");
    
    $r = $gw->doSale("30.00",$ccnum,$expdate);

    if($gw->responses['response_code']==100){
    	//create payment
			$craete_payment="INSERT INTO `payment`(
										    `payMethodID`,
										    `MerchantAccountID`,
										    `PaymentAmount`,
										    `Settlement`
										)
										VALUES(
											".$result_cust['PayMethodID'].",
										    ".$result_inv['MerchantAccountID'].",
										    '$pay_amount',
										    '1'
										)";
			$exec_inv  = mysqli_query($link,$craete_payment);
			$payment_id=mysqli_insert_id($link);
			//end confirm payment

			//add customer id & payment id in invoice
			$update_inv="UPDATE `invoice` SET `CustomerIDv` = '$cust_id', `PaymentID` = '$payment_id' WHERE `invoice`.`InvoiceID` = $inv_id;";
			$exec_inv  = mysqli_query($link,$update_inv);
			header("location:ViewInvoice.php?id=$inv_id");
    }
    else{
    	header("location:initiation3.php?msg=fail");
    }

?>