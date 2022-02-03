<?php
   session_start();

   $price = $_POST['price'];
   $thumbnail = $_POST['thumbnail'];
   $vehicle = $_POST['vehicle'];
   $day = 1;
   /*echo $price;
   echo $thumbnail;
   echo $vehicle;*/
   if(!isset($_SESSION['cart'])){
     $_SESSION['cart'] = array();
   }
   $cart = $_SESSION['cart'];
   if(empty($cart)){
      $new_input = array($vehicle => array('vehicle'=>$vehicle, 'thumbnail'=>$thumbnail, 'price'=>$price, 'day'=>$day));
      foreach ($new_input as $key => $value) {
         $cart[$key] = $value;
      }
      $_SESSION['cart']=$cart;
   }
   else if(!array_key_exists($vehicle, $cart)){
      $new_input = array($vehicle => array('vehicle'=>$vehicle, 'thumbnail'=>$thumbnail, 'price'=>$price, 'day'=>$day));
      foreach ($new_input as $key => $value) {
         $cart[$key] = $value;
      }
      $_SESSION['cart']=$cart;
   }
   else{
      $_SESSION['cart']=$cart;
   }
   //print_r($_SESSION['cart']);
  // session_destroy(); 
?>