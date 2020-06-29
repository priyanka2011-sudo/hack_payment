<?php include "header.php"; 
$link = $_SESSION['connection'];

//Business Type dropdown
    $bus_type_option = "";
    $bus_type_query = "select * from businesstype";
    $bus_exec       = mysqli_query($link,$bus_type_query);
    while ($row = mysqli_fetch_assoc($bus_exec)){

        $bus_type_option.= "<option value=".$row['TypeID'].">".$row['TypeName']."</option>";
        
    }


//end business type dropdown
if(isset($_POST)){
    $BusinessTypeID = $businessname = $BusinessAddressLine1 = $BusinessAddressLine2 = $BusinessCity = $BusinessProvince = $BusinessCountry = $BusinessPostalCode = $BusinessPhone = $BusinessLogo = $BusinessRegNo = $TaxRegNo = $TaxPercent = $CreatedAt = $CreatedBy = $UpdatedAt = $UpdatedBy = $DeletedAt = $DeletedBy = 0;

    $BusinessTypeID         =   isset($_POST['BusinessTypeID']);
    $BusinessName           =   isset($_POST['BusinessName']);
    $BusinessAddressLine1   =   isset($_POST['BusinessAddressLine1']);
    $BusinessAddressLine2   =   isset($_POST['BusBusinessAddressLine2inessID']);
    $BusinessCity           =   isset($_POST['BusinessCity']);
    $BusinessProvince       =   isset($_POST['BusinessProvince']);
    $BusinessCountry        =   isset($_POST['BusinessCountry']);
    $BusinessPostalCode     =   isset($_POST['BusinessPostalCode']);
    $BusinessPhone          =   isset($_POST['BusinessPhone']);
    $BusinessLogo           =   isset($_POST['BusinessLogo']);
    $BusinessRegNo          =   isset($_POST['BusinessRegNo']);
    $TaxRegNo               =   isset($_POST['TaxRegNo']);
    $TaxPercent             =   isset($_POST['TaxPercent']);
    $CreatedAt              =   date("Y-m-d h:i:s");
    $CreatedBy              =   isset($_SESSION['loginId']);
    $UpdatedAt              =   NULL;
    $UpdatedBy              =   NULL;
    $DeletedAt              =   NULL; 
    $DeletedBy              =   NULL;

    $bus_insert_query = "INSERT INTO `business`(
                                    `BusinessTypeID`,
                                    `BusinessName`,
                                    `BusinessAddressLine1`,
                                    `BusinessAddressLine2`,
                                    `BusinessCity`,
                                    `BusinessProvince`,
                                    `BusinessCountry`,
                                    `BusinessPostalCode`,
                                    `BusinessPhone`,
                                    `BusinessLogo`,
                                    `BusinessRegNo`,
                                    `TaxRegNo`,
                                    `TaxPercent`,
                                    `CreatedAt`,
                                    `CreatedBy`,
                                    `UpdatedAt`,
                                    `UpdatedBy`,
                                    `DeletedAt`,
                                    `DeletedBy`)
                                VALUES(
                                    '$BusinessTypeID',
                                    '$BusinessName',
                                    '$BusinessAddressLine1',
                                    '$BusinessAddressLine2',
                                    '$BusinessCity',
                                    '$BusinessProvince',
                                    '$BusinessCountry',
                                    '$BusinessPostalCode',
                                    '$BusinessPhone',
                                    '$BusinessLogo',
                                    '$BusinessRegNo',
                                    '$TaxRegNo',
                                    '$TaxPercent',
                                    '$CreatedAt',
                                    '$CreatedBy',
                                    '$UpdatedAt',
                                    '$UpdatedBy',
                                    '$DeletedAt',
                                    '$DeletedBy'
                                    )";
    $bus_exec       = mysqli_query($link,$bus_insert_query);

}

?>
        <form name="form" action="#" onsubmit="return isValid();" method="post">            
            <div class="container">
              
                <div class='col-25'>
                <label for="businessname"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="Business Name" name="BusinessName" id="businessname" value="<?=$BusinessName?>" required>
                </div> 

                <div class='col-25'>
                <label for="businesstype"></label></div> 
                <div class='col-75'>
                <select class="prov" placeholder="Business Type" name="BusinessTypeID" id="businesstype">       
                    <?php echo $bus_type_option;?>
                </div> 

                <div class='col-25'>
                <label for="phonenum"></label></div> 
                <div class='col-75'>
                <input type="tel" placeholder="Phone Number" name="BusinessPhone" id="phonenum" value="<?=$BusinessPhone?>" pattern=".{10,}" title="Phone Number cannot be less than 10 digits"oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
                </div> 

                <div class='col-25'>
                <label for="address"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="Address 1" name="BusinessAddressLine1" id="address" value="<?=$BusinessAddressLine1?>" required>
                </div> 

                <div class='col-25'>
                <label for="address"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="Address 2" name="BusinessAddressLine2" id="address" value="<?=$BusinessAddressLine2?>" required>
                </div>

                <div class='col-25'>
                <label for="city"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="City" name="BusinessCity" id="city" value="<?=$BusinessCity?>" required>
                </div> 

                <div class='col-25'>
                <label for="country"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="Country" name="BusinessCountry" value="<?=$BusinessCountry?>" id="country" required>
                </div> 

                <div class='col-25'>
                <label for="province"></label></div> 
                <div class='col-75'>
                <select class="prov" name="BusinessProvince">                                  
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
                <input type="text" placeholder="Postal Code" name="BusinessPostalCode" value="<?=$BusinessPostalCode?>" id="postalcode" pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" title="A1A 1A1" required>
                </div> 

                <div class='col-25'>
                <label for="BusinessRegNo"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="BusinessRegNo" name="BusinessRegNo" value="<?=$BusinessRegNo?>" id="BusinessRegNo" required>
                </div> 

                <div class='col-25'>
                <label for="TaxRegNo"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="TaxRegNo" name="TaxRegNo" value="<?=$TaxRegNo?>" id="TaxRegNo" required>
                </div> 

                <div class='col-25'>
                <label for="TaxPercent"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="TaxPercent" name="TaxPercent" value="<?=$TaxPercent?>" id="TaxPercent" required>
                </div> 

                <div class='col-25'>
                <label for="BusinessLogo">Logo </label></div> 
                <div class='col-50'>
                <input type="file" placeholder="BusinessLogo" name="BusinessLogo" id="BusinessLogo" required>
                </div> 
                <div class='col-25'>
                <img src="<?=$BusinessLogo?>"/>
                </div> 
                    
                </div> 
                <hr>                           
                <input type="submit" value="Submit"></input>
            </div> 
        </div>               
            </form>
<?php include "footer.php"; ?>





