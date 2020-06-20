
const button = document.querySelector('#start');
button.addEventListener("click", () => {

    const firstPlayer = document.querySelector('#first');
    const secondPlayer = document.querySelector('#second');
    const firstPlayerName = firstPlayer.value;
    const secondPlayerName = secondPlayer.value;
    let firstScore = 0;
    let secondScore = 0;
    let turnCounter = 1;
    const victoryScore = 30;
    let victor = '';
    let feed = '';
    let roll = 0;

    do {
        roll = parseInt(Math.random() * 6 + 1);
        if (turnCounter % 2 === 1) {
            firstScore += roll;
            feed += `<span>Turn ${turnCounter} Player: ${firstPlayerName} score ${firstScore} - rolled: ${roll}</span><br>`;
            if (firstScore >= victoryScore) {
                victor = firstPlayerName;
                feed += `${firstPlayerName} won!`;
                break;
            }
        } else {
            secondScore += roll;
            feed += `<span>Turn ${turnCounter} Player: ${secondPlayerName} score ${secondScore} - rolled: ${roll}</span><br>`;
            if (secondScore >= victoryScore) {
                victor = secondPlayerName;
                feed += `${secondPlayerName} won!`;
                break;
            }
        }
        turnCounter++;
    } while (true);

    document.querySelector('#result').innerHTML = feed;

});