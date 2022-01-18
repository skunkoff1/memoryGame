<?php

error_reporting(E_ALL);
require('./ressources/php/connect.php');

if (isset($_POST['pseudo']) && isset($_POST['score']) && isset($_POST['level'])) {
    $pseudo = $_POST['pseudo'];
    $score = $_POST['score'];
    $level = $_POST['level'];

    if ($level == 'impossible') {
        $req = $db->prepare('INSERT INTO impossible(pseudo, score) VALUES(?, ?)');
        $req->execute(array($pseudo, $score));
        header('location: index.php?impossibleok');
    }
    if ($level == 'easy') {
        $req = $db->prepare('INSERT INTO easy(pseudo, score) VALUES(?, ?)');
        $req->execute(array($pseudo, $score));
        header('location: index.php?impossibleok');
    }
    if ($level == 'medium') {
        $req = $db->prepare('INSERT INTO medium(pseudo, score) VALUES(?, ?)');
        $req->execute(array($pseudo, $score));
        header('location: index.php?impossibleok');
    }
    if ($level == 'hard') {
        $req = $db->prepare('INSERT INTO hard(pseudo, score) VALUES(?, ?)');
        $req->execute(array($pseudo, $score));
        header('location: index.php?impossibleok');
    }
}

$impossibleTab = $db->prepare('SELECT pseudo,score FROM impossible ORDER BY score LIMIT 10');
$impossibleTab->execute(array());

$easyTab = $db->prepare('SELECT pseudo,score FROM easy ORDER BY score LIMIT 10');
$easyTab->execute(array());

$mediumTab = $db->prepare('SELECT pseudo,score FROM medium ORDER BY score LIMIT 10');
$mediumTab->execute(array());

$hardTab = $db->prepare('SELECT pseudo,score FROM hard ORDER BY score LIMIT 10');
$hardTab->execute(array());



?>

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
                <div id="clockDiv">
                    <p id="clock">00.00</p>
                </div>
                <div class="button" onclick="initGame('easy')">Easy</div>
                <div class="button" onclick="initGame('medium')">Medium</div>
                <div class="button" onclick="initGame('hard')">Hard</div>
                <div class="button" onclick="initGame('impossible')">Impossible</div>
            </div>
        </header>
        <div id="gameContainer">

        </div>

        <div id="timerDiv">
            <div id="timer"></div>
        </div>
        <div id="hiscore">
            <div class="scorebox">
                <div id="scoreDiv">
                    <h1>Easy</h1>
                    <?php
                    while ($data = $easyTab->fetch()) {
                        echo '<div class="scoreLine"><p>' . $data['pseudo'] . '</p><p>' . $data['score'] . '</p></div> ';
                    }

                    ?>
                </div>
                <div id="scoreSep">

                </div>
            </div>
            <div class="scorebox">
                <div id="scoreDiv">
                    <h1>Medium</h1>
                    <?php
                    while ($data = $mediumTab->fetch()) {
                        echo '<div class="scoreLine"><p>' . $data['pseudo'] . '</p><p>' . $data['score'] . '</p></div> ';
                    }

                    ?>
                </div>
                <div id="scoreSep">

                </div>
            </div>
            <div class="scorebox">
                <div id="scoreDiv">
                    <h1>Hard</h1>
                    <?php
                    while ($data = $hardTab->fetch()) {
                        echo '<div class="scoreLine"><p>' . $data['pseudo'] . '</p><p>' . $data['score'] . '</p></div> ';
                    }

                    ?>
                </div>
                <div id="scoreSep">

                </div>
            </div>
            <div class="scorebox">
                <div id="scoreDiv">
                    <h1>Impossible</h1>
                    <?php
                    while ($data = $impossibleTab->fetch()) {
                        echo '<div class="scoreLine"><p>' . $data['pseudo'] . '</p><p>' . $data['score'] . '</p></div> ';
                    }

                    ?>
                </div>
            </div>

        </div>



        <div id="winDiv">
            <h1 id="win">Bravo, vous avez gagné</h1>
            <form method="post" action="index.php">
                <input type="text" name="pseudo" placeholder="entrez votre nom" required>
                <p id="score">Votre score : </p>
                <button type="submit" id="restartButton">
                    soumettre
                </button>
                <input type="text" name="score" id="scoreInput" required>
                <input type="text" name="level" id="levelInput" required>

            </form>


        </div>
        <div id="loseDiv">
            <h1 id="lose">Désolé, vous avez perdu</h1>
            <div type="button" id="restartButton2">
                <p>relancer le jeu</p>
            </div>
        </div>
    </div>
    <script src="./ressources/js/script.js"></script>
</body>

</html>