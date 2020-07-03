<?php
include "config/dbconnect.php";
$link = $_SESSION['connection'];
error_reporting(0);
if(isset($_POST)){
    $UserName   =     isset($_POST['username'])?$_POST['username']:'';
     $Password   =     isset($_POST['password'])?$_POST['password']:'';

    $check_user       = "select * from login where UserName = '".$UserName."' and Password='".$Password."'";
      $exec_check_user  = mysqli_query($link,$check_user);

      if (mysqli_num_rows($exec_check_user)==0){
            $error_msg = "You are not authorised";
      }
      else{
            $userdata = mysqli_fetch_array($exec_check_user);
            echo $_SESSION['loginId']    =     $userdata['loginId'];
            echo $_SESSION['UserTypeID']    =     $userdata['UserTypeID'];
        echo "priyanka";
            if($userdata['UserTypeID']==1){
                  header('Location: CustomerList2.php');
            }
            elseif($userdata['UserTypeID']==2){
               //get business id
               $get_bus_id = "select BusinessID from business b JOIN login l ON (b.BusinessID = l.UserID) 
               where l.UserTypeID=2 and loginId =".$_SESSION['loginId'];

               $result_bus_id     = mysqli_fetch_array(mysqli_query($link,$get_bus_id));
               $_SESSION['BusinessID']  = $result_bus_id['BusinessID'];

               header('Location: index.php');
            }
            else{
              //code for customer
            }
            
      }
}
 //get business id
     $get_bus_id = "select BusinessID from business b JOIN login l ON (b.BusinessID = l.UserID) 
     where l.UserTypeID=2 and loginId =".$login_id;

     $result_bus_id     = mysqli_fetch_array(mysqli_query($link,$get_bus_id));
     $BusinessID        = $result_bus_id['BusinessID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- load CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                  <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">                <!-- https://fontawesome.com/ -->
  <!--  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>                      http://kenwheeler.github.io/slick/ -->
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/tooplate-style.css">                               <!-- Templatemo style -->
    
</head>
<body>
    <div id="tm-bg"></div>
             <div id="tm-wrap">
        <div class="tm-main-content">
            <div class="container tm-site-header-container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-md-col-xl-6 mb-md-0 mb-sm-4 mb-4 tm-site-header-col">
                        <div class="tm-site-header">
                            <h1 class="mb-4">WELCOME TO <span class="typed"></span></h1>
                            <img src="img/underline.png" class="img-fluid mb-4">      
                        </div>                        
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="content">
                            <div class="grid">
                                <div class="grid__item" id="home-link">
                                    <div class="product">
                                        <form action="" method="post">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input id="username"  type="text" name="username" class="form-control" placeholder="Username">
                                            </div>  
                                    
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input id="password"  type="password" name="password" class="form-control" placeholder="Password">
                                            </div>  
                                    
                                            <div class="col-md-4 col-lg-2">
                                              <button class="btn btn-primary  btn-block">Submit</button>
                                            </div><!-- /col -->
                                         
                                        </form>
                                    </div>
                                </div><!--close div grid-item-->
                            </div> 
                        </div>                       
                    </div>
                </div>                
            </div>
        </div> <!-- .tm-main-content -->  
    </div>    
    <footer>
        <div class="footer">
        <p class="footer-content"> All Rights Reserved - Copyright &copy; 2020 <span class="tm-current-year"></span></p>
    </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/typed.js"></script>
    <script src="js/main.js"></script>
</body>
</html>