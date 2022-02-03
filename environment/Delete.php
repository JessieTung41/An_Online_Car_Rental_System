<?php
    session_start();
    $deleteCar = $_GET["clearVehicle"];
    if(isset($deleteCar)){
        unset($_SESSION['cart'][$deleteCar]);
    }
    header("Location:ShoppingCart.php");
?>