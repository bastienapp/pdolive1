<?php

$title = $_POST['title'];
$picture = $_POST['picture'];
$description = $_POST['description'];
$rating = $_POST['rating'];

// TODO: validation des données récupérées

require_once(__DIR__ . '/../env.php');

$pdo = new PDO(DB_DNS, DB_USER, DB_PASSWORD);

$query = "INSERT INTO game (title, picture, description, rating) VALUES(:title, :picture, :description, :rating);";

$statement = $pdo->prepare($query);
$statement->bindValue(':title', $title, PDO::PARAM_STR);
$statement->bindValue(':picture', $picture, PDO::PARAM_STR);
$statement->bindValue(':description', $description, PDO::PARAM_STR);
$statement->bindValue(':rating', $rating, PDO::PARAM_INT);

$row = $statement->execute();

header('Location: /');
