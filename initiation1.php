<?php include"header.php";
$link = $_SESSION['connection'];

//Product dropdown
    $BusinessID    = $_SESSION['BusinessID'];
    // $BusinessTypeID = $bus_type_option = "";
    $prod_query = "select * from product where BusinessID=".$BusinessID." and IsDeleted=0";
    $prod_exec       = mysqli_query($link,$prod_query);
    while ($row = mysqli_fetch_assoc($prod_exec)){
        
        $product_option .= '<option value="'.$row['ProductID'].'_'.$row['ProductAmount'].'">'.$row['ProductName'].'</option>';
       
    }
    //end Product dropdown

    if(isset($_POST['productname'])){

         $ProductID     = $_POST['productname'];
         $quantity      = $_POST['quantity'];
         $ProductAmount = $_POST['amount'];
         $Taxable       = $_POST['taxable'];
         $CreatedAt     = date("Y-m-d h:i:s");
         $CreatedBy     = isset($_SESSION['loginId'])?$_SESSION['loginId']:'';
         $BusinessID    = $_SESSION['BusinessID'];
         $InvoiceNumber = mt_rand();
         $InvoiceDate   = date("Y-m-d");

         //create invoice
         $create_invoice = "INSERT INTO `invoice`(
                                          `BusinessID`,
                                          `InvoiceNumber`,
                                          `InvoiceDate`,
                                          `CreatedAt`,
                                          `CreatedBy`
                                      )
                                      VALUES(
                                          '$BusinessID',
                                          '$InvoiceNumber',
                                          '$InvoiceDate',
                                          '$CreatedAt',
                                          '$CreatedBy'
                                      )";
          if(!mysqli_query($link,$create_invoice)){
                $msg .= "Sorry, Invoice is not created<br/>";
            }
            else{
                //adding invoice item
                $_SESSION['invoiceId'] = $invoiceId =  mysqli_insert_id($link);
                for($i=0;$i<sizeof($ProductID);$i++){
                  $add_product_query = "INSERT INTO `invoiceitem`(
                                                          `invoiceId`,
                                                          `ProductID`,
                                                          `Quantity`,
                                                          `Amount`,
                                                          `CreatedAt`
                                                  )
                                                  VALUES(
                                                          '$invoiceId',
                                                          '$ProductID[$i]',
                                                          '$quantity[$i]',
                                                          '$ProductAmount[$i]',
                                                          '$CreatedAt'
                                                  )";
                  if(!mysqli_query($link,$add_product_query)){
                      $msg .= "Sorry, product ".$ProductName[$i]." is not added<br/>";
                  }
                  else{
                      $msg .= "successfully added product ".$ProductName[$i]."<br/>";
                  }
               }//close for loop
            }
         //end creation of invoice
         
    }// close if post
?>
<script type="text/javascript">
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
  var actions = $("table td:last-child").html();
  // Append table with add row form on add new button click
    $(".add-new").click(function(){
    <?php echo "var product_list='".$product_option."';";?>
    var index = $("table tbody tr:last-child").index();

    var row = '<tr>' +
    
            '<td><select class="btn btn-primary dropdown-toggle" id="products'+(index+1)+'" name="productname[]"><option> Product/Service Name</option>'+product_list+'</select> </td>' +
            '<td><input type="text" class="form-control" name="quantity[]"></td>' +
            '<td><input type="text" class="form-control" name="amount[]"></td>' + '   <td style="text-align: center;"><input type="checkbox" name="taxable[]"/></td>' +
      '<td>' + actions + '</td>' +
        '</tr>';
      $("table").append(row);   
    $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
  


  // Edit row on edit button click
  $(document).on("click", ".edit", function(){    
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
      $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
    });   
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    });
  // Delete row on delete button click
  $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
    });
});
</script>
<div class="container-fluid">
    <br>
    <h3> Initiation</h3>
    <br><br>
       
<div class="portfolio">
    
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Customer">
      <button id="searchbtn" class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <div class="container-lg">
      <div class="table-responsive">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                      <div class="col-sm-8"><h2><b></b></h2></div>
                                      <div class="col-sm-4">
                          <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                        
                      </div>
                  </div>
              </div>
              <form action="" method="post">
              <table class="table table-bordered">
                  <thead>                
                      <tr>
                          <th style="width:240px">Product</th>
                          <th>Quantity</th>
                          <th>Amount</th>
                          <th style="width:80px">Taxable</th>
                          <th>Actions</th>
                      </thead>
                      </tr>
                      <td>                           
                          <label for="products"></label>
                          <select class="btn btn-primary dropdown-toggle" id="products" class="products" name="productname[]">
                              <option> Product/Service Name </option>
                              <?php echo $product_option;?>
                          </select>
                           
                      </td>
                     
                      <td><input type="text" class="form-control" name="quantity[]"></td>   
                      <td><input type="text" class="form-control" name="amount[]"></td>   
                      <td style="text-align: center;"><input type="checkbox"/></td>
                      <td>
                          <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                          <a class="edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                          <a class="delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                      </td>                       
                </thead>
              </table>
              <div class="row">
                        <div class="col-md-4 col-lg-2">
                          <button class="btn btn-primary  btn-block">Save Invoice Item</button>
                        </div><!-- /col -->
                    </div><!-- /row -->
              </form>
              </div>
          </div>
          <br>
  
  </div>

    </div>    
    <a href="initiation2.php">
    <div class="row">
      <div class="col-md-4 col-lg-2">
        <button class="btn btn-primary  btn-block">Next</button>
      </div>
    </div></a>

    <br><br>
</div>
<?php include"footer.php";?>
