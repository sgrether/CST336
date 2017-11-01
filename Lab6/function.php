<?php
session_start();
function dbConnect() {
    $host = 'us-cdbr-iron-east-05.cleardb.net';
    $dbname = 'heroku_1dc696fd55314f5';
    $username = 'b926203f77ae12';
    $password = '216f3b0b';
    // mysql --host=us-cdbr-iron-east-05.cleardb.net  --user=b926203f77ae12  --password=216f3b0b heroku_1dc696fd55314f5
    return new mysqli($host, $username, $password, $dbname);
}

function showUser() {
    $conn = dbConnect();
    $sql = "SELECT firstName, lastName, email FROM user WHERE 1";
    $table = $conn->query($sql);
    while($row = $table->fetch_assoc()) {
        echo $row['firstName']." ".$row['lastName']." ".$row['email']."<br>";
    }
}

function departments() {
    $conn = dbConnect();
    $sql = "SELECT * FROM departments ORDER BY name";
    $table = $conn->query($sql);
    
    while($row = $table->fetch_assoc()) {
        echo "<option value=" .$row['id']. "> " .$row['name']. "</option>";
    }
}
?>