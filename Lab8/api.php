<?php

function getDatabaseConnection() {
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b926203f77ae12";
    $password = "216f3b0b";
    $dbname = "heroku_1dc696fd55314f5"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

function getUsersThatMatchUserName() {
    $username = $_GET['username']; 
    
    $dbConn = getDatabaseConnection(); 

    $sql = "SELECT * from User WHERE username='$username'"; 
     
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    echo json_encode($records); 
}

if ($_GET['action'] == 'validate-username' ) {
    getUsersThatMatchUserName(); 
}
 

?>
