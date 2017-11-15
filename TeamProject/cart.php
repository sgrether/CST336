<?php
session_start();
?>


<html>
    <head>
        <title>Online Store</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="functions.php"/>
    </head>
    
    <body>
        <header>
            <h1>Welcome!</h1>
            <br>
            <form>
                <input type="submit" name="all" value="All">
                <input type="submit" name="ani" value="Anime">
                <input type="submit" name="elec" value="Electronics">
                <input type="submit" name="app" value="Apparel">
                <input type="submit" name="res" value="Reset Cart">
            </form>
            <h3>Your Cart:</h3>
        </header>
        
        <div id="wrapper">
            
            <?php
                    //loops through each item of the cart
                    foreach ($_SESSION['cart'] as $value) {
                        echo "$value <br>";
                    }
                
                    if($_GET[all]) {
                        header("Location: index.php");
                    }
                    if($_GET[ani]) {
                        header("Location: anime.php");
                    }
                    if($_GET[elec]) {
                        header("Location: electronics.php");
                    }
                    if($_GET[app]) {
                        header("Location: apparel.php");
                    }
                    if($_GET[res]) {
                        header("Location: reset_cart.php");
                    }
            ?>
        
        </div>
        
    </body>
</html>