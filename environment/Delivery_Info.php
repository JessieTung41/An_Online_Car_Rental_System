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


?>
<html>
    <head>
        <style type="text/css">
            .content{ 
                border:none;
                background-color: rgb(255, 255, 255);
            } 
            .homepage{
                float: right;
                background-color: rgb(255, 255, 255);    
                border: none;
                padding: 0.5em;
                border-radius: 5px;
            }
            input[type=button],
            input[type=submit] {
                background-color: #62529c;
                border: none;
                color: #fff;
                padding: 0.5em;
                margin: 4px 2px;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script>
        $().ready(function() {
        $("#delivery_form").validate({
          rules: {
            first_name: { 
                required: true,
                minlength: 2
            },
            last_name: {
                required: true,
                minlength: 2
            },
            address1: "required",
            city:"required",
            postcode: "required",
            state: "required",
            payment:"required",
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            first_name: {
                required: "Please enter your firstname",
                minlength: "Your first name must at least 2 characters"
            },
            last_name: {
                required: "Please enter your firstname",
                minlength: "Your last name must at least 2 characters"
            },
            address1: "Please enter your address",
            city: "Please enter your city",
            postcode: "Please enter your postcode",
            state: "Please enter your state",
            payment: "Please choose the payment method",
            email: {
                required: "Please enter your email address",
                email: "Please enter valid email address"
            }
        }
    });
});
</script>
    </head>
    <body style="background-color: rgb(200, 191, 231);">
        <div>
            <input type="button" onclick="location.href='index.html';" value="Continue Selection" class="homepage" />
            <center>
                <h2>Car Rental Center</h2>
            </center>
        </div>
        <div class="content" id="content">
        <br>
            <center>
                <h2>Check Out</h2>
            </center>
            <h2>Customer Details and Payment</h2>
            <?php
                echo "You are required to pay $" . $total;           
             
            ?>
            <h3>Please fill in your details. * indicates required field.</h3>
            <form method="post" action="Successful.php" id="delivery_form">
                <table>
                    <tr>
                        <td>First Name: <span style="color:red;">*</span></td>
                        <td><input type="text" name="first_name" id="first_name"></td>
                    </tr>
                    <tr>
                        <td>Last Name: <span style="color:red;">*</span></td>
                        <td><input type="text" name="last_name" id="last_name"></td>
                    </tr>
                    <tr>
                        <td>Email Address: <span style="color:red;">*</span></td>
                        <td><input type="text" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td>Address Line1: <span style="color:red;">*</span></td>
                        <td><input type="text" name="address1" id="address1"></td>
                    </tr>
                    <tr>
                        <td>Address Line2:</td>
                        <td><input type="text" name="address2"></td>
                    </tr>
                    <tr>
                        <td>City: <span style="color:red;">*</span></td>
                        <td><input type="text" name="city" id="city"></td>
                    </tr>
                    <tr>
                        <td>State: <span style="color:red;">*</span></td>
                        <td>
                            <select name="state" id="state">
                                <option value="NT">NT</option>
                                <option value="QLD">QLD</option>
                                <option value="NSW">NSW</option>
				                <option value="ACT">ACT</option>
                                <option value="TAS">TAS</option>
                                <option value="VIC">VIC</option>
                                <option value="WA">WA</option>           
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Post Code: <span style="color:red;">*</span></td>
                        <td><input type="text" name="postcode" id="postcode"></td>
                    </tr>
                    <tr>
                        <td>Payment Type<span style="color:red;">*</span></td>
                        <td class="right"><select name="payment" id="payment">
                            <option value="Alipay">Alipay</option>
                            <option value="Weixin">Weixin</option>
                            <option value="Paypal">Paypal</option> 
                            <option value="VISA">VISA</option>
                            <option value="MASTER">MASTER</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" value="Booking"></td>
                    </tr>
                </table>
            </form>
            <br>
        </div>
        
    </body>
</html>