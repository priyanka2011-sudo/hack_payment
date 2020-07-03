<?php include "header.php"; 
$link = $_SESSION['connection'];


if(isset($_GET['id'])){
     $productname   = $amount   =  $taxable =  array();

     $ID = $_GET['id'];

     $get_customer      = "select * from customer where CustomerId=".$ID;
     $exec_cust         = mysqli_query($link,$get_customer);
     $result_cust       = mysqli_fetch_array($exec_cust);
}

if(isset($_POST['CustomerName'])){
    $CustomerName       = $_POST['CustomerName'];
    $CustomerPhone      = $_POST['CustomerPhone'];
    $CustomerEmailID    = $_POST['CustomerEmailID'];
    
    $UpdatedBy          = $_SESSION['loginId'];
    $UpdatedAt          = date("Y-m-d h:i:s");

    $update_product   = "UPDATE `customer` SET `CustomerName`='".$CustomerName."',`CustomerPhone`='".$CustomerPhone."',`CustomerEmailID`='".$CustomerEmailID."',`UpdatedAt`='".$UpdatedAt."' ,`UpdatedBy`='".$UpdatedBy."' WHERE `CustomerId`=".$ID;
    $exec_update_prod     = mysqli_query($link,$update_product);
    
}
?>

<div class="container-fluid">
    <div class="container">
        <br>
        <h3>Update Customer</h3>
        <form action="" method="post">
             
            <div class="input-group">
                <span class="input-group-addon"></span>
                <input id="name"  type="text" class="form-control" name="CustomerName" value="<?php echo $result_cust['CustomerName'];?>" placeholder="Name">
              </div>         
    
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input class="form-control" type="tel" name="CustomerPhone" value="<?php echo $result_cust['CustomerPhone'];?>" placeholder="Phone Number" id="example-tel-input">
                </div>
    
            <div class="input-group">
                <span class="input-group-addon"></span>
                <input id="email" type="text" class="form-control" name="CustomerEmailID" value="<?php echo $result_cust['CustomerEmailID'];?>" placeholder="Email">
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