<?php

require_once __DIR__ . '/../database/conn.php';

$id = $_GET['id'];

$sql = "SELECT `users`.*, `cities`.`name` as city 
        FROM `users` JOIN `cities` ON `users`.`city_id` = `cities`.`id` WHERE `users`.`id` = :id LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

if($stmt->rowCount() == 0) {
    header("Location: list.php");
    die();
}

$user = $stmt->fetch();



?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title></title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 my-4">
                <div class="card">
                    <div class="card-header"><?= $user['name'] . " " . $user['surname'] ?></div>
                    <div class="card-body">
                        <p>from: <?= $user['city'] ?></p>
                        <p>contact me: <?= $user['email'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>