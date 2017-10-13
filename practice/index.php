<?php
$firstYear = 1900;
$secondYear = 2000;
if(!isset($_GET['startYear'])) {
    $_GET['startYear'] = "1900";
}
if(!isset($_GET['endYear'])) {
    $_GET['endYear'] = "2000";
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title> Chinese Zodiac </title>
    </head>
    
    <body>
        <header>
            Chinese Zodiac
        </header>
        
        <ul style='list-style: none;'>
            <?php
                printer($_GET['startYear'], $_GET['endYear']);
            ?>
        </ul>
        
        <?php
        
            function printer($startYear, $endYear) {
                $zodiacImg = array("rat.png", "ox.png", "tiger.png", "rabbit.png", "dragon.png", "snake.png", "horse.png", "goat.png", "monkey.png", "rooster.png", "dog.png", "pig.png");
                $sum = 0;
                $count = 0;
                for($i = $startYear; $i <= $endYear; $i++) {
                    echo "<li>";
                    echo "$i";
                    //if(($i - 96) % 100 == 0) echo " Friendzone";
                    //if(($i - 69) % 100 == 0) echo " Nice";
                    if($i % 100 == 0) echo " Happy New Century ";
                    if($i == 1776) echo " Independance ";
                    if($count % 4 == 0) echo "<img src='zodiac/", $zodiacImg[$count], "'alt='Zodiac'>";
                    echo "</li>";
                    $sum += $i;
                    $count += 1;
                    if(count($zodiacImg) == $count) $count = 0;
                }
                echo "Sum: $sum";
            }
        
        ?>
        
    </body>
</html>