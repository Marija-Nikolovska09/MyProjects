<?php

session_start();

require_once __DIR__ .'/../database/conn.php';

$sqlAllUsers = "SELECT `users`.*, `cities`.`name` as city FROM `users` JOIN `cities` ON `cities`.`id` = `users`.`city_id`";
$stmtAllUsers = $pdo->query($sqlAllUsers);

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
            <div class="col-md-8 offset-md-2 my-4">
              <?php if(isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?=$_SESSION['success']; ?>
                    </div>
              <?php
              }  
              session_destroy();
              ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2 my-4">
                <a href="./create.php" class="btn btn-info">Add new user</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2 my-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Location</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($stmtAllUsers->rowCount() == 0) {  ?>
                            <tr>
                                <td colspan="6">
                                    No users added yet.
                                </td>
                            </tr>
                        <?php } else { 
                            while($user = $stmtAllUsers->fetch()) { ?>
                        <tr>
                            <th scope="row"><?= $user['id'] ?></th>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['surname'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['city'] ?></td>
                            <td>
                                <a href="./show.php?id=<?=$user['id']?>" class="btn btn-dark">View</a>
                                <a href="./edit.php?id=<?=$user['id']?>" class="btn btn-warning">Edit</a>
                                <a href="./delete.php?id=<?=$user['id']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>