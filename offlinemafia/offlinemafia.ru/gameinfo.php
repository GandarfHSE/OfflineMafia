<?php
require 'header.php';

$game_id = $_GET['id'] - 1;
$sql = "SELECT * FROM `log` WHERE `game_id` = $game_id";
$result = mysqli_query($link, $sql);
$arr = mysqli_fetch_all($result, 1);
?>

<div id ="container" >
    <h1 align = 'center'>Игра № <?=$_GET['id']?></h1>
    <table class ="table table-bordered table-striped">
        <thead class = "thead-dark">
            <th scope="col">Дон</th>
            <th scope="col">Мафия</th>
            <th scope="col">Мафия</th>
            <th scope="col">Шериф</th>
            <th scope="col">Мирный</th>
            <th scope="col">Мирный</th>
            <th scope="col">Мирный</th>
            <th scope="col">Мирный</th>
            <th scope="col">Мирный</th>
            <th scope="col">Мирный</th>
            <th scope ="col">Победа</th>
        </thead>
        <tbody class = "table-stripped">
            <tr>
            <?php
            foreach ($arr as $gamer){
                if ($gamer["role"] == "don"){
                    echo "<td><a href = 'stat.php?id={$gamers[$gamer['name']]}' class = 'dontext'>{$gamer['name']}</a></td>";
                }
            }
            foreach ($arr as $gamer){
                if ($gamer["role"] == "mafia"){
                    echo "<td><a href = 'stat.php?id={$gamers[$gamer['name']]}' class = 'mafiatext'>{$gamer['name']}</a></td>";
                }
            }
            foreach ($arr as $gamer){
                if ($gamer["role"] == "sheriff"){
                    echo "<td><a href = 'stat.php?id={$gamers[$gamer['name']]}' class = 'cooltext'>{$gamer['name']}</a></td>";
                }
            }
            foreach ($arr as $gamer){
                if ($gamer["role"] == "town"){
                    echo "<td><a href = 'stat.php?id={$gamers[$gamer['name']]}' class = 'towntext'>{$gamer['name']}</a></td>";
                }
            }
            if (($arr[0]["win"] == 1 && ($arr[0]["role"] == 'town' || $arr[0]["role"] == 'sheriff')) || ($arr[0]["win"] == 0 && ($arr[0]["role"] == 'mafia' || $arr[0]["role"] == "don"))){
                echo "<td class = 'cooltext'>Город</td>";
            }else {
                echo "<td class = 'dontext'>Мафия</td>";
            }
            ?>
            </tr>
        </tbody>
    </table>
</div>

<?php
require 'footer.php';
?>
