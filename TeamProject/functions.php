<?php
session_start();
include 'information.php';

//used to display electronics 
function displayElectronics($sort) {
    $conn = getDatabaseConnection();
    if($sort == "0") {
        $sql = "SELECT electronicsName FROM electronics";
    } else if($sort == "ascending") {
        $sql = "SELECT electronicsName FROM electronics ORDER BY electronicsName ASC";
    } else if($sort == "descending") {
        $sql = "SELECT electronicsName FROM electronics ORDER BY electronicsName DESC";
    }
                
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
               
    return $records;
}

//used to display anime
function displayAnime($sort) {
    $conn = getDatabaseConnection();
    if($sort == "0") {
        $sql = "SELECT name FROM anime";
    } else if($sort == "ascending") {
        $sql = "SELECT name FROM anime ORDER BY name ASC";
    } else if($sort == "descending") {
        $sql = "SELECT name FROM anime ORDER BY name DESC";
    }
                
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
               
    return $records;
}

//used to display apparel
function displayApparel($sort) {
    $conn = getDatabaseConnection();
    if($sort == "0") {
        $sql = "SELECT apparelName FROM apparrel";
    } else if($sort == "ascending") {
        $sql = "SELECT apparelName FROM apparrel ORDER BY apparelName ASC";
    } else if($sort == "descending") {
        $sql = "SELECT apparelName FROM apparrel ORDER BY apparelName DESC";
    }
          
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
               
    return $records;
}

function displayDetails($name,$type) {
    $conn = getDatabaseConnection();
    if($type=="anime"){
    $sql = 'SELECT name, itemType, priceOfItem, itemStatus from '.$type.' where name Like "%'.$name.'%"';
    }
    else if($type=="electronics"){
        $sql = 'SELECT '.$type.'Name, '.$type.'Type, priceOfElectronics, '.$type.'Status from electronics where electronicsName Like "%'.$name.'%"';
    }
    else if($type=="apparel"){
        $sql = 'SELECT '.$type.'Name, '.$type.'Type, priceOfApparel, '.$type.'Status from apparrel where apparelName Like "%'.$name.'%"';
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
               
    return $records;
}

?>