<?php

if ($_GET['id']){
    require 'header.php';
    $sql = "SELECT * FROM gamers WHERE id = {$_GET['id']}";
    $result = mysqli_query($link, $sql);
    $gamer = mysqli_fetch_assoc($result);
    
    $sql = "SELECT * FROM log WHERE name = '{$gamer['name']}'";
    $result = mysqli_query($link, $sql);
    $stats = mysqli_fetch_all($result, 1);
    
    $won = 0;
    $mafia_all = 0;
    $mafia_won = 0;
    $don_all = 0;
    $don_won = 0;
    $sher_all = 0;
    $sher_won = 0;
    $town_all = 0;
    $town_won = 0;
    $best2 = 0;
    $best3 = 0;
    
    foreach ($stats as $game){
        if ($game['role'] == 'don'){
            if ($game['win'] == 1){
                $don_won++;
                $won++;
            }
            $don_all++;
        } else if ($game['role'] == 'town'){
            if ($game['win'] == 1){
                $town_won++;
                $won++;
            }
            $town_all++;
        } else if ($game['role'] == 'mafia'){
            if ($game['win'] == 1){
                $mafia_won++;
                $won++;
            }
            $mafia_all++;
        } else {
            if ($game['win'] == 1){
                $sher_won++;
                $won++;
            }
            $sher_all++;
        }
        
        if ($game['best']==2){
            $best2++;
        }
        if ($game['best'] == 3){
            $best3++;
        }
    }
    $winrate = div($won, $gamer['games_played']);
    $winrate_town = div($town_won, $town_all);
    $winrate_mafia = div($mafia_won, $mafia_all);
    $winrate_don = div($don_won, $don_all);
    $winrate_sher = div($sher_won, $sher_all);
    $avgmmr = div($gamer['mmr'], $gamer['games_played'], 0);
    echo "<h1> {$gamer['name']} </h1><hr>
        <h3> MMR: {$gamer['mmr']}</h3>
        <h3> Игр сыграно: {$gamer['games_played']} </h3>
        <h3> Винрейт: {$winrate} </h3>
        <h3> MMR per game: $avgmmr</h3><br>";
        
    echo '<ul class = "list-group">'
        . "<li class = 'list-group-item'>Игр за мирного жителя: {$town_all}</li>"
        . "<li class = 'list-group-item list-group-item-secondary'> Винрейт за мирного жителя: $winrate_town</li>"
        . "<li class = 'list-group-item'>Игр за мафию: {$mafia_all}</li>"
        . "<li class = 'list-group-item list-group-item-secondary'> Винрейт за мафию: $winrate_mafia</li>"
        . "<li class = 'list-group-item'>Игр за шерифа: {$sher_all}</li>"
        . "<li class = 'list-group-item list-group-item-secondary'> Винрейт за шерифа: $winrate_sher</li>"
        . "<li class = 'list-group-item'>Игр за дона: {$don_all}</li>"
        . "<li class = 'list-group-item list-group-item-secondary'> Винрейт за дона: $winrate_don</li>"
        . "<li class = 'list-group-item'>Угадано двоек: $best2</li>"
        . "<li class = 'list-group-item list-group-item-secondary'> Угадано троек: $best3</li>"
        . "</ul><h3 align = 'center'>Все игры:</h3>"
        . "<table class ='table table-bordered table-striped'>
        <thead class = 'thead-dark'>
            <th scope='col'>Номер игры</th>
            <th scope='col'>Роль</th>
            <th scope='col'>Результат</th>
            <th scope='col'>Лучший ход</th>
        </thead>
        <tbody class = 'table-stripped'>";
        
    for ($i = $gamer['games_played'] - 1; $i >= 0; $i--){
        $eee = $stats[$i]["game_id"] + 1;
        echo "<tr>";
        echo "<th score = 'row'><a href = 'gameinfo.php?id=$eee' class = 'cooltext'>$eee</a></th>";
        echo "<td>";
        if ($stats[$i]["role"] == 'town'){
            echo '<p class = "towntext">Мирный житель</p>';
        } else if ($stats[$i]["role"] == 'mafia'){
            echo '<p class = "mafiatext">Мафия</p>';
        } else if ($stats[$i]["role"] == 'don'){
            echo '<p class = "dontext">Дон</p>';
        } else {
            echo '<p class = "cooltext">Шериф</p>';
        }
        
        echo "</td><td>";
        if ($stats[$i]["win"] == 1){
            echo '<p class = "cooltext">Победа</p>';
        } else {
            echo '<p class = "dontext">Поражение</p>';
        }
        echo "</td><td>";
        if ($stats[$i]["best"] == 2){
            echo '<p class = "towntext">Угадана двойка</p>';
        } else if ($stats[$i]["best"] == 3){
            echo '<p class = "cooltext">Угадана тройка</p>';
        } else {
            echo '-';
        }
        
        echo "</td></tr>";
    }
        
} else{
   $kekek = rand(2, 21);
   header("Location: stat.php?id=$kekek");
}
?>


<?php
require 'footer.php';
