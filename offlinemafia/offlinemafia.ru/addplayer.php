<?php

require_once 'app/include/connect_db.php';
require_once 'app/include/functions.php';

$newname = $_POST["newplayer"];
$newname = trim($newname);
$string1 = mysqli_real_escape_string($link, $newname);

if (is_player_in_base($string1)){
    header("Location: done.php?err_code=alr");
    exit(0);
}

$sql = "INSERT INTO `gamers`(`name`, `mmr`, `games_played`) VALUES (\"$string1\", 0, 0)";
$result = mysqli_query($link, $sql);

if (!$result){
    header("Location: done.php?err_code=badp");
    exit(0);
}

header("Location: done.php");