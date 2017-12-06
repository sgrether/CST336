<?php
session_start();

function dbConnect() {
    $host = 'us-cdbr-iron-east-05.cleardb.net';
    $dbname = 'heroku_1dc696fd55314f5';
    $username = 'b926203f77ae12';
    $password = '216f3b0b';
    // mysql --host=us-cdbr-iron-east-05.cleardb.net  --user=b926203f77ae12  --password=216f3b0b heroku_1dc696fd55314f5
    // return new mysqli($host, $username, $password, $dbname);
    $dbConn = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConn;
}

function showUser() {
    $conn = dbConnect();
    $sql = "SELECT * FROM user WHERE 1 ORDER BY lastName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        // echo $row['firstName']." ".$row['lastName']." ".$row['email'];
        echo "<td>".$row['firstName']."</td>";
        echo "<td>".$row['lastName']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td><a href='updateUser.php?id=".$row['id']."'>Update</a></td>";
        echo "<td><a onclick='return confirmDelete()' href='deleteUser.php?id=".$row['id']."'>Delete</a></td>";
        echo "</tr>";
    }
}

function showProduct() {
    $conn = dbConnect();
    $sql = "SELECT * FROM device";
    
    if($_GET['search'] != "") {
        $sql = $sql . " WHERE deviceName LIKE '%" . $_GET['search'] . "%'";
    }
    
    if($_GET['sortBy'] == 'name') {
        $sql = $sql . " ORDER BY deviceName";
    } else if($_GET['sortBy'] == 'type') {
        $sql = $sql . " ORDER BY deviceType";
    } else if($_GET['sortBy'] == 'price') {
        $sql = $sql . " ORDER BY price";
    }
    
    if($_GET['sort'] == "Ascending") {
        $sql = $sql . " ASC";
    } else if($_GET['sort'] == "Descending") {
        $sql = $sql . " DESC";
    }
    // echo $sql;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['deviceName']."</td>";
        echo "<td>".$row['deviceType']."</td>";
        echo "<td>".$row['price']."</td>";
        echo "</tr>";
    }
}

function departments($id) {
    $conn = dbConnect();
    $sql = "SELECT * FROM departments ORDER BY name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $userInfo;
    echo $id;
    if($id != 0) {
        global $userInfo;
        echo $id;
        $sql = "SELECT deptId FROM user WHERE id=".$id;
        $stmt2 = $conn->prepare($sql);
        $stmt2->execute();
        $userInfo = $stmt2->fetch(PDO::FETCH_ASSOC);
    }
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($id != 0) {
            $userDeptId = ($userInfo['deptId'] == $row['id'])?"selected" : "";
            echo "<option value=" .$row['id']. " " .$userDeptId. "> " .$row['name']. "</option>";
        } else {
            echo "<option value=" .$row['id']. "> " .$row['name']. "</option>";
        }
    }
}

function getUserInfo($id){
    $conn = dbConnect();
    $sql = "SELECT * FROM user WHERE id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function deleteUser($id) {
    $conn = dbConnect();
    $sql = "DELETE FROM user
            WHERE id=".$id;
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function validateLogin() {
    $username = $_POST['username'];
    
    $conn = dbConnect(); 

    $sql = "SELECT * from admin WHERE userName = '$username'"; 
     
    $stmt = $conn->prepare($sql); 
    
    $stmt->execute(); 
    $records = $stmt->fetch(); 
    echo json_encode($records); 
}

function showUserCount() {
    $conn = dbConnect();
    $sql = "SELECT count(*) FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
}

function showAveragePrice() {
    $conn = dbConnect();
    $sql = "SELECT AVG(price) FROM device";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
}

function showAdminCount() {
    $conn = dbConnect();
    $sql = "SELECT count(*) FROM admin";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
}

if($_POST['action'] == 'validateLogin') {
    validateLogin();
}

?>