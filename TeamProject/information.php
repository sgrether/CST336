<?php

    
function getDatabaseConnection() {
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b924c277a48bcc";
    $password = "82e3f446";
    $dbname = "heroku_e0a3be7f701d904";
    
    // connect to our mysql database server
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $conn;
}
          
    
?>

        
            
           
  