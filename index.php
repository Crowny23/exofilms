<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
        <label for="titleS">Titre du film</label>
        <input type="text" name="title" id="titleS">
        <div id="sugg"></div>
        <br>
        <input type="button" name="submit" id="search" value="search">

    </form>
    <br>
    <a href="./edit-film.php?id=">ajouter un film</a>
    <ul id="list-film">

    </ul>
    <script src="./main.js"></script>
    <script src="./search.js"></script>
</body>
</html>