<?php include "header.php";
$link = $_SESSION['connection'];
$inv_id =$_SESSION['invoiceId'];
$cust_id=$_SESSION['cust_id'];

$get_custs_query = "select * from customer where CustomerId=$cust_id";
$exec_cust  = mysqli_query($link,$get_custs_query);
$result_cust = mysqli_fetch_array($exec_cust);

$prod_query = "select * from invoiceitem join product on invoiceitem.ProductID=product.ProductID where invoiceId=$inv_id";
$prod_exec       = mysqli_query($link,$prod_query);

?>
    <div class="container">
      <br>
      <h3> Review Cart - Checkout </h3>
      <br><br>
  <div class="row">

    <div class="col-md-8  mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
           <?php $msg=isset($_GET['msg'])?$_GET['msg']:'';
                  if($msg=='fail'){?>
                    <span class="text-muted">Your transaction has been failed. Please try again</span>
                  <?php }
                 ?>
        <span class="text-muted">Your cart</span>
        <span class="text-muted">Customer Name : <?php echo $result_cust['CustomerName'];?></span>
      </h4>
      <div class="centre">
      <ul class="list-group mb-3">

        <table class="table_cont" cellspacing="0" width="100%">
                <thead>
                <tr>
                   
                   <th align="center">Product/Service</th>
                   <th width="12%" height="30">Qty</th>
                   <th width="10%">TAX</th>
                   <th width="12%" align="center">price per unit</th>
                   <th width="12%">total</th>
                   </tr> 
                   </thead>
                <tbody>

                  Invoice Details
                <?php 
                $total_tax=$tax_amount=$total_amount=$amount=0;
                while ($row= mysqli_fetch_assoc($prod_exec)){
                  
                  if($row['taxable']==1){ // calculating tax
                    $tax_amount = $row['Amount']*0.13;
                    $total_tax=$total_tax+$tax_amount;
                  }
                  else{$tax_amount = 0;}// end calculating tax
                  $total_amount=$total_amount+$row['Amount'];
                  ?>
                <tr>
                  <td  style="border:1px solid #d2d2d2;" height="20px"><?php echo $row['ProductName'];?></td>
                  <td  style="border:1px solid #d2d2d2;"><?php echo $row['Quantity'];?></td>
                  <td  style="border:1px solid #d2d2d2;"><?php echo $tax_amount;?></td>
                  <td  style="border:1px solid #d2d2d2;"><?php echo $row['ProductAmount'];?></td>
                  <td  style="border:1px solid #d2d2d2;"><?php echo $row['Amount']+$tax_amount;?></td>
                </tr>
                <?php } ?>
                
                
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td  height="20" style="border:1px solid #d2d2d2; text-align: right; color:#000; padding-right: 5px;">sub total</td> 
                  <td class="net_bgr" style="border:1px solid #d2d2d2; text-align: right; padding-right: 5px;"><?php echo $total_amount;?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td height="20" style="border:1px solid #d2d2d2; text-align: right; color:#000;  padding-right: 5px;">Tax Amount</td> 
                  <td class="net_bgr" style="border:1px solid #d2d2d2; text-align: right; padding-right: 5px;"><?php echo $total_tax;?></td>
                </tr>
                
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td  height="20"  style="border:1px solid #d2d2d2;  text-align: right; color:#000; padding-right: 5px;">total</td> 
                  <td class="net_bgr" style="border:1px solid #d2d2d2; text-align: right; padding-right: 5px;"><?php echo $total_amount+$total_tax;?></td>
                </tbody>
                
              </table>
      </ul>
     
    </div>
  </div>
  </div>
</div>

<div class="next">
  <a href="checkout.php"><button type="button" class="btn btn-success">Checkout</button></a>
</div>
<br>


<br>
<?php include "footer.php";?>