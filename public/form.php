<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php
        $title = $_POST['title'];
        $picture = $_POST['picture'];
        $description = $_POST['description'];
        $rating = $_POST['rating'];

        $errors = [];
        if (empty($title)) {
            $errors[] = "Merci de renseigner le titre du jeu";
        }
        // TODO: validation des données récupérées

        if (empty($errors)) {
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
            die();
        }
    ?>
    <?php endif; ?>
    <ul>
        <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <form method="POST" action="/form.php">
        <label for="title">
            Title: 
            <input id="title" type="text" name="title" required value="<?= $_POST['title']; ?>" />
        </label>
        <br><br>
        <label for="picture">
            Picture: 
            <input id="picture" type="text" name="picture" required value="<?= $_POST['picture']; ?>" />
        </label>
        <br><br>
        <label for="description">
            Description: 
            <textarea id="description" name="description" required><?= $_POST['description']; ?></textarea>
        </label>
        <br><br>
        <label for="rating">
            Rating: 
            <input id="rating" type="number" name="rating" required value="<?= $_POST['rating']; ?>"  />
        </label>
        <br><br>
        <input type="submit" value="Create a game" />
    </form>
</body>
</html>