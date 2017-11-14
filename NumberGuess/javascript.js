var randNum1 = Math.floor((Math.random() * 10) + 1);
var randNum2 = Math.floor((Math.random() * 10) + 1);
var numGuesses = 0;

$("#submit").click(function() {
    console.log(randNum1);
    console.log(randNum2);
    numGuesses++;
    
    $("#response").empty();
    $("#response2").empty();
    $("#guesses").empty();
    
    if($("#guess").val() == randNum1) { 
        $("#response").append("Correct");
    }
    if($("#guess2").val() == randNum2) {
        $("#response2").append("Correct"); 
    }
    if($("#guess").val() < randNum1){
        $("#response").append("Number 1 is Higher");
    }
    if($("#guess").val() > randNum1) {
        $("#response").append("Number 1 is Lower");
    }
    
    if($("#guess2").val() < randNum2) {
        $("#response2").append("Number 2 is Higher");
    }
    if($("#guess2").val() > randNum2) {
        $("#response2").append("Number 2 is Lower");
    }
    $("#guesses").append("Number of Guesses: " + numGuesses);
});

$("#giveUp").click(function() {
    $("#number").append("The first number is: " + randNum1);
    $("#number2").append("The second number is: " + randNum2);
});

$("#reset").click(function() {
    location.reload();
})