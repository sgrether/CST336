<?php
session_start();
include 'function.php';
?>

<!DOCTYPE>
<html>
    <head>
         <title>Admin Main Page</title>   
    </head>
        
    <body>
        <h1>Admin Main</h1>
        <h2>Welcome Fellow Elite</h2>
        
        <form method='GET' action="addUser.php">
            <input type="submit" value='Add new user'/>
        </form>
        
        <?php showUser(); ?>
    </body>
</html>