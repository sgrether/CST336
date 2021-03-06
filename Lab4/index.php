<?php

    $backgroundImage = "img/sea.jpg";
    if(isset($_GET['keyword'])) {
        include 'api/pixabayAPI.php';
        if($_GET['keyword'] == ""){
            $imageURLs = getImageURLs($_GET['category'], $_GET['layout']);
        } else {
            $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
        }
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Image Carousel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
        @import url(css/styles.css);
        body{
            background-image: url('<?=$backgroundImage ?>');
        }
        </style>
    </head>
    
    <body>
        
        <br>
        <form>
            <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
            <input type="submit" value="Search"/>
            
            <input type="radio" id="lhorizontal" name="layout" value="horizontal">
            <label for="horizontal"></label><label for="lhorizontal">Horizontal</label>
            <input type="radio" id="lvertical" name="layout" value="vertical">
            <label for="vertical"></label><label for="lvertical">Vertical</label>
            
            <select name="category">
                <option value="">Select One</option>
                <option value="ocean">Sea</option>
                <option value="forest">Forest</option>
                <option value="mountain">Mountain</option>
                <option value="snow">Snow</option>
            </select>
        </form>
        
        <br>
        <?php
            if(!isset($imageURLs)) {
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
            } else {
        ?>
        
        <!--Display Carousel Here-->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!--Indicators Here-->
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 7; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ?"class='active'": "";
                        echo "></li>";
                    }
                ?>
            </ol>
            
            <!--Wrapper for Images Here-->
            <div class="carousel-inner" role="listbox">
                <?php
                    for($i = 0; $i < 7; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        } while (!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="item ';
                        echo ($i == 0)?"active": "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
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
            }
        ?>
        <br>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>