<?php

// require_once('../env.php');
require_once(__DIR__ . '/../env.php');

$pdo = new PDO(DB_DNS, DB_USER, DB_PASSWORD);

$statement = $pdo->query('SELECT * FROM game ORDER By title');
$games = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->query("SELECT * FROM game ORDER BY rating DESC LIMIT 1");
$bestGame = $statement->fetch(PDO::FETCH_ASSOC);
