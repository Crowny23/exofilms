<?php
    $username = 'root';
    try {
        $db = new PDO("mysql:host=localhost;dbname=movies;charset=utf8", $username);
    } catch (PDOException $e) {
        echo 'Erreur de connection' . '<br>' . $e->getMessage();
    }