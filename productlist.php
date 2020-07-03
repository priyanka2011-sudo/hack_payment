<?php include "header.php";
$link = $_SESSION['connection'];

$get_prod_query = "select * from product";
$exec_prod  = mysqli_query($link,$get_prod_query);


?>
<div class="container-fluid">
    <br>
    <h3> Product List </h3>
    <br><br>
       
<div class="portfolio">

    <section id="profile_list">
      <div class="container">
        <h2>Product Information</h2>         
        <table class="table table-bordered">
          <thead style="background:#fff;">
            <tr>
              <th>Name</th>
              <th>Amount</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody style="background:#fff;">
            <?php
              while ($row=mysqli_fetch_assoc($exec_prod)){
                ?>
                <tr>
                  <td><?php echo $row['ProductName']?></td>
                  <td><?php echo $row['ProductAmount']?></td>
                  <td><a href="updateProduct.php?id=<?php echo $row['ProductID']?>"><button type="button" class="btn btn-info">Update</button></a></td>
                </tr>
                <?php
              }
            ?>
            
            </tbody>
        </table>
      </div>
    </section>
    <section id="main_container">
          
    <form style="margin-right: 50px;" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Product">
      <button id="searchbtn" class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <br>
        <a href="ProductRegistration.html">
   
          <div class="row">
            <div class="col-md-4 col-lg-2">
              <button class="btn btn-primary  btn-block">Register</button>
            </div><!-- /col -->
          </div><!-- /row --></a>
          <br>
          <div class="row">
            <div class="col-md-4 col-lg-2">
              <button class="btn btn-primary  btn-block">Scan Barcode</button>
            </div><!-- /col -->
          </div><!-- /row -->
          <br>      
    </section>
  
</div>
<br><br>
<br><br>
<?php include "footer.php";?>
