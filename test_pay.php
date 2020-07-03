<?php 
    include_once("config/payment_gateway.php");
    
    $ccnum = $_POST['card_num'];
    $expdate= $_POST['ex_day'];
    $gw = new gwapi;
    $gw->setLogin("Z6C4u6FwJAAr3B6fcgJ52R8aX3jBzBg4");
    $gw->setBilling("Priyanka","haha","Acme, Inc.","123 Main St","Suite 200", "Beverly Hills",
            "CA","90210","US","444-444-3333","222-333-5556","support123@example.com",
            "www.example.com");
    $gw->setShipping("Mary","Smith","na","124 Shipping Main St","Suite Ship", "Beverly Hills",
            "CA","90210","US","support@example.com");
    $gw->setOrder("1234","Big Order",1, 2, "PO1234","65.192.14.10");
    
    $r = $gw->doSale("30.00",$ccnum,$expdate);
//      print_r($gw->responses['responsetext']);
//      var_dump($gw->responses['responsetext']);
//        $response = explode("&", $gw->responses);
//        print_r($gw->responses);
//        echo $gw->responses['response'];
?>
<html>
<?php include "header.php"?>
<div id="msg"></div>
<?php include "footer.php"?>
        <script>
                let msg = document.getElementById("msg");
                msg.style.color = "red";
                <?php echo "var temp =".$gw->responses['response'].";";?>
                switch(temp) {
                        case 1: {
                                msg.appendChild(document.createTextNode("SUCCESS"));
                                break;
                        }
                        case 2: {
                                msg.appendChild(document.createTextNode("DECLINED"));
                                break;
                        }
                        case 3: {
                                msg.appendChild(document.createTextNode("ERROR DUPLICATE"));
                                break;
                        }
                }
                console.log(temp);
        </script>
</html>