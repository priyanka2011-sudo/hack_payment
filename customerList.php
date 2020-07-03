<?php include "header.php"; 
$link = $_SESSION['connection'];

$get_cust_query = "select * from customer";
$exec_cust      = mysqli_query($link,$get_cust_query);
?>

<div class="container-fluid">
    <br>
    <h3> Customer List </h3>
    <br><br>
       
<div class="portfolio">

    <section id="profile_list">
      <div class="container">
        <h2>Customer Information</h2>         
        <table class="table table-bordered">
          <thead style="background:#fff;">
            <tr>
              <th>Name</th>
              <th>Phone Number</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody style="background:#fff;">
            <?php
              while ($row=mysqli_fetch_assoc($exec_cust)){
                ?>
                  <tr>
                    <td><?php echo $row['CustomerName']?></td>
                    <td><?php echo $row['CustomerPhone']?></td>
                    <td><a href="updateCustomer.php?id=<?php echo $row['CustomerId']?>"><button type="button" class="btn btn-info">Update</button></a></td>
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
      <input class="form-control mr-sm-2" type="search" placeholder="Search Customer">
      <button id="searchbtn" class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <br>
        <a href="CustomerRegistration.php">   
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
<?php include "footer.php"?>