<?php include "header.php";?>
<div class="container-fluid">
    <br>
    <h3> Product List </h3>
    <br><br>
       
<div class="portfolio">

    <section id="profile_list">
      <div class="container">
        <h2>Product Information</h2>         
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Amount</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text"></td>
              <td><input type="text"></td>
              <td><button type="button" class="btn btn-info"></button></td>
            </tr>
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
