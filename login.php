<?php
include "config/dbconnect.php";
$link = $_SESSION['connection'];

if(isset($_POST)){

      $UserName   =   $_POST['UserName'];
      $Password   =   $_POST['Password'];

      echo $check_user       = "select * from login where UserName = '".$UserName."' and Password='".$Password."'";
      $exec_check_user  = mysqli_query($link,$check_user);

      if (mysqli_num_rows($exec_check_user)==0){
            $error_msg = "You are not authorised";
      }
      else{
            $userdata = mysqli_fetch_array($exec_check_user);
            echo $_SESSION['loginId']    =     $userdata['loginId'];
            echo $_SESSION['UserTypeID']    =     $userdata['UserTypeID'];

            if($userdata['UserTypeID']==1 || $userdata['UserTypeID']==2){
                  header('Location: CustomerList2.php');
            }
            else{
                  //header('Location: http://www.example.com/');
            }
            
      }
}

?>
<!DOCTYPE html>
<title>App</title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/CustomerList2.css">
    <link rel="stylesheet" type="text/css" href="CSS/CustomerRegisteration.css">
    <link rel="stylesheet" type="text/css" href="CSS/Invoiceinitiation.css">
    <script src="JS/CustomerList.js"></script>
    <script src="JS/invoiceinitiation.js"></script>
    <script src="JS/registration.js"></script>
    <script src="JS/OTPConfirmation.js"></script>
</head>
<body>
    <div id="top_bar">
        <img src="Media/logo-placeholder.jpg" id="logo">
        <img src="Media/menu_toggle3.png" id="menu_toggle" onclick="toggleMenu();">
       <!--  <nav id="nav_bar">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="Transaction.php">Transaction</a></li>
                <li><a href="CustomerList2.php">Customer</a></li>
                <li><a href="#FAQ">FAQ</a></li>   
                <li><a href="#help">Help</a></li>
            </ul>
        </nav> -->
        
    </div>
      <section id="main_container">

            <form name="form" action="" onsubmit="return isValid();" method="post">            
                  <div class="container">
                    
                      <div class='col-25'>
                      <label for="UserName"></label></div> 
                      <div class='col-75'>
                      <input type="text" placeholder="UserName" name="UserName" id="UserName" required>
                        </div> 

                      <div class='col-25'>
                      <label for="Password"></label> </div> 
                      <div class='col-75'>
                      <input type="Password" placeholder="Password" name="Password" id="Password" required>
                        </div> 

                      <hr>                           
                      <input type="submit" value="Submit"></input>
                  </div> 
                  </div> 
              
            </form>
      </section>
</body>
<footer>
    <section id="footer_container">
        <div id="footer_logo">
            NVPSD team
        </div>
        <br>
        <div id="footer_contact">
            Contact us <br>
            <img src="Media/phone3.png" class="footer_icon"> ########## <br>
            <img src="Media/email.png" class="footer_icon"> asdf123@mail.com
        </div>
        <br>
        <div id="copyright">
            © Copyright 
        </div>
    </section>
</footer>
