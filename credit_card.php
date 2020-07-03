<?php
include "header.php"; 
$id=$_GET['id'];
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
            <input type="hidden" id="cust_id" value="<?php echo $id;?>" name="cust_id"> <label id="ex_day_err">
            <br>
            <input type="submit">
        </form>    
        <br>
      </div>
    <div id="ccard_msg">

    </div>
</div>
<?php include "footer.php";?>