<?php session_start();?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <title>Dice Roller</title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> 
    </head>
    
    <body>
        <header>
            <h1>Dice Roller</h1>
        </header>
        
        <!---Dice Buttons--->
        <form method="post">
            <input type="submit" name="D4" id="D4" value=""/>
            <input type="submit" name="D6" id="D6" value=""/>
            <input type="submit" name="D8" id="D8" value=""/>
            <input type="submit" name="D10" id="D10" value=""/>
            <input type="submit" name="D12" id="D12" value=""/>
            <input type="submit" name="D20" id="D20" value=""/>
        </form>
        
        <!---History and Clear Buttons--->
        <form method="post">
            <input type="submit" name="History" id="history" value="History"/>
            <input type="submit" name="ClearHistory" id="clearHistory" value="ClearHistory"/>
        </form>
        
        <?php
            include 'functions.php';

            // Call each function depending on which button was clicked on
            echo "<div id='result'>";
            if(array_key_exists('D4',$_POST)){
                array_push($_SESSION['rolls'], rollD4());
            } elseif (array_key_exists('D6',$_POST)) {
                array_push($_SESSION['rolls'], rollD6());
            } elseif (array_key_exists('D8',$_POST)) {
                array_push($_SESSION['rolls'], rollD8());
            } elseif (array_key_exists('D10',$_POST)) {
                array_push($_SESSION['rolls'], rollD10());
            } elseif (array_key_exists('D12',$_POST)) {
                array_push($_SESSION['rolls'], rollD12());
            } elseif (array_key_exists('D20',$_POST)) {
                array_push($_SESSION['rolls'], rollD20());
            } elseif (array_key_exists('History',$_POST)) {
                printHistory($_SESSION);
            } elseif (array_key_exists('ClearHistory',$_POST)) {
                clearHistory();
            }
            echo "</div>";
            
        ?>
         
        <footer>
            <hr2>Author: Scott Grether</hr2>
        </footer>
        
    </body>
    
</html>