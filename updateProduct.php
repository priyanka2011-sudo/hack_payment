<?php include "header.php"; 
$link = $_SESSION['connection'];


if(isset($_GET['id'])){
     $productname   = $amount   =  $taxable =  array();

     $ID = $_GET['id'];

     $get_product   = "select * from product where ProductID=".$ID;
     $exec_prod     = mysqli_query($link,$get_product);
     $result_prod   = mysqli_fetch_array($exec_prod);
}

if(isset($_POST['productname'])){
    $productname    = $_POST['productname'];
    $ProductAmount  = $_POST['ProductAmount'];
    if($_POST['taxable']=='on'){$taxable=1;}else{$taxable=0;}
    $UpdatedAt      = date("Y-m-d h:i:s");

    $update_product   = "UPDATE `product` SET `ProductName`='".$productname."',`ProductAmount`='".$ProductAmount."',`Taxable`=".$taxable.",`UpdatedAt`='".$UpdatedAt."' WHERE `ProductID`=".$ID;
    $exec_update_prod     = mysqli_query($link,$update_product);
    $result_update_prod   = mysqli_fetch_array($exec_update_prod);
}
?>

<div class="container-fluid">
    <br>
    <h3> Product Registration</h3>
    <br><br>
      <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                
                <form method="post" action="">
                    <table class="table table-bordered">
                        <thead>                
                            <tr>
                                <th style="width:240px">Product</th>
                                <th>Amount</th>            
                                <th style="width:80px">Taxable</th>
                                
                            </thead>
                            </tr>
                            <td><input type="text" class="form-control" value="<?php echo $result_prod['ProductName'];?>" name="productname"></td>                       
                            <td><input type="text" class="form-control" value="<?php echo $result_prod['ProductAmount'];?>" name="ProductAmount"></td>   
                            <td style="text-align: center;"><input type="checkbox" <?php if($result_prod['Taxable']==1){echo "checked";}?> name="taxable"/></td>
                            <!-- <td>
                                
                                <a class="delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>  -->                      
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