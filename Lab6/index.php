<?php
session_start();
include "function.php";
$conn = dbConnect();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE userName='$username' AND password='".sha1($pass)."'";
    // echo $sql;
    
    $table = $conn->query($sql);
}

?>

<!DOCTYPE>
<html>
    <header>
        <title>Admin Login</title>
        <h1>Admin Login</h1>
    </header>
    <body>
        
        <form method="post">
            Username: <input type="text" name="username"/> <br>
            Password: <input type="password" name="password"/> <br>
            <input type="submit" name="submit" value="Login"/>
        </form>
        <?php
            if(isset($_POST['submit'])) {
                if($table->num_rows > 0) {
                    $row = $table->fetch_assoc();
                    $_SESSION['adminName'] = $row['firstName']. " " . $row['lastName'];
                    header("Location: admin.php");
                } else {
                    echo "Invalid username or password.<br>";
                }
            }
        ?>
    </body>
</html>