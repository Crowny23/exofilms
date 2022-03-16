<?php
require_once './connect.php';
    $title = $_POST['title'].'%';
    $films = $db->prepare("SELECT `id_film`,`title` FROM `films` WHERE `title` LIKE :title");
    $films->bindParam('title', $title, PDO::PARAM_STR);
    $films->execute();
    echo json_encode($films->fetchAll(PDO::FETCH_ASSOC));
