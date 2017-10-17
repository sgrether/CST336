<?php
session_start();
$host = 'us-cdbr-iron-east-05.cleardb.net';
$dbname = 'heroku_1dc696fd55314f5';
$username = 'b926203f77ae12';
$password = '216f3b0b';

$conn = new mysqli($host, $username, $password, $dbname);
if($conn -> connect_error) {
    die("Connection failed: ". $conn->connect_error);
} //else {
//     echo "database connected successfully <br>";
// }

if($_GET['filter'] != '') {
    $sql = 'SELECT * FROM device WHERE device'.$_GET['dropdown'].' = "'.$_GET['filter'].'"';
    if($_GET['available'] == 'Available') {
        $sql = $sql." AND status = 'available'";
    }
} else {
    if($_GET['available'] == 'Available') {
        $sql = 'SELECT * FROM device WHERE status = "available"';
    } else {
        $sql = 'SELECT * FROM device';
    }
}

if($_GET['price'] == 'price') {
    $sql = $sql . " ORDER BY price";
} else {
    $sql = $sql . " ORDER BY deviceName";
}
// echo $sql;
$table = $conn->query($sql);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title> Tech Checkout </title>
        <style>@import url(styles.css);</style>
    </head>
    <!--mysql://b926203f77ae12:216f3b0b@us-cdbr-iron-east-05.cleardb.net/heroku_1dc696fd55314f5?reconnect=true-->
    <!--mysql --host=us-cdbr-iron-east-05.cleardb.net  --user=b926203f77ae12  --password=216f3b0b heroku_1dc696fd55314f5-->
    
    <body>
        <form method="get">
            <select name="dropdown">
                <option value="">None</option>
                <option value="Type">Type</option>
                <option value="Name">Name</option>
            </select>
            
            <input type="radio" name="name" value="name"> Name
            <input type="radio" name="price" value="price"> Price
            <input type="checkbox" name="available" value="Available"> Availability
            
            <input type="text" name="filter">
            <input type="submit" value="Submit">
        </form>
        
        <br>
        <table id="table">
            <tr>
                <th>Device Name</th>
                <th>ID</th>
                <th>Device Type</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        <?php
            if($table -> num_rows > 0) {
                while($row = $table->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th>".$row['deviceName']."</th>";
                    echo "<th>".$row['id']."</th>";
                    echo "<th>".$row['deviceType']."</th>";
                    echo "<th>".$row['price']."</th>";
                    echo "<th>".$row['status']."</th>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
        ?>
        </table>
        
    </body>
</html>