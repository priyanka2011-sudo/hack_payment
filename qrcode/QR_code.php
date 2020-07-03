<?php
include('libs/phpqrcode/qrlib.php'); 
include('../config/dbconnect.php');
$link = $_SESSION['connection'];

if(isset($_GET['id']) ) {
	$tempDir = 'temp/'; 
	
	$ID = $_GET['id'];
	$enc_id = base64_encode($ID);
	$filename = mt_rand();

	$codeContents = $enc_id; 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);

	$update_cust   = "UPDATE `customer` SET qrcode=".$filename." WHERE `CustomerId`=".$ID;
    $exec_update_cust     = mysqli_query($link,$update_cust);
    
    header("location:../customerList.php");
}
?>