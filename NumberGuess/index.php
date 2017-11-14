<!DOCTYPE html>
<html>
    <head>
        <title>Guess The Number</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>Guess The Number!</h1>
        <h4>Guess a Number Between 1 and 10!</h4>
        <form>
            <input type="text" name="guess" id="guess" value="Guess a Number"/><br>
            <input type="text" name="guess2" id="guess2" value="Guess a Number"/><br>
            <input type="button" name="submit" id="submit" value="Submit"/>
        </form>
        <div id="guesses">Number of Guesses: 0</div>
        <div id="response"></div>
        <div id="response2"></div><br>
        
        <form>
            <input type="button" name="giveUp" id="giveUp" value="Give Up"/>
            <input type="button" name="reset" id="reset" value="Reset"/>
        </form>
        <br>
        <div id="number"></div>
        <div id="number2"></div>
        <script src="javascript.js"></script>
    </body>
</html>