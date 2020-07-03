<?php include "config/dbconnect.php";
error_reporting(0);
if(!($_SESSION['loginId'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

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
                                <a href="transaction.php" > <div class="grid__item" id="home-link">
                                    <div class="product">
                                        <div class="tm-nav-link">
                                            <i class="fa fa-credit-card fa-3x tm-nav-icon"></i>
                                            <span class="tm-nav-text">Transactions</span>
                                            <div class="product__bg"></div>        
                                        </div>                                    
                                    </div>
                                </div></a>

                                <a href="BusinessRegistration.php"> <div class="grid__item" id="team-link">
                                    <div class="product">
                                        <div class="tm-nav-link">
                                            <i class="fas fa-users fa-3x tm-nav-icon"></i>
                                            <span class="tm-nav-text">Business Profile</span>
                                            <div class="product__bg"></div>            
                                        </div>                                     
                                    </div>
                                </div></a>

                                <a href="productlist.php"><div class="grid__item">
                                    <div class="product">
                                        <div class="tm-nav-link">
                                            <i class="fa fa-registered fa-3x tm-nav-icon"></i>
                                            <span class="tm-nav-text">Product List</span>
                                            <div class="product__bg"></div>             
                                        </div>   </a>

                                       </div>
                                </div>

                                <a href="customerList.php"><div class="grid__item">
                                    <div class="product">
                                        <div class="tm-nav-link">
                                            <i class="fa fa-address-book fa-3x tm-nav-icon"></i>
                                            <span class="tm-nav-text">Customer List</span>                                                 
                                        </div>                                                              
                                     
                                    </div>
                                </div></a>

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