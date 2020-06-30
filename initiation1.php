<?php include "header.php"; ?>
        <form name="form" action="#" onsubmit="return isValid();" method="post">            
        <div class="container">
              
            <div class='col-75'>

                <label for="products"></label>
                <select id="products" name="products">
                    <option value="p0" selected="selected"> Product/Service Name </option>
                    <option value="p1">product1</option>
                    <option value="p2">product2</option>
                    <option value="p3">product3</option>
                </select>

                <input type="text" id="amount" placeholder="Amount" class="amount">
                <input type="text" id="taxamount" placeholder="Tax Amount" class="taxamount">
                    
                <label class="txt">Taxable</label>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>   
        
                <label class="btn">       
                <button type="button" onclick="add()"><img class="icon" src="Media/add.png"></button>
                </label>    
            </div>               
        </div>         
            </form>  
            <div class="total">
                <label for="amount" id="tamount">Sub Total</label>     
                    <input type="text" placeholder="Amount" name="amount" id="amount">
                    <br>
                    <label for="tax" id="ttax">Tax</label>     
                    <input type="text" placeholder="Tax Amount" name="tax" id="tax">
                    <br><br>
                    <label for="totalAmount">Total Amount</label>
                </div>   
                <br>               
            <hr>  
            <div class="con"> 
                <a href="initiation2.php">                        
            <input type="submit" value="Next"></input></a> 
        </div> 
<?php include "footer.php"; ?>




