<?php
    session_start();
    if(!empty($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }
    else{
        $cart = array();
    }
    $total = 0;
    foreach ($cart as $car => $info) {
      $total += $info['price']*$info['day'];
    }
    
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $address1 = $_POST['address1'];
    if(isset($_POST['address 2'])){
        $address2 = $_POST['address2'];
    }
    else{
        $address2="null";
    }
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $payment = $_POST['payment'];
?>
<html>
    <head>
        <style type="text/css">
            .content{ 
                border:none;
                background-color: rgb(255, 255, 255);
            } 
            .image{
                max-width: 100%;
            }
            
            
            td {
                text-align:center;
            }
            .homepage{
                float: right;
                background-color: rgb(255, 255, 255);    
                border: none;
                padding: 0.5em;
                border-radius: 5px;
            }
            input[type=button] {
                background-color: #62529c;
                border: none;
                color: #fff;
                padding: 0.5em;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
            }
            
        </style>
    </head>
    <body style="background-color: rgb(200, 191, 231);">
        <div>
            <input type="button" onclick="location.href='index.html';" value="Homepage" class="homepage" />
            <center>
                <h2>Car Rental Center</h2> 
                
            </center>
            
           
        </div>
        <div class="content" id="content">
            <center>
            <h3>Reservation Details： </h3>
            </center>
             <table border=1px>
                    <tr>
                        <th style="width: 10%">Thumbnail</th><th style="width: 10%">Vehicle</th><th style="width: 10%">Price Per Day</th><th style="width: 10%">Rental Days</th>
                    </tr>
                    
                    <?php
                        foreach ($cart as $car => $info) {
                        
                    ?>
                    <tr>
                        <td><img src="<?php echo $info['thumbnail'];?>" class="image"></td>
                        <td><?php echo $info['vehicle'];?></td>
                        <td><?php echo $info['price'];?></td>
                        <td><?php echo $info['day'];?></td>
                        
                    </tr>
                    <?php
                        }
                    ?>
                   
                    </table>
                    <p style="color: red;">The total cost is $<?php echo $total; ?></p>
                   
                    <center>
                    <h3>Delivery Details: </h3>
                    <table border=1px>
                        <tr>
                            <td>First Name: </td>
                            <td><?php echo $firstname; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name: </td>
                            <td><?php echo $lastname; ?></td>
                        </tr>
                        <tr>
                            <td>Email Address: </td>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td>Address Line 1: </td>
                            <td><?php echo $address1; ?></td>
                        </tr>
                        <tr>
                            <td>Address Line 2: </td>
                            <td><?php echo $address2; ?></td>
                        </tr>
                        <tr>
                            <td>City: </td>
                            <td><?php echo $city; ?></td>
                        </tr>
                        <tr>
                            <td>State: </td>
                            <td><?php echo $state; ?></td>
                        </tr>
                        <tr>
                            <td>Post Code: </td>
                            <td><?php echo $postcode; ?></td>
                        </tr>
                        <tr>
                            <td>Payment Method: </td>
                            <td><?php echo $payment; ?></td>
                        </tr>
                    </table>
                <p style="color: red;">If you have any question about your order, please contact us!</p>   
                </center>
                <?php session_destroy(); ?>
        </div>
    </body>
    
</html>