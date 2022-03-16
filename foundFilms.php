<?php
require_once './connect.php';
    $title = $_POST['title'].'%';
    $films = $db->prepare("SELECT `id_film`, `films`.`title`, `realisateur`.`name`, `date_real` FROM `films` INNER JOIN `realisateur` ON `films`.`id_realisateur` = `realisateur`.`id_realisateur` WHERE `films`.`title` LIKE :title");
    $films->bindParam('title', $title, PDO::PARAM_STR);
    $films->execute();
    echo json_encode($films->fetchAll(PDO::FETCH_ASSOC));
