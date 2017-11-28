<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <title>Dice Roller</title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    </head>
    
    <body>
        <header>
            <h1>Dice Roller</h1>
        </header>
        
        <!--Dice Buttons-->
        <form>
            <input type="button" onclick="roll('4')" name="D4" id="D4" value=""/>
            <input type="button" onclick='roll("6")' name="D6" id="D6" value=""/>
            <input type="button" onclick='roll("8")' name="D8" id="D8" value=""/>
            <input type="button" onclick='roll("10")' name="D10" id="D10" value=""/>
            <input type="button" onclick='roll("12")' name="D12" id="D12" value=""/>
            <input type="button" onclick='roll("20")' name="D20" id="D20" value=""/>
        </form>
        
        <!--Printed Result of Button Clicks-->
        <div id="result"></div>
        
        <!---History and Clear Buttons--->
        <form method="post">
            <input type="button" name="History" id="historyButton" value="History"/>
            <input type="button" name="ClearHistory" id="clearHistory" value="ClearHistory"/>
        </form>
         
        <footer>
            <hr2>Author: Scott Grether</hr2>
        </footer>
        
        <script src="javascript.js"></script>
    </body>
    
</html>