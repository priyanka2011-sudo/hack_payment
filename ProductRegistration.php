<?php include "header.php"; 
$link = $_SESSION['connection'];


if(isset($_POST)){
     $productname   = $amount   =  $taxable =  array();
     $ProductName   = $_POST['productname'];
     $ProductAmount = $_POST['amount'];
     $Taxable       = $_POST['taxable'];
     $CreatedAt     =   date("Y-m-d h:i:s");
     $BusinessID    = $_SESSION['BusinessID'];
     
     for($i=0;$i<sizeof($ProductName);$i++){
        $add_product_query = "INSERT INTO `product`(
                                            `BusinessID`,
                                            `ProductName`,
                                            `ProductAmount`,
                                            `Taxable`,
                                            `CreatedAt`
                                        )
                                        VALUES(
                                            '$BusinessID',
                                            '$ProductName[$i]',
                                            '$ProductAmount[$i]',
                                            '$Taxable[$i]',
                                            '$CreatedAt'
                                        )";
        if(!mysqli_query($link,$add_product_query)){
            $msg .= "Sorry, product ".$ProductName[$i]." is not added<br/>";
        }
        else{
            $msg .= "successfully added product ".$ProductName[$i]."<br/>";
        }
     }
}
?>

<div class="container-fluid">
    <br>
    <h3> Product Registration</h3>
    <br><br>
      <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b></b></h2></div>
                                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info add-new-product"><i class="fa fa-plus"></i> Add New</button>
                          
                        </div>
                    </div>
                </div>
                <form method="post" action="">
                    <table class="table table-bordered">
                        <thead>                
                            <tr>
                                <th style="width:240px">Product</th>
                                <th>Amount</th>            
                                <th style="width:80px">Taxable</th>
                                <th>Actions</th>
                            </thead>
                            </tr>
                            <td><input type="text" class="form-control" name="productname[]"></td>                       
                            <td><input type="text" class="form-control" name="amount[]"></td>   
                            <td style="text-align: center;"><input type="checkbox" value="1" name="taxable[]"/></td>
                            <td>
                                
                                <a class="delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>                       
                    </thead>
                    </table>
                    <div class="row">
                        <div class="col-md-4 col-lg-2">
                          <button class="btn btn-primary  btn-block">Save Product</button>
                        </div><!-- /col -->
                    </div><!-- /row -->
                </form>

                </div>                
            </div>                        
</div>

<br/><br/>
<?php include "footer.php";?>