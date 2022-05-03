<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once __DIR__ . '/../database/conn.php';

    $data = $_POST;
    $data['updated_at'] = date("Y-m-d H:i:s");

    $sql = "UPDATE `users` SET
            city_id = :city_id,
            name = :name.
            surname = :surname,
            email = :email,
            updated_at = :updated_at
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $executed = $stmt->execute($data);
    
    if($executed){
        $_SESSION['success'] = "User updated successfully";
        header("Location: list.php");
        die();
    }
}  else {
    header("Location: list.php");
    die();

}