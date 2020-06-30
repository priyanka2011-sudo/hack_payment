<?php include "config/dbconnect.php";
error_reporting(0);
if(!($_SESSION['loginId'])){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<title>App</title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/CustomerList2.css">
    <link rel="stylesheet" type="text/css" href="CSS/CustomerRegisteration.css">
    <link rel="stylesheet" type="text/css" href="CSS/mycss.css">
    <script src="JS/CustomerList.js"></script>
    <script src="JS/invoiceinitiation.js"></script>
    <script src="JS/registration.js"></script>
    <script src="JS/OTPConfirmation.js"></script>
</head>
<body>
    <div id="top_bar">
        <img src="Media/logo-placeholder.jpg" id="logo">
        <img src="Media/menu_toggle3.png" id="menu_toggle" onclick="toggleMenu();">
        <nav id="nav_bar">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="Transaction.php">Transaction</a></li>
                <li><a href="CustomerList2.php">Customer</a></li>
                <li><a href="#FAQ">FAQ</a></li>   
                <li><a href="#help">Help</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        
    </div>
    <section id="main_container">