<?php

$host_name = 'localhost:3306';
$database = 'memory';
$user_name = 'root';
$password = 'mdp';
$dbh = null;

try {
    $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
}