<?php

require_once __DIR__ . '/../const.php';

try {
    $pdo = new PDO(
        "mysql:host=" . HOST . ";dbname=" . DB_NAME,
        USERNAME,
        PASSWORD,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
        );
} catch(PDOException $e){
    echo "Server error!";
    die();
}