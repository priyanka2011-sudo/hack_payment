
$(document).ready(function(){
    var add_product = $('.add_product'); //Add button selector
    var wrapper = $('.extra_product'); //Input field wrapper
    var newRow = '<div><input type="text" placeholder="Product Name" name="productname[]" id="PrName"><input type="text" placeholder="Amount" name="amount[]" id="PramountName"><label class="txt">Taxable</label><label class="switch"><input type="checkbox" value="0" name="taxable[]"><span class="slider round"></span></label><a href="javascript:void(0);" class="remove_product"><img src="Media/rm.png" width="30px" height="30px"/></a></div>'; //New input field html 
    var x = 1; //Initial counter
    
    //Once add product is clicked
    $(add_product).click(function(){
       
            $(wrapper).append(newRow); //Add new Row
            x++; //Increment counter
    });
    
    //Once remove product is clicked
    $(wrapper).on('click', '.remove_product', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove new row
        x--; //Decrement counter
    });

    
});
