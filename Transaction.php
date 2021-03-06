<?php include "header.php";?>
<div class="container-fluid">
    <br>
    <h3> Transaction </h3>
    <br><br>
<div class="portfolio">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search by phone number">
      <button id="searchbtn" class="btn btn-outline-success" type="submit">Search</button>
      </form>
   
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search by email">
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
                <table class="table table-bordered">
                    <thead>                
                        <tr>
                            <th style="width:240px">Product</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th style="width:80px">Taxable</th>
                            <th>Actions</th>
                        </thead>
                        </tr>
                        <td>                           
                            <label for="products"></label>
                            <select class="btn btn-primary dropdown-toggle" id="products" name="products">
                                <option value="p0" selected="selected"> Product/Service Name </option>
                                <option value="p1">product1</option>
                                <option value="p2">product2</option>
                                <option value="p3">product3</option>
                            </select>
                             
                        </td>
                       
                        <td><input type="text" class="form-control"></td>   
                        <td><input type="text" class="form-control"></td>   
                        <td style="text-align: center;"><input type="checkbox"/></td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>                       
                
                </table>
                </div>
            </div>
            <br>
    </div>
    <a href="initiation1.php">
    <div class="row">
      <div class="col-md-4 col-lg-2">
        <button class="btn btn-primary  btn-block">Initiation Transaction</button>
      </div>
    </div></a>
    </div>   
     
    <br><br>
</div>
<?php include "footer.php";?>