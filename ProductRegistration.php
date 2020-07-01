<?php include "header.php"; 
$link = $_SESSION['connection'];


if(isset($_POST)){
     $productname   = $amount   =  $taxable =  array();
     $ProductName   = $_POST['productname'];
     $ProductAmount = $_POST['amount'];
     $Taxable       = $_POST['taxable'];
     $CreatedAt     =   date("Y-m-d h:i:s");
     $total_rows    = $_POST['total_rows'];
     $BusinessID    = $_SESSION['BusinessID'];

     for($i=0;$i<$total_rows;$i++){
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
<script type="text/javascript">
    $(document).ready(function(){
    var add_product = $('.add_product'); //Add button selector
    var wrapper = $('.extra_product'); //Input field wrapper
    var x = 1; //Initial counter
    
    
    //Once add product is clicked
    $(add_product).click(function(){
       
            $(wrapper).append(newRow); //Add new Row
            x++; //Increment counter
            $('.total_rows').val(x);
    });
    
    //Once remove product is clicked
    $(wrapper).on('click', '.remove_product', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove new row
        x--; //Decrement counter
        $('.total_rows').val(x);
    });
    
    var newRow = '<div><input type="text" placeholder="Product Name" name="productname[]" id="PrName"><input type="text" placeholder="Amount" name="amount[]" id="PramountName"><label class="txt">Taxable</label><label class="switch"><input type="checkbox" value="1" name="taxable[]"><span class="slider round"></span></label><a href="javascript:void(0);" class="remove_product"><img src="Media/rm.png" width="30px" height="30px"/></a></div>'; //New input field html
    
});
</script>
        <form name="form" action="" onsubmit="return isValid();" method="post">            
        <div class="container">
              <label for="PrName"><?php if(isset($msg)){echo $msg;}?></label>  
            <div class='col-75'>

                <label for="PrName"></label>      
                <input type="text" placeholder="Product Name" name="productname[]" id="PrName">

                <label for="amount"></label>     
                <input type="text" placeholder="Amount" name="amount[]" id="PramountName">
                    
                <label class="txt">Taxable</label>
                <label class="switch">
                    <input type="checkbox" value="1" name="taxable[]">
                    <span class="slider round"></span>
                </label> 

                <div class="extra_product"></div>

                <label class="btn" >       
                <button type="button" class="add_product"><img class="icon" src="Media/add.png"></button>
                </label> 
            </div>   
                    
        </div>                  
                        
            <hr>  
            <input type="hidden" name="total_rows" class="total_rows"/>
            <div class="con">                         
            <input type="submit" value="Save Product"></input>    
            </div> 
        </form>
<?php include "footer.php"; ?>





