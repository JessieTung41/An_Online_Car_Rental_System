<?php
    session_start();
    if(!empty($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }
    else{
        $cart = array();
    }
    //print_r($_SESSION['cart']);
    
    $num = count($cart);
    //echo $num;
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
            
            .dButton {
                display: block;
                background-color: rgb(200, 191, 231);
                padding: 5px;
                text-align: center;
                border-radius: 5px;
                font-weight: bold;
                text-decoration: none;
                color: black;
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
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>
        
       
        
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
                <h2>Car Reservation</h2>
                <form method="post" action="Delivery_Info.php" onsubmit="return checkSession()">
                <table border=0>
                    <tr>
                        <th style="width: 20%">Thumbnail</th><th style="width: 20%">Vehicle</th><th style="width: 20%">Price Per Day</th><th style="width: 20%">Rental Days</th><th style="width: 20%">Actions</th>
                    </tr>
                    
                    <?php
                        foreach ($cart as $car => $info) {
                        
                    ?>
                    <tr>
                        <td><img src="<?php echo $info['thumbnail'];?>" class="image"></td>
                        <td><?php echo $info['vehicle'];?></td>
                        <td><?php echo $info['price'];?></td>
                        <td><input type="text" id="day" name="<?php echo $info['vehicle'];?>" value="<?php echo $info['day'];?>" style="text-align:center;" onchange=updateDays(this.name,this.value)></td>
                        <td>
                            <a href="Delete.php?clearVehicle=<?php echo $info['vehicle'];?>" class="dButton">Delete</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                    
                    <tr>
                        <td colspan="4"></td>
                        <td><input type="submit" value="Processing to CheckOut"></td>
                    </tr>
                </table>
                </form>
                <br>
            </center>
            <script type="text/javascript">
            function checkSession(){
                var check = "<?php echo $num; ?>";
                console.log(check);
                if(check == 0){
                    alert("No car has been reserved.");
                    window.location.href = "index.html";
				    return false;
                }
                return true;
            }
            
            function CreateXHR(){
                if(window.XMLHttpRequest){
                    return new XMLHttpRequest();
                } else {
                    return new ActiveXObject("Microsoft.XMLHTTP");
                }
            }
            
            function updateDays(vehicle, day){
                console.log(vehicle);
                console.log(day);
                if(day <= 0){
                    alert("Please enter valid days!");
                    window.location.href = "ShoppingCart.php";
                    return false;
                }
                else if(parseInt(day) != day){
                    alert("Please enter whole days only!");
                    window.location.href = "ShoppingCart.php";
                    return false;
                }
                else{
                    var change = "vehicle="  + vehicle  + "&day="  + day;
                    var xhr = CreateXHR();
                    xhr.open('POST','UpdateSession.php',true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.send(change);
                }
            }
        </script>
        </div>
    </body>
</html>