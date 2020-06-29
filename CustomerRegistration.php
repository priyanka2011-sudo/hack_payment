<?php include "header.php"; ?>
        <form name="form" action="#" onsubmit="return isValid();" method="post">            
            <div class="container">
              
                <div class='col-25'>
                <label for="name"></label></div> 
                <div class='col-75'>
                <input type="text" placeholder="Name" name="name" id="name" required>
            </div> 

                <div class='col-25'>
                <label for="phonenum"></label></div> 
                <div class='col-75'>
                <input type="tel" placeholder="Phone Number" name="phonenum" id="phonenum" pattern=".{10,}" title="Phone Number cannot be less than 10 digits"oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
            </div> 

                <div class='col-25'>
                <label for="email"></label> </div> 
                <div class='col-75'>
                <input type="email" placeholder="Email" name="email" id="email" required>
            </div> 

                <hr>                           
                <input type="submit" value="Submit"></input>
            </div> 
        </div> 
              
            </form>
<?php include "footer.php"; ?>




