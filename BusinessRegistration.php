<?php include "header.php"; ?>
        <form name="form" action="#" onsubmit="return isValid();" method="post">            
            <div class="container">
              
                <div class='col-25'>
                <label for="businessname"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="Business Name" name="businessname" id="businessname" required>
                </div> 

                <div class='col-25'>
                <label for="phonenum"></label></div> 
                <div class='col-75'>
                <input type="tel" placeholder="Phone Number" name="phonenum" id="phonenum" pattern=".{10,}" title="Phone Number cannot be less than 10 digits"oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
                </div> 

                <div class='col-25'>
                <label for="address"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="Address 1" name="address" id="address" required>
                </div> 

                <div class='col-25'>
                <label for="address"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="Address 2" name="address" id="address" required>
                </div>

                <div class='col-25'>
                <label for="city"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="City" name="city" id="city" required>
                </div> 

                <div class='col-25'>
                <label for="country"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="Country" name="country" id="country" required>
                </div> 

                <div class='col-25'>
                <label for="province"></label></div> 
                <div class='col-75'>
                <select class="prov">                                  
                <optgroup label="Provinces">
                    <option value="1" selected="selected"> Ontario </option>
                    <option value="2"> British Columbia </option>
                    <option value="3"> Alberta </option>
                    <option value="4"> Saskatchewan </option>
                    <option value="5"> Manitoba </option>
                    <option value="6"> Quebec </option>
                    <option value="7"> Ontario </option>
                    <option value="8"> Nova Scotia </option>
                    <option value="10"> Prince Edward Island </option>
                    <option value="11"> New Brunswick </option>
                    <option value="9"> Newfoundland and Labrador </option> 
                </optgroup>     
                <optgroup label="Territories">                                  
                    <option value="11"> North West</option>
                    <option value="12"> Yukon </option>
                    <option value="13"> Nunavut </option>
                </optgroup> 
                </select>

                    <div class='col-25'>
                    <label for="postalcode"></label></div> 
                    <div class='col-75'>
                    <input type="text" placeholder="Postal Code" name="postalcode" id="postalcode" pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" title="A1A 1A1" required>
                    </div> 
                </div> 
                <hr>                           
                <input type="submit" value="Submit"></input>
            </div> 
        </div>               
            </form>
<?php include "footer.php"; ?>





