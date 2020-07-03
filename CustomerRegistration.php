<?php
include "header.php"; 
$link = $_SESSION['connection'];


if(isset($_POST['name'])){

    $CustomerName           =   isset($_POST['name'])?$_POST['name']:'';
    $CustomerPhone          =   isset($_POST['phonenum'])?$_POST['phonenum']:'';
    $CustomerEmailID        =   isset($_POST['email'])?$_POST['email']:'';
    $CreatedAt              =   date("Y-m-d h:i:s");
    $CreatedBy              =   isset($_SESSION['loginId'])?$_SESSION['loginId']):'';
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

<div class="container-fluid">
    <div class="container">
        <br>
        <h3>Customer Registration</h3>
        <form action="" method="post">
             
            <div class="input-group">
                <span class="input-group-addon"></span>
                <input id="name"  type="text" class="form-control" name="name" placeholder="Name">
              </div>         
    
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input class="form-control" type="tel" name="phonenum" placeholder="Phone Number" id="example-tel-input">
                </div>
    
            <div class="input-group">
                <span class="input-group-addon"></span>
                <input id="email" type="text" class="form-control" name="email" placeholder="Email">
            </div>  
    
          <br>
          <div class="row">
            <div class="col-md-4 col-lg-2">
              <button class="btn btn-primary  btn-block">Submit</button>
            </div><!-- /col -->
          </div><!-- /row -->
        </form>
    
    
        <br>
    
      </div>
</div>
<?php include "footer.php";?>