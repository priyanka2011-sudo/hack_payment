<?php include "header.php";
$link = $_SESSION['connection'];

$get_inv_query = "select * from invoice join customer on invoice.CustomerIDv=customer.CustomerId
                    join payment on invoice.PaymentID=payment.PaymentID where BusinessID=".$_SESSION['BusinessID'];
$exec_inv     = mysqli_query($link,$get_inv_query);
?>

<div class="container-fluid">
    <br>
    <h3>Invoice List </h3>
    <br><br>
       
<div class="portfolio">

    <section id="profile_list">
      <div class="container">
        <h2>Invoice Information</h2>         
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Invoice Number</th>
              <th>Customer Name</th>
              <th>Amount</th>
              <th>View</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($row=mysqli_fetch_assoc($exec_inv)){
                ?>
                <tr>
                  <td><?php echo $row['InvoiceNumber'];?></td>
                  <td><?php echo $row['CustomerName'];?></td>
                  <td><?php echo $row['InvoiceNumber'];?></td>
                  <td><a href="ViewInvoice.php?id=<?php echo $row['InvoiceID']?>"><button type="button" class="btn btn-info"></button></a></td>
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
      <input class="form-control mr-sm-2" type="search" placeholder="Search By Invoice#">
      <button id="searchbtn" class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <br>
        <a href="initiation1.php">
   
          <div class="row">
            <div class="col-md-4 col-lg-2">
              <button class="btn btn-primary  btn-block">Initiate Invoice</button>
            </div><!-- /col -->
          </div><!-- /row --></a>
          <br>
          <br>      
    </section>
  
</div>
<br><br>
<br><br>
<?php include "footer.php";?>
