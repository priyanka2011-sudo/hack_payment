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
        $target_dir = "img/business_logo/";
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
 <div class="container-fluid">
    <div class="test">
    <br>
    <h3>Business Registration</h3>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            
          <div class="form-group col-md-6">
            <label for="inputEmail4"><h6>Business Name</h6></label>
            <input type="text" class="form-control" id="inputEmail4" name="BusinessName" placeholder="Business Name">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4"><h6>Business Type</h6></label>
            <select id="inputState" class="form-control" name="BusinessTypeID">
              <option selected>Choose...</option>
              <?php echo $bus_type_option;?>
            </select>
          </div>
        </div>
        
        <div class="form-group">
            <label for="inputAddress"><h6>Phone Number</h6></label>
            <input class="form-control" type="tel" placeholder="Phone Number" value="<?=$BusinessPhone?>" name="BusinessPhone" id="example-tel-input">
          </div>

        <div class="form-group">
          <label for="inputAddress"><h6>Address</h6></label>
          <input type="text" class="form-control" id="inputAddress" value="<?=$BusinessAddressLine1?>" name="BusinessAddressLine1" placeholder="1234 Main St">
        </div>

        <div class="form-group">
          <label for="inputAddress2"><h6>Address 2</h6></label>
          <input type="text" class="form-control" id="inputAddress2" value="<?=$BusinessAddressLine2?>" name="BusinessAddressLine2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity"><h6>City</h6></label>
            <input type="text" class="form-control" id="inputCity" value="<?=$BusinessCity?>" name="BusinessCity" placeholder="City">
          </div>
          <div class="form-group col-md-2">
            <label for="inputState"><h6>Province</h6></label>
            <select id="inputState" name="BusinessProvince" class="form-control">
              <option selected>Choose...</option>
              <optgroup label="Provinces">
                <option value="1"> Ontario </option>
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
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip"><h6>Postal-Code</h6></label>
            <input type="text" class="form-control" id="inputZip" value="<?=$BusinessPostalCode?>" name="BusinessPostalCode" placeholder="Postal Code">
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip"><h6>Country</h6></label>
            <input type="text" class="form-control" id="inputZip" value="<?=$BusinessCountry?>" name="  BusinessCountry" placeholder="Country">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4"><h6>Business Reg No</h6></label>
            <input type="text" class="form-control" id="inputEmail4" value="<?=$BusinessRegNo?>" name="BusinessRegNo" placeholder="Business Reg No">
          </div>

          <div class="form-group col-md-6">
            <label for="inputEmail4"><h6>Tax RegNo</h6></label>
            <input type="text" class="form-control" id="inputEmail4" value="<?=$TaxRegNo?>" name="TaxRegNo" placeholder="Tax Reg No">
          </div>

          <div class="form-group col-md-6">
            <label for="inputEmail4"><h6>Tax Percent</h6></label>
            <input type="text" class="form-control" value="<?=$TaxPercent?>" id="inputEmail4" name="TaxPercent" placeholder="Tax Percent">
          </div>

          <div class="form-group col-md-3">
            <label for="inputEmail4"><h6>Business Logo</h6></label>
            
            <input type="file" class="form-control" placeholder="BusinessLogo" name="BusinessLogo" id="BusinessLogo" >
          </div>

          <div class="form-group col-md-3">
            <img class ="resize" src="<?=$BusinessLogo?>"  alt="LOGO">
          </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-2">
              <button class="btn btn-primary active  btn-block">Submit</button>
            </div><!-- /col -->
          </div><!-- /row -->
      </form>
      <br>
  </div>
</div>
<?php include "footer.php";?> 