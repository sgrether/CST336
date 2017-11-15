<?php
session_start();
//pushes id into cart, id is the name of the item
array_push($_SESSION['cart'], $_GET['id']);
header("Location: cart.php");
?>