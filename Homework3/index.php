<?php
session_start();
$replies = array("Fantastic!", "Absolutely!", "Wonderful!", "And How!");
if(!isset($_GET['question'])) {
    $_GET['question'] = "";
}
if(!isset($_GET['starter'])) {
    $_GET['starter'] = "";
}
if(!isset($_GET['day'])) {
    $_GET['day'] = "";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>HW3</title>
        <style>@import url(styles.css);</style>
    </head>
    
    <body>
        <header>
            Hey Check This Out!
        </header>
        <br><br>
            
        <form>
            <div id='question'>
            Ask Me A Question or Something!<br>
            <input type="text" placeholder="Question" name="question">
            <input type="submit" value="Ask Away"><br>
            </div>
            
            <div class="response">
            <?php
            if($_GET['question'] != '') {
                $num = rand(0, sizeof($replies)-1);
                echo $replies[$num];
            }
            ?>
            </div>
            
            <div id='starter'>
            <br>
            What's Your Favorite Starter?<br>
            <input type="radio" id="charmander" name="starter" value="Charmander">
            <label for="Charmander"></label><label for="charmander">Charmander</label><br>
            <input type="radio" id="squirtle" name="starter" value="Squirtle">
            <label for="Squirtle"></label><label for="squirtle">Squirtle</label><br>
            <input type="radio" id="bulbasaur" name="starter" value="Bulbasaur">
            <label for="Bulbasaur"></label><label for="bulbasaur">Bulbasaur</label><br>
            </div>
            
            <div class="response">
                <?php
                if($_GET['starter'] != '') {
                    $choice = $_GET['starter'];
                }
                if($choice == "Bulbasaur") {
                    echo "Im Sorry.";
                } else if($choice == "Charmander") {
                    echo "Radical!";
                } else if($choice == "Squirtle") {
                    echo "Cool!";
                }
                ?>
            </div>
            
            <div id='day'>
            <br>
            How's Your Day!<br>
            <input type="checkbox" name="day" value="Great!">Great!<br>
            <input type="checkbox" name="day" value="Amazing!">Amazing!<br>
            <input type="checkbox" name="day" value="Fantastic!">Fantastic!<br>
            </div>
            
            <div class="response">
                <?php
                if($_GET['day'] != '') {
                    echo "Outstanding!";
                }
                ?>
            </div>
        </form>
    </body>
</html>