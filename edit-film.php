<?php
    require_once './connect.php';
    $req = $db->query("SELECT id_realisateur, `name` FROM `realisateur`");
    $idSe = (isset($_GET['id'])) ? $_GET['id'] : '';
    if(isset($_GET['id'])){
        $idFilm = $_GET['id'];
        $sel = $db->prepare("SELECT `id_film`, films.title, realisateur.name, films.id_realisateur, `date_real` FROM `films` INNER JOIN `realisateur` ON films.id_film = :idFilm");
        $sel->bindParam('idFilm', $idFilm, PDO::PARAM_INT);
        $sel->execute();
        $data = $sel->fetch(PDO::FETCH_ASSOC);
    }
    if($_GET['id'] == '' && isset($_GET['submit'])  ){
        $title = $_GET['title'];
        $nameReal = $_GET['real'];
        $date = $_GET['date'];
        $don = $db->prepare("INSERT INTO `films`(`title`, `id_realisateur`, `date_real`) VALUES (:title, :nameReal, :dates)");
        $don->bindParam('title', $title, PDO::PARAM_STR);
        $don->bindParam('nameReal', $nameReal, PDO::PARAM_INT);
        $don->bindParam('dates', $date, PDO::PARAM_STR);
        $don->execute();
    }
    if(isset($_GET['submit']) && $_GET['id'] == $idSe){
        $title = $_GET['title'];
        $nameReal = $_GET['real'];
        $date = $_GET['date'];
        $upd = $db->prepare("UPDATE `films` SET `title`= :title,`id_realisateur`= :nameReal,`date_real`= :dates WHERE `id_film`= :idF");
        $upd->bindParam('idF', $idFilm, PDO::PARAM_INT);
        $upd->bindParam('title', $title, PDO::PARAM_STR);
        $upd->bindParam('nameReal', $nameReal, PDO::PARAM_INT);
        $upd->bindParam('dates', $date, PDO::PARAM_STR);
        $upd->execute();
    }

    $titleSe = (isset($data['title'])) ? $data['title'] : '';
    $dateSe = (isset($data['date_real'])) ? $data['date_real'] : '';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="GET">
        <input type="hidden" name="id" value="<?= $idSe ?>">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="<?= $titleSe ?>">
        <br>

        <label for="date_rea">date de réalisation</label>
        <input type="date" name="date" id="date_rea" value="<?= $dateSe ?>">
        <br>
        <label for="real">Realisateur</label>
        <select name="real" id="real">
<?php
    while($rea = $req->fetch(PDO::FETCH_ASSOC)){
?>
            <option value="<?= $rea['id_realisateur'] ?>"><?= $rea['name'] ?></option>
<?php } ?>
        </select>
        <br>
        <input type="submit" name="submit" value="envoyer">
    </form>
</body>
</html>