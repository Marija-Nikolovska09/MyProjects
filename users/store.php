<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once __DIR__ .'/../database/conn.php';

    $data = $_POST;
    $data['created_at'] = date("Y-m-d H:i:s");
    $data['updated_at'] = date("Y-m-d H:i:s");


    $sql = "INSERT INTO `users`
    (city_id, name, surname, email, created_at, updated_at)
    VALUES (:city_id, :name, :surname, :email, :created_at, :updated_at)";

    $stmt = $pdo->prepare($sql);

    $executed = $stmt->execute($data);

    if($executed){
        $_SESSION['success'] = "User created succesfully";

        header("Location:list.php");
        die();
    }

} else {

    header("Location: list.php");
    die();
}