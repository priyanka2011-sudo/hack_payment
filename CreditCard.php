<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/CustomerList2.css">
    <link rel="stylesheet" type="text/css" href="CSS/CustomerRegisteration.css">
    <link rel="stylesheet" type="text/css" href="CSS/mycss.css">
    <script src="JS/CustomerList.js"></script>
    <script src="JS/invoiceinitiation.js"></script>
    <script src="JS/registration.js"></script>
    <script src="JS/OTPConfirmation.js"></script>
    <script src="JS/CreditCard.js"></script>
</head>
<body>
    <div id="top_bar">
        <img src="Media/logo.png" id="logo">
        <img src="Media/menu_toggle3.png" id="menu_toggle" onclick="toggleMenu();">
        <!-- <nav id="nav_bar">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="Transaction.php">Transaction</a></li>
                <li><a href="CustomerList2.php">Customer</a></li>
                <li><a href="#FAQ">FAQ</a></li>   
                <li><a href="#help">Help</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav> action="https://integratepayments.transactiongateway.com/api/query.php" -->
    </div>
    <section id="main_container">
        <form id="card_info" method="POST" onsubmit="return validate();" action="https://integratepayments.transactiongateway.com/api/query.php"> 
            <img src="Media/credit_card.png" id="card_imgs" alt="card images"> <br><br>
            <label>Card number:</label>
            <input type="number" id="card_num" maxlength="20"> <label id="card_num_err"></label> <br>
            <label>Expiration day:</label>
            <input type="number" id="ex_day" placeholder="mmyy"> <label id="ex_day_err"></label>
            <br>
            <input type="submit">
        </form>

<?php 
function testXmlQuery($security_key,$constraints)
{
    // transactionFields has all of the fields we want to validate
    // in the transaction tag in the XML output
    $transactionFields = array(
        'transaction_id',
        'partial_payment_id',
        'partial_payment_balance',
        'platform_id',
        'transaction_type',
        'condition',
        'order_id',
        'authorization_code',
        'ponumber',
        'order_description',

        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'company',
        'city',
        'state',
        'postal_code',
        'country',
        'email',
        'phone',
        'fax',
        'cell_phone',
        'customertaxid',
        'customerid',
        'website',

        'shipping_first_name',
        'shipping_last_name',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_company',
        'shipping_city',
        'shipping_state',
        'shipping_postal_code',
        'shipping_country',
        'shipping_email',
        'shipping_carrier',
        'tracking_number',
        'shipping_date',
        'shipping',
        'shipping_phone',

        'cc_number',
        'cc_hash',
        'cc_exp',
        'cavv',
        'cavv_result',
        'xid',
        'eci',
        'avs_response',
        'csc_response',
        'cardholder_auth',
        'cc_start_date',
        'cc_issue_number',
        'check_account',
        'check_hash',
        'check_aba',
        'check_name',
        'account_holder_type',
        'account_type',
        'sec_code',
        'drivers_license_number',
        'drivers_license_state',
        'drivers_license_dob',
        'social_security_number',

        'processor_id',
        'tax',
        'currency',
        'surcharge',
        'tip',

        'card_balance',
        'card_available_balance',
        'entry_mode',
        'cc_bin',
        'cc_type'
    );

    // actionFields is used to validate the XML tags in the
    // action element
     $actionFields = array(
         'amount',
         'action_type',
         'date',
         'success',
         'ip_address',
         'source',
         'api_method',
         'username',
         'response_text',
         'batch_id',
         'processor_batch_id',
         'response_code',
         'processor_response_text',
         'processor_response_code',
         'device_license_number',
         'device_nickname'
        );

    $mycurl=curl_init();
    $postStr='security_key='.$security_key.$constraints;
    $url="https://integratepayments.transactiongateway.com/api/query.php?". $postStr;
    curl_setopt($mycurl, CURLOPT_URL, $url);
    curl_setopt($mycurl, CURLOPT_RETURNTRANSFER, 1);
    $responseXML=curl_exec($mycurl);
    curl_close($mycurl);

    $testXmlSimple= new SimpleXMLElement($responseXML);

    if (!isset($testXmlSimple->transaction)) {
            throw new Exception('No transactions returned');
    }

    $transNum = 1;
    foreach($testXmlSimple->transaction as $transaction) {
        foreach ($transactionFields as $xmlField) {
            if (!isset($transaction->{$xmlField}[0])){
                throw new Exception('Error in transaction_id:'. $transaction->transaction_id[0] .' id  Transaction tag is missing  field ' . $xmlField);
            }
        }
        if (!isset ($transaction->action)) {
            throw new Exception('Error, Action tag is missing from transaction_id '. $transaction->transaction_id[0]);
        }

        $actionNum = 1;
        foreach ($transaction->action as $action){
            foreach ($actionFields as $xmlField){
                if (!isset($action->{$xmlField}[0])){
                    throw new Exception('Error with transaction_id'.$transaction->transaction_id[0].'
                                        Action number '. $actionNum . ' Action tag is missing field ' . $xmlField);
                }
            }
            $actionNum++;
        }
        $transNum++;
    }

    return;
}

try {

    $constraints = "&action_type=sale&start_date=20060913";
    $result = testXmlQuery('6457Thfj624V5r7WUwc5v6a68Zsd6YEm',$constraints);
    print "Success.\n";

} catch (Exception $e) {

    echo $e->getMessage();

}
?>
<?php include "footer.php"; ?>