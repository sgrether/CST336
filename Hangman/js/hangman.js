var selectedWord = "";
var selectedHint = "";
var board = "";
var remainingGuesses = 6;
var alphabet = ['A', 'B',  'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                
var words = [{word: "snake", hint: "It's a reptile"}, 
             {word: "monkey", hint: "It's a mammal"}, 
             {word: "beetle", hint: "It's an insect"}];

function startGame() {
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
}

function initBoard() {
    for(var letter in selectedWord) {
        board += "_";
    }
}

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function updateBoard() {
    $("#word").empty();
    
    for(var letter of board) {
        document.getElementById("word").innerHTML += letter + " ";
    }
    
    $("#word").append("<br>");
    $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
}

function createLetters() {
    for(var letter of alphabet) {
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button");
    }
    
    $(".letter").click(function() {
        checkLetter($(this).attr("id"));
        disableButton($(this));
    });
}

function checkLetter(letter) {
    var position = new Array();
    
    for(var i = 0; i < selectedWord.length; i++) {
        if(letter == selectedWord[i]) {
            position.push(i);
        }
    }
    
    if(position.length > 0) {
        updateWord(position, letter);
        
        if(!board.includes("_")) {
            endGame(true);
        }
    } else {
        remainingGuesses -= 1;
        updateMan();
    }
    
    if(remainingGuesses <= 0) {
        endGame(false);
    }
    
}

function updateWord(position, letter) {
    $("#word").empty();
    
    for(var pos of position) {
        board = replaceAt(board, pos, letter);
    }
    updateBoard();
}

function replaceAt(str, index, value) {
    return str.substr(0, index) + value + str.substr(index + value.length);
}

function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6-remainingGuesses) + ".png");
}

function endGame(win) {
    $("#letters").hide();
    
    if(win) {
        $("#won").show();
    } else {
        $("#lost").show();
    }
}

function disableButton(btn) {
    btn.prop("disabled", true);
}

$("#letterBtn").click(function() {
    var boxVal = $("#letterBtn").val();
    console.log("You pressed the button. " + boxVal);
});

$(".replayBtn").on("click", function() {
    location.reload();
});


window.onload = startGame;