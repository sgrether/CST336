<?php
session_start();
include 'function.php';

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE>
<html>
    <head>
         <title>Admin Main Page</title> 
         <script>
             function confirmDelete() {
                 return confirm("Are you sure you want to delete this user?");
             }
         </script>
         <style>@import url(styles.css);</style>
    </head>
        
    <body>
        <h1>Admin Main</h1>
        <h2>Welcome Fellow Elite</h2>
        
        <form method='POST' action="addUser.php">
            <input type="submit" name="action" value='Add new user'/>
        </form>
        
        <form action="logout.php">
            <input type="submit" name="action" value="Logout"/>
        </form>
        
        <form action="reports.php">
            <input type="submit" name="action" value="Reports"/>
        </form>
        
        <table id="users">
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php 
                showUser();
            ?>
        </table>
    </body>
</html>