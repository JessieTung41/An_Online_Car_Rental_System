<?php
    session_start();
    $vehicle = $_POST['vehicle'];
    $day = $_POST['day'];
    
    if(!empty($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }
    else{
        $cart = array();
    }
    
    $cart[$vehicle]['day'] = $day;
    $_SESSION['cart'] = $cart;

?>