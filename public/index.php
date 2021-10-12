<?php require_once(__DIR__ . '/../src/pdo.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game List</title>
</head>
<body>
    <h1>My games: <?= count($games) ?></h1>
    <div>Best game: <?= $bestGame['title'] ?></div>
    <ul>
        <?php foreach ($games as $game): ?>
        <li>
            <h2><?= $game['title'] ?></h2>
            <img src="<?= $game['picture'] ?>" alt="<?= $game['title'] ?>" width="100" />
            <p><?= $game['description'] ?></p>
            <div><?= $game['rating'] ?>/10</div>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>