<?php
session_start();
include "function.php";
?>

<!DOCTYPE>
<html>
    <head>
        <title>Main Page</title>
        <h1>Main Page</h1>
        <style>@import url(styles.css);</style>
    </head>
    
    <body>
        <h3>Filters:</h3>
        <form method="get">
            <input type="text" name="search" placeholder="Search Device Name"><br>
            <select name="sortBy">
                <option value="">Sort By:</option>
                <option value="name">Name</option>
                <option value="type">Type</option>
                <option value="price">Price</option>
            </select><br>
            <input type="radio" name="sort" value="Ascending">Ascending<br>
            <input type="radio" name="sort" value="Descending">Descending<br>
            <input type="submit" name="submit" value="Submit"><br>
        </form>
        
        <table id="product" align="center">
            <tr>
                <th>Product Name</th>
                <th>Product Type</th>
                <th>Price</th>
            </tr>
            <?php
                showProduct();
            ?>
        </table>
        
        <form method="get">
            <input type="submit" name="login" value="Admin Login"><br>
        </form>
        <?php
            if(isset($_GET['login'])) {
                header("Location: login.php");
            }
        ?>
    </body>
</html>