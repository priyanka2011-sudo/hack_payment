<?php include "header.php"; ?>
<style><?php include 'CSS/checkout.css';?></style>
        <form name="form" action="#" onsubmit="return isValid();" method="post">            
        <div class="container">         
        </div>     
        <h1>Scan Barcode</h1>    
        <hr>   
            </form>  
            <div class="search">
                <label for="search" id="search"></label>     
                    <input type="text" placeholder="Phone Number..." name="search" class="searchbar"> 
                    <img src="Media/search.png" alt="search icon" class="button">
                    <h1>Customer Profile</h1>  
                    
                    <label for="profile">
                        <input type="text" id="profile" name="profile" value="Customer Profile" readonly>
                    </label>
                </div>                   
                <br>    
                <div class="con">                         
                    <input type="submit" class="scanqr" value="Scan Again"></input>    
                    </div> 
            <hr>  
            <div class="con1">     
                <a href="initiation3.php">                       
                <input type="submit" value="Continue"></input></a>    
                </div>           
<?php include "footer.php"; ?>





