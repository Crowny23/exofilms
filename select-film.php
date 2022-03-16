<?php
    require_once './connect.php';
    $films = $db->query("SELECT `id_film`, `films`.`title`, `realisateur`.`name`, `date_real` FROM `films` INNER JOIN `realisateur` ON `films`.`id_realisateur` = `realisateur`.`id_realisateur`");

    echo json_encode($films->fetchAll(PDO::FETCH_ASSOC));