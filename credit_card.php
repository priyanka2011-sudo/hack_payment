<?php
include "header.php"; 
$link = $_SESSION['connection'];


if(isset($_POST['name'])){

    $CustomerName           =   isset($_POST['name'])?$_POST['name']:'';
    $CustomerPhone          =   isset($_POST['phonenum'])?$_POST['phonenum']:'';
    $CustomerEmailID        =   isset($_POST['email'])?$_POST['email']:'';
    $CreatedAt              =   date("Y-m-d h:i:s");
    $CreatedBy              =   isset($_SESSION['loginId'])?$_SESSION['loginId']:'';
    $Cardnum                =   isset($_POST['card_num'])?$_POST['name']:'';
    $Ex_day                 =   isset($_POST['ex_day'])?$_POST['ex_day']:'';
    $UpdatedAt              =   NULL;
    $UpdatedBy              =   NULL;
    $DeletedAt              =   NULL;
    $DeletedBy              =   NULL;

    $cust_insert_query = "INSERT INTO `customer`(
                                        `CustomerName`,
                                        `CustomerEmailID`,
                                        `CustomerPhone`,
                                        `CreatedAt`,
                                        `CreatedBy`
                                    )
                                    VALUES(
                                        '$CustomerName',
                                        '$CustomerEmailID',
                                        '$CustomerPhone',
                                        '$CreatedAt',
                                        '$CreatedBy',
                                        '$Cardnum',
                                        '$Ex_day'
                                    )";

    $cust_exec       = mysqli_query($link,$cust_insert_query);

    if(!$cust_exec){
            echo mysqli_error($link);
    }
}
?>

<div class="container-fluid">
    <div class="container">
        <br>
        <h3>Credit card information</h3>
        <form id="card_info" method="post" onsubmit="return validate();" action="test_pay.php"> 
        <img src="Media/credit_card.png" id="card_imgs" alt="card images"> <br><br>
            <label>Card number:</label>
            <input type="number" id="card_num" maxlength="16" name="card_num"> <label id="card_num_err"></label> <br>
            <label>Expiration day:</label>
            <input type="number" id="ex_day" placeholder="mmyy Ex: 0623" name="ex_day"> <label id="ex_day_err"></label>
            <br>
            <input type="submit">
        </form>    
        <br>
      </div>
    <div id="ccard_msg">

    </div>
</div>
<?php include "footer.php";?>