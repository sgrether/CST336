<?php
session_start();
include "function.php";

if(isset($_GET['return'])) {
    header("Location: admin.php");
}
?>

<!DOCTYPE>
<html>
    <head>
        <title>Reports</title>
        <h1>Reports</h1>
        <style>@import url(styles.css);</style>
    </head>
    
    <body>
        <form method="get">
            <input type="submit" name="users" value="Number of Users">
            <input type="submit" name="price" value="Average Price of Products">
            <input type="submit" name="admins" value="Number of Admin Accounts"><br>
            <input type="submit" name="return" value="Return to Admin Page">
        </form>
        
        <?php
            if(isset($_GET['users'])) {
                $count = showUserCount();
                echo "Number of Users: " . $count;
            }
            if(isset($_GET['price'])) {
                $average = showAveragePrice();
                $average = money_format('$%i', $average);
                echo "Average price of all products: " . $average;
            }
            if(isset($_GET['admins'])) {
                $admins = showAdminCount();
                echo "Number of Admin accounts: " . $admins;
            }
        ?>
    </body>
</html>