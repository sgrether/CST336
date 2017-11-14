<?php

function dbConnect() {
    $host = 'us-cdbr-iron-east-05.cleardb.net';
    $dbname = 'heroku_1dc696fd55314f5';
    $username = 'b926203f77ae12';
    $password = '216f3b0b';
    // mysql --host=us-cdbr-iron-east-05.cleardb.net  --user=b926203f77ae12  --password=216f3b0b heroku_1dc696fd55314f5
    // return new mysqli($host, $username, $password, $dbname);
    return new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
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

?>