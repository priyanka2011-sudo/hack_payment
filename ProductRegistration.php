<?php include "header.php"; ?>
        <form name="form" action="#" onsubmit="return isValid();" method="post">            
        <div class="container">
              
            <div class='col-75'>

                <label for="PrName"></label>      
                <input type="text" placeholder="Product Name" name="PrName" id="PrName">

                <label for="amount"></label>     
                <input type="text" placeholder="Amount" name="amount" id="PramountName">
                    
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
            <hr>  
            <div class="con">                         
            <input type="submit" value="Save Product"></input>    
        </div> 
<?php include "footer.php"; ?>





