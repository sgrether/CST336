var rolls = [];

function roll(die) {
    $("#result").empty();
    // console.log(die);
    var temp = Math.floor(Math.random() * (die) + 1);
    // console.log(temp);
    $("#result").append(temp);
    rolls.push(temp);
}

$("#historyButton").on("click", function() {
    // console.log(rolls);
    $("#result").empty();
    for(var i = 0; i < rolls.length; i++) {
        if(i != 0) $("#result").append(", ");
        $("#result").append(rolls[i]);
    }
});

$("#clearHistory").on("click", function() {
    while (rolls.length > 0) {
        rolls.pop();
    }
    $("#result").empty();
});