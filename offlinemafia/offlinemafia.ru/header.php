<?php
    require_once 'app/include/connect_db.php';
    require_once 'app/include/functions.php';
?>

<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.css" rel="stylesheet">
    <link href="bootstrap-grid.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Offline Mafia AESC MSU</title>
</head>
<body>
    <div id ="logo">
        <a href = "index.php"><h1> Offline Mafia AESC MSU <br></h1></a>
    </div>
    <div id="page">
        <div id = "navigation">
            <ul>
                <li><a href = "games.php">Все игры</a></li>
                <li><a href = "index.php">Рейтинговая таблица</a></li>
                <li><a href = "newgame.php">Добавить игру</a></li>
                <li><a href = "stat.php">Статистика по игрокам</a></li>
                <li><a href = "info.php">Информация</a></li>
            </ul>
        </div>