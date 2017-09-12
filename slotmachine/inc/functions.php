<?php

function displaySymbol($randNum, $pos) {
    switch($randNum) {
        case 0: $symbol = "seven";
                break;
        case 1: $symbol = "cherry";
                break;
        case 2: $symbol = "lemon";
                break;
        case 3: $symbol = "anime";
    }
    echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='", ucfirst($symbol), "'width='70' />";
}
    
function displayPoints($randNum1, $randNum2, $randNum3) {
    echo "<div id='output'>";
    if ($randNum1 == $randNum2 && $randNum2 == $randNum3) {
        switch ($randNum1) {
            case 0: $totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    playSound();
                    break;
            case 1: $totalPoints = 500;
                    break;
            case 2: $totalPoints = 250;
                    break;
            case 3: $totalPoints = 90001;
                    break;
        }
        echo "<h2>You won $totalPoints points!</h2>";
                
    } else {
        echo "<h3>Try Again!</h3>";
    }
    echo "</div>";
}

function play() {
    for($i = 0; $i < 3; $i++) {
        ${"randNum" . $i} = rand(0,3);
        displaySymbol(${"randNum" . $i}, $i);
    }
    displayPoints($randNum0, $randNum1, $randNum2); 
}

function playSound() {
    echo "<audio autoplay> <source src='./img/sound.mp3' type='audio/mpeg'> </audio>";
}

?>