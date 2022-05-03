<?php
session_start();

require_once __DIR__ . '/../database/conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM `users` WHERE id = :id";
$stmt = $pdo->prepare($sql);
$executed = $stmt->execute(['id' => $id]);

if($executed) {
    $_SESSION['success'] = "User deleted successfully";

}
header("Location: list.php");
die();