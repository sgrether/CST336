<?php
session_start();
//overwrites old cart setting it to empty
 $_SESSION['cart'] = array();
 header("Location: cart.php");
?>