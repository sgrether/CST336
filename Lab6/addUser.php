<?php
include 'function.php';

if(isset($_GET['addUser'])) {
    $sql = "INSERT INTO user
                (firstName, lastName, email, phone, role, deptId)
            VALUES
                ('".$_GET["firstName"]."', '".$_GET["lastName"]."', '".$_GET["email"]."', '".$_GET["phoneNum"]."', '".$_GET["role"]."', '".$_GET["department"]."')";
    
    $conn = dbConnect();
    // echo $sql."<br>";
    $table = $conn->query($sql);
    echo "User was added!";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Add new user </title>
    </head>
    <body>
        <h1> Tech Checkout System: Adding a New User </h1>
        <form method="GET">
            User Id: <input type="text" name="userId" />
            <br />
            First Name:<input type="text" name="firstName" />
            <br />
            Last Name:<input type="text" name="lastName"/>
            <br/>
            Email: <input type= "email" name ="email"/>
            <br/>
            Phone Number: <input type ="text" name= "phoneNum"/>
            <br />
            Role: 
            <select name="role">
                <option value=""> - Select One - </option>
                <option value="staff">Staff</option>
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
            </select>
            <br />
            Department: 
            <select name="department">
                <option value="" > Select One </option>
                <?=departments()?>
            </select>
            <input type="submit" value="Add User" name="addUser">
        </form>
    </body>
</html>