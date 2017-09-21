<?php

function rollD4() {
    $temp = rand(1,4);
    echo $temp;
    return $temp;
}

function rollD6() {
    $temp = rand(1,6);
    echo $temp;
    return $temp;
}

function rollD8() {
    $temp = rand(1,8);
    echo $temp;
    return $temp;
}

function rollD10() {
    $temp = rand(1,10);
    echo $temp;
    return $temp;
}

function rollD12() {
    $temp = rand(1,12);
    echo $temp;
    return $temp;
}

function rollD20() {
    $temp = rand(1,20);
    echo $temp;
    return $temp;
}

function printHistory($rolls) {
    $temp = array_reverse($rolls['rolls']);
    for($i = 0; $i < sizeof($temp); $i++) {
        if($i != 0) echo ", ";
        echo $temp[$i];
    }
}

function clearHistory() {
    // $_SESSION['rolls'] = array();
    while (sizeof($_SESSION['rolls']) > 0) {
        array_pop($_SESSION['rolls']);
    }
}

?>