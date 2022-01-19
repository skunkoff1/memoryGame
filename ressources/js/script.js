let gameContainer = document.getElementById("gameContainer");
let tileChecked = '';
let isChecked = false;
let pairFind = 0;
let win = 0;
let tempTile = null;
let inGame = false;
let count = 0;
let clock;
let barTimer;
let timerDiv = document.getElementById("timer");
let width = 1200;
let level = '';


function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

function initGame(difficulty) {
    if (inGame === false) {
        inGame = true;
        let gameArray = [];
        if (difficulty === 'easy') {
            for (let i = 0; i < 8; i++) {
                gameArray.push(i);
                gameArray.push(i);
                level = 'easy';
            }
        } else if (difficulty === 'medium') {
            for (let i = 0; i < 12; i++) {
                gameArray.push(i);
                gameArray.push(i);
                level = 'medium';
            }
        } else if (difficulty === 'hard') {
            for (let i = 0; i < 16; i++) {
                gameArray.push(i);
                gameArray.push(i);
                level = 'hard';
            }
        } else if (difficulty === 'impossible') {
            for (let i = 0; i < 1; i++) {
                gameArray.push(i);
                gameArray.push(i);
                level = 'impossible';
            }
        }
        if (difficulty === 'hard') {
            timer(120);
            count = 119.99;
            let displayClock = document.getElementById('clock');
            displayClock.innerHTML = "120.00";
        } else {
            timer(60);
            count = 59.99;
            let displayClock = document.getElementById('clock');
            displayClock.innerHTML = "60.00";
        }
        shuffleArray(gameArray);
        displayGame(gameArray);
        win = gameArray.length / 2;
    }

}

function displayGame(array) {
    for (let i = 0; i < array.length; i++) {
        let tile = document.createElement('img');
        tile.src = "./ressources/images/tile" + array[i] + ".png";
        gameContainer.appendChild(tile);
        tile.style.filter = "brightness(0)";
        tile.addEventListener('click', () => {
            check(tile, array[i]);
        })
    }
}

function check(tile, value) {
    if (isChecked === false) {
        isChecked = true;
        tile.style.filter = "brightness(1)";
        tileChecked = value;
        tempTile = tile;
    } else if (isChecked === true && tempTile != null) {
        tile.style.filter = "brightness(1)";
        if (value === tileChecked) {
            isChecked = false;
            pairFind++;
            tempTile = null;
            if (pairFind === win) {
                clearInterval(clock);
                clearInterval(barTimer);
                let div = document.getElementById('winDiv');
                div.style.display = "block";
                let score = document.getElementById('score');
                let postScore = document.getElementById('scoreInput');
                if (level == "hard") {
                    postScore.value = (120 - count).toFixed(2) + "s";
                } else {
                    postScore.value = (60 - count).toFixed(2) + "s";
                }
                let postLevel = document.getElementById('levelInput');
                postLevel.value = level;
                score.innerHTML += postScore.value + "s";
            }
        } else {
            let temp = tempTile;
            tempTile = null;
            setTimeout(() => {
                tile.style.filter = "brightness(0)";
                temp.style.filter = "brightness(0)";
                tempTile = null;
                isChecked = false;
            }, 1000);
        }
    }

}

function timer(time) {
    clock = setInterval(myClock, 10);
    barTimer = setInterval(barTime, time);
}

function myClock() {
    let displayClock = document.getElementById('clock');
    displayClock.innerHTML = count.toFixed(2);
    count -= 0.01;
}

function barTime() {
    width -= 1.2;
    timerDiv.style.width = width + "px";
    checkTime(width);
}

function checkTime(width) {
    if (width < 1) {
        let div = document.getElementById('loseDiv');
        div.style.display = "block";
        let displayClock = document.getElementById('clock');
        displayClock.innerHTML = "0s";
        clearInterval(clock);
        clearInterval(barTimer);
        inGame = false;
        let restart = document.getElementById('restartButton2');
        restart.addEventListener('click', () => {
            window.location.reload();
        })
    }
}

function restarGame() {
    inGame = false;
}