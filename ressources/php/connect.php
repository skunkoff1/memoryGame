<?php

$host_name = 'db5006349319.hosting-data.io';
$database = 'dbs5287912';
$user_name = 'dbu1635733';
$password = 'Damabiah777!';
$dbh = null;

try {
    $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
}