<?php

$backgroundImage = "img/sea.jpg";
if(isset($_GET['keyword'])) {
    include 'api/pixabayAPI.php';
    $imageURLs = getImageURLs($_GET['keyword']);
    $backgroundImage = $imageURLs[array_rand($imageURLs)];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <style>
        @import url(css/styles.css);
        body{
            background-image: url('<?=$backgroundImage ?>');
        }
        </style>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
    </head>
    <body>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!--Indicators Here-->
            <ol class="carousel-indicators">
                <?php
                for($i = 0; $i < 5; $i++) {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0)?" class='active;": "";
                    echo "></li>";
                }
                ?>
            </ol>
            <!--Wrappers Here-->
            <div class="carousel-inner" role="listbox">
                
                <?php
                    for($i = 0; $i < 5; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        }
                        while (!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="item ';
                        echo ($i == 0)?"active": "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
            <!--Controls Here-->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        <?php
            } else {
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
            }
        ?>
        <form>
            <input type="text" name="keyword" placeholder="Keyword">
            <input type="submit" value="Submit"/>
        </form>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>