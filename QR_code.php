<?php
include('libs/phpqrcode/qrlib.php'); 

if(isset($_POST['submit']) ) {
	$tempDir = 'temp/'; 

	 $ID = $_GET['id'];

     echo $get_customer      = "select * from customer where CustomerId=".$ID;exit;
     $exec_cust         = mysqli_query($link,$get_customer);
     $result_cust       = mysqli_fetch_array($exec_cust);

	
	$filename = $phone;
	$codeContents = $ID; 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}
?>