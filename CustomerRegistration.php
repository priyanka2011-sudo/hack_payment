<?php
include "header.php"; 
$link = $_SESSION['connection'];


if(isset($_POST['name'])){

    $CustomerName           =   isset($_POST['name'])?$_POST['name']:'';
    $CustomerPhone          =   isset($_POST['phonenum'])?$_POST['phonenum']:'';
    $CustomerEmailID        =   isset($_POST['email'])?$_POST['email']:'';
    $CreatedAt              =   date("Y-m-d h:i:s");
    $CreatedBy              =   isset($_SESSION['loginId']);
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
                                        '$CreatedBy'
                                    )";

    $cust_exec       = mysqli_query($link,$cust_insert_query);

    if(!$cust_exec){
            echo mysqli_error($link);
    }
}


?>

        <form name="form" action="" onsubmit="return isValid();" method="post">            
            <div class="container">
              
                <div class='col-25'>
                <label for="name"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="Name" name="name" id="name" required>
            </div> 

                <div class='col-25'>
                <label for="phonenum"></label></div> 
                <div class='col-75'>
                <input type="tel" placeholder="Phone Number" name="phonenum" id="phonenum" pattern=".{10,}" title="Phone Number cannot be less than 10 digits"oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
            </div> 

                <div class='col-25'>
                <label for="email"></label> </div> 
                <div class='col-75'>
                <input type="email" placeholder="Email" name="email" id="email" required>
            </div> 

                <hr>                           
                <input type="submit" value="Submit"></input>
            </div> 
        </div> 
              
            </form>
<?php include "footer.php"; ?>




