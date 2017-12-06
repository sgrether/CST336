<?php
session_start();
include "function.php";
$conn = dbConnect();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE userName='$username' AND password='".sha1($pass)."'";
    
    $_SESSION['username'] = $username;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

?>

<!DOCTYPE>
<html>
    <head>
        <title>Admin Login</title>
        <h1>Admin Login</h1>
        <style>@import url(styles.css);</style>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        
        <script>
            function validateLogin() {
                $.ajax({
                    type: "post",
                    url: "function.php",
                    dataType: "json",
                    data: {
                        'username': $('#username').val(),
                        'action': 'validateLogin'
                    },
                    success: function(data, status) {
                        if(data == false) {
                            $('#login-valid').html("");
                            $('#login-valid').html("Incorrect username.");
                            $('#login-valid').css({"color" : "red"});
                        } else {
                            $('#login-valid').html("");
                            $('#login-valid').html("Correct username.");
                            $('#login-valid').css({"color" : "green"});
                        }
                    }
                });
            }
        </script>
    </head>
    <body>
        
        <form method="post">
            Username: <input onchange="validateLogin();" type="text" id="username" name="username"><br>
            <span id="login-valid"></span><br>
            Password: <input type="password" id="password" name="password"/><br><br>
            
            <input type="submit" name="submit" value="Login"/>
        </form>
        <?php
            if(isset($_POST['submit'])) {
                if($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['adminName'] = $row['firstName']. " " . $row['lastName'];
                    header("Location: admin.php");
                } else {
                    echo "Invalid username or password.<br>";
                }
            }
        ?>
    </body>
</html>