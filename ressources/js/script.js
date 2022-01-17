let gameContainer = document.getElementById("gameContainer");
let tileChecked = '';
let isChecked = 0; 
let pairFind = 0;
let win = 0;
let tempTile = null;       

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

function initGame(difficulty) {
    let gameArray = [];
    if(difficulty === 'easy') {
        for(let i=0; i<8; i++) {
            gameArray.push(i);
            gameArray.push(i);
        }        
        shuffleArray(gameArray);
    }
    else if(difficulty === 'medium') {
        for(let i=0; i<12; i++) {
            gameArray.push(i);
            gameArray.push(i);
        }        
        shuffleArray(gameArray);
    }
    else if(difficulty === 'hard') {        
        for(let i=0; i<18; i++) {
            gameArray.push(i);
            gameArray.push(i);
        }        
        shuffleArray(gameArray);
    }
    displayGame(gameArray);
    win = gameArray.length;    
}

function displayGame(array) {
    for(let i=0; i<array.length; i++) {
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
    if(isChecked === 0) {
        isChecked = 1;
        tile.style.filter = "brightness(1)";
        tileChecked = value;
        tempTile = tile;
    }
    else if(isChecked === 0 && tempTile != null) {
        return;
    }
    else {        
        tile.style.filter = "brightness(1)";
        if(value === tileChecked) {
            isChecked = 0;
            pairFind++;
            if(pairFind === win) {
                alert("vous avez gagné");
            }
        }
        else {
            setTimeout(() => {
                isChecked = 0;
                tile.style.filter = "brightness(0)"; 
                tempTile.style.filter = "brightness(0)"; 
                tempTile= null;
            }, 1500);
        }
    }

    
    
}
