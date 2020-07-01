<?php include "header.php"; 
$link = $_SESSION['connection'];

    //Product dropdown
    $BusinessID    = $_SESSION['BusinessID'];
    // $BusinessTypeID = $bus_type_option = "";
    $prod_query = "select * from product where BusinessID=".$BusinessID." and IsDeleted=0";
    $prod_exec       = mysqli_query($link,$prod_query);
    while ($row = mysqli_fetch_assoc($prod_exec)){
        
        $product_option .= '<option value="'.$row['ProductID'].'">'.$row['ProductName'].'</option>';
       
    }
    //end Product dropdown

    if(isset($_POST)){
         $ProductID   = $_POST['productname'];
         $invoiceId   = 1;
         $quantity   = $_POST['quantity'];
         $ProductAmount = $_POST['amount'];
         $Taxable       = $_POST['taxable'];
         $CreatedAt     =   date("Y-m-d h:i:s");
         $total_rows    = $_POST['total_rows'];

         for($i=0;$i<$total_rows;$i++){
            $add_product_query = "INSERT INTO `invoice`(
                                                    `invoiceId`,
                                                    `ProductID`,
                                                    `Quantity`,
                                                    `Amount`,
                                                    `CreatedAt`
                                            )
                                            VALUES(
                                                    '$invoiceId',
                                                    '$ProductID',
                                                    '$Quantity',
                                                    '$Amount',
                                                    '$CreatedAt'
                                            )";
            if(!mysqli_query($link,$add_product_query)){
                $msg .= "Sorry, product ".$ProductName[$i]." is not added<br/>";
            }
            else{
                $msg .= "successfully added product ".$ProductName[$i]."<br/>";
            }
         }//close for loop
    }// close if post

?>

<script type="text/javascript">
    $(document).ready(function(){
    var add_product = $('.add_inv_item'); //Add button selector
    var wrapper = $('.extra_inv_item'); //Input field wrapper
    var x = 1; //Initial counter
    
    
    //Once add product is clicked
    $(add_product).click(function(){
       
            $(wrapper).append(newRow); //Add new Row
            x++; //Increment counter
            $('.total_rows').val(x);

    });
    
    //Once remove product is clicked
    $(wrapper).on('click', '.remove_inv_item', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove new row
        x--; //Decrement counter
        $('.total_rows').val(x);
    });
    
    <?php echo "var product_list='".$product_option."';";?>

    var newRow = '<div><select id="products" name="productname[]"><option>Product/Service</option>'+product_list+'</select><input type="text" placeholder="quantity" name="quantity[]" id="quantity"><input type="text" placeholder="Amount" name="amount[]" id="PramountName"><label class="txt">Taxable</label><label class="switch"><input type="checkbox" value="1" name="taxable[]"><span class="slider round"></span></label><a href="javascript:void(0);" class="remove_product"><img src="Media/rm.png" width="30px" height="30px"/></a></div>'; 
    //New input field html
    //Quantity
    $('input.quantity').on('change keyup',function()
    {
        var qty = $('.quantity').val;
        var prc = $(this).find('.')
        var amt = $('.Amount').val;
        
        var subtotal    =   amt;
        $('#subtotal').val(subtotal);
          $total.val($qty.val()*($price.val()-($price.val()*($discount.val()/100))));
          var grandTotal=0;
          $('table').find('input.expensess_sum').each(function(){
              if(!isNaN($(this).val()))
                {grandTotal += parseInt($(this).val()); 
                }
          });
          if(isNaN(grandTotal))
             grandTotal =0;
          $grand_total.val(grandTotal)
    });//end in Quantity
});
</script>

        <form name="form" action="" onsubmit="return isValid();" method="post">            
        <div class="container">
              
            <div class='col-75'>

                <label for="PrName"></label>      
                <select id="products" name="productname[]" id="PrName">
                    <option>Product/Service</option>
                    <?php echo $product_option;?>
                </select>
                <label for="quantity"></label>      
                <input type="text" placeholder="Quantity" class="quantity" name="quantity[]" id="quantity">

                <label for="amount"></label>     
                <input type="text" placeholder="Amount" class="amount" name="amount[]" id="PramountName">
                    
                <label class="txt">Taxable</label>
                <label class="switch">
                    <input type="checkbox" value="1" name="taxable[]">
                    <span class="slider round"></span>
                </label> 

                <div class="extra_inv_item"></div>

                <label class="btn" >       
                <button type="button" class="add_inv_item"><img class="icon" src="Media/add.png"></button>
                </label> 
            </div>               
        </div>         
            </form>  
            <div class="total">
                <label for="amount" id="tamount">Sub Total</label>     
                    <input type="text" placeholder="subtotal" name="subtotal" id="subtotal">
                    <br>
                    <label for="tax" id="ttax">Tax</label>     
                    <input type="text" placeholder="Tax Amount" name="ttax" id="ttax">
                    <br><br>
                    <label for="totalAmount">Total Amount: <span class="tamt"></span></label>
                </div>   
                <br>               
            <hr>  
            <div class="con"> 
            <input type="hidden" name="total_rows" class="total_rows"/>              
            <input type="submit" value="Next"></input> 
        </div> 
<?php include "footer.php"; ?>




