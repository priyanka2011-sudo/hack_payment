<?php include "header.php";
$link = $_SESSION['connection'];

$get_custs_query = "select * from customer where CustomerPhone='".$_POST['phone_num']."'";
$exec_cust  = mysqli_query($link,$get_custs_query);
$result_cust = mysqli_fetch_array($exec_cust);
$_SESSION['cust_id']=$result_cust['CustomerId'];
?>

<div class="container-fluid">
    <br>
    <h3>Step 2</h3>
    
<div class="portfolio">
  <form class="form-inline my-2 my-lg-0" action="" method="post">
    <input class="form-control mr-sm-2" type="search" name="phone_num" placeholder="Search">
    <button id="searchbtn" class="btn btn-outline-success" type="submit">Search</button>
  </form>
    <h2 class="pfolio" style="text-align:center"><?php echo $result_cust['CustomerName']?></h2>
    <h2 class="pfolio" style="text-align:center"><?php echo $result_cust['CustomerPhone']?></h2>
    <div>
    	<img src="qrcode/temp/<?php echo $result_cust['qrcode']?>.png"/>
    </div>
    <a href="initiation3.php">
    <div class="row">
      <div class="col-md-4 col-lg-2">
        <button class="btn btn-primary  btn-block">Next</button>
      </div>
    </div></a>
</div>
<?php include "footer.php";?>