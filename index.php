<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./ressources/css/style.css">
</head>

<body>
    <div id="container">
        <header>
            <div id="title">
                <h1>Jeu de mémoire</h1>
            </div>
            <div id="buttonDiv">
                <div class="button" onclick="initGame('easy')">Easy</div>
                <div class="button" onclick="initGame('medium')">Medium</div>
                <div class="button" onclick="initGame('hard')">Hard</div>
                <div class="button" onclick="initGame('impossible')">Impossible</div>
            </div>
        </header>
        <div id="gameContainer">  
        </div>
    </div>
    <script src="./ressources/js/script.js"></script>
</body>

</html>