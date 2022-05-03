<?php

require_once __DIR__ . '/../database/conn.php';

$sqlAllCities = "SELECT *  FROM `cities` WHERE 1";
$stmtAllCities = $pdo->query($sqlAllCities);




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
                <h1>Create</h1>
                <form method="POST" action="./store.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" name="surname" id="surname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="city_id">Select city</label>
                        <select class="form-control" name="city_id" id="city_id" required>
                            <!-- <option value="">Please select option</option> -->
                            <?php
                            while($city = $stmtAllCities->fetch()){ ?>
                                <option value ="<?= $city['id']?>"><?= $city['name'] ?></option>
                        
                       <?php } ?>
                            
                        
                           
                        </select>
                    </div>
                    <button class="btn btn-success my-4" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>