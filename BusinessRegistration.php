<?php include "header.php";
$link = $_SESSION['connection'];

$BusinessTypeID = $BusinessName = $BusinessAddressLine1 = $BusinessAddressLine2 = $BusinessCity = $BusinessProvince = $BusinessCountry = $BusinessPostalCode = $BusinessPhone = $BusinessLogo = $BusinessRegNo = $TaxRegNo = $TaxPercent = $CreatedAt = $CreatedBy = $UpdatedAt = $UpdatedBy = $DeletedAt = $DeletedBy = '';

//Business Type dropdown
    $BusinessTypeID = $bus_type_option = "";
    $bus_type_query = "select * from businesstype";
    $bus_exec       = mysqli_query($link,$bus_type_query);
    while ($row = mysqli_fetch_assoc($bus_exec)){
        //echo $row['TypeID'];
        if($row['TypeID'] == $BusinessTypeID){

            $bus_type_option.= "<option value='".$row['TypeID']."'>".$row['TypeName']."</option>";
        }
        else{
            $bus_type_option.= "<option value='".$row['TypeID']."'>".$row['TypeName']." selected </option>";
        }
    }

//end business type dropdown



//end business type dropdown
if(isset($_POST['BusinessName'])){
    $BusinessTypeID = $businessname = $BusinessAddressLine1 = $BusinessAddressLine2 = $BusinessCity = $BusinessProvince = $BusinessCountry = $BusinessPostalCode = $BusinessPhone = $BusinessLogo = $BusinessRegNo = $TaxRegNo = $TaxPercent = $CreatedAt = $CreatedBy = $UpdatedAt = $UpdatedBy = $DeletedAt = $DeletedBy = 0;




    $BusinessTypeID         =   isset($_POST['BusinessTypeID'])?$_POST['BusinessTypeID']:'';
    $BusinessName           =   isset($_POST['BusinessName'])?$_POST['BusinessName']:'';
    $BusinessAddressLine1   =   isset($_POST['BusinessAddressLine1'])?$_POST['BusinessAddressLine1']:'';
    $BusinessAddressLine2   =   isset($_POST['BusinessAddressLine2'])?$_POST['BusinessAddressLine2']:'';
    $BusinessCity           =   isset($_POST['BusinessCity'])?$_POST['BusinessCity']:'';
    $BusinessProvince       =   isset($_POST['BusinessProvince'])?$_POST['BusinessProvince']:'';
    $BusinessCountry        =   isset($_POST['BusinessCountry'])?$_POST['BusinessCountry']:'';
    $BusinessPostalCode     =   isset($_POST['BusinessPostalCode'])?$_POST['BusinessPostalCode']:'';
    $BusinessPhone          =   isset($_POST['BusinessPhone'])?$_POST['BusinessPhone']:'';
    $BusinessRegNo          =   isset($_POST['BusinessRegNo'])?$_POST['BusinessRegNo']:'';
    $TaxRegNo               =   isset($_POST['TaxRegNo'])?$_POST['TaxRegNo']:'';
    $TaxPercent             =   isset($_POST['TaxPercent'])?$_POST['TaxPercent']:'';
    $CreatedAt              =   date("Y-m-d h:i:s");
    $CreatedBy              =   isset($_SESSION['loginId']);
    $UpdatedAt              =   NULL;
    $UpdatedBy              =   NULL;
    $DeletedAt              =   NULL;
    $DeletedBy              =   NULL;


    //upload logo code
        $target_dir = "media/business_logo/";
        $target_file = $target_dir . basename($_FILES["BusinessLogo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // check image file authenticity
        if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["BusinessLogo"]["tmp_name"]);
          if($check !== false) {
            $uploadOk = 1; //File is an image
          } else {
            $uploadOk = 0; //File is not an image
          }
        }

        // checking if file already exist
        if (file_exists($target_file)) {
          $uploadOk = 0; //file already exists
        }

        // Checking file size
        if ($_FILES["BusinessLogo"]["size"] > 400000) {
          $uploadOk = 0; //your file is too large
        }

        // checking file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          $uploadOk = 0; //only JPG, JPEG, PNG & GIF files are allowed
        }

        // not allowing file upload
        if ($uploadOk == 0) {
          $image_error = "Sorry, something is wrong, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["BusinessLogo"]["tmp_name"], $target_file)) {
                $BusinessLogo   =   $_FILES["BusinessLogo"]["name"];
          } else {
            $image_error = "Sorry, there was an error uploading your file.";
          }
        }
        //end upload logo code
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
        <form name="form" action="" onsubmit="return isValid();" method="post" enctype="multipart/form-data">
            <div class="container">

                <div class='col-25'>
                <label for="BusinessName"></label></div>
                <div class='col-75'>
                <input type="text" placeholder="Business Name" name="BusinessName" id="BusinessName" value="<?=$BusinessName?>" required>
                </div>

                
                <div class='col-25'>
                <label for="businesstype"></label></div>
                <div class='col-75'>
                <select class="prov" placeholder="Business Type" name="BusinessTypeID" id="BusinessTypeID">
               
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
                <label for="BusinessLogo"></label></div>
                <img class ="resize" src="Media\business_logo/logo.png"  alt="LOGO">
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





