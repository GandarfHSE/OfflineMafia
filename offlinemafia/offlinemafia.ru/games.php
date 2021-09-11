<?php
require 'header.php';
$number_of_games = get_count_of_games();
if ($_POST['cntgame'] == 0){
    $_POST['cntgame'] = min($number_of_games, 7);
}
$mxgame = min($number_of_games, $_POST['cntgame']);
$sql = "SELECT name, id FROM `gamers`";
$res = mysqli_query($link, $sql);
$gamers_1 = mysqli_fetch_all($res, 1);
$gamers = [];
foreach ($gamers_1 as $kek){
    $gamers[$kek['name']] = $kek['id'];
}
?>

<div id ="container" >
    <h1 align = 'center'>Последние игры</h1>
    <form action ='games.php' method='POST' align = 'right'>
        <label for = 'cntgame' class = 'text-right'>Выберите количество игр:</label>
        <input type ='text' size ='5' name = 'cntgame' value = <?=$mxgame?>>
    </form>
    <table class ="table table-bordered table-striped">
        <thead class = "thead-dark">
            <th scope="col">#</th>
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
        <?php
        for ($i = 1; $i <= $mxgame; $i++){
            $game_id = $number_of_games - $i;
            $sql = "SELECT * FROM log WHERE game_id = '$game_id'";
            $result = mysqli_query($link, $sql);
            $arr = mysqli_fetch_all($result, 1);
            $azaza = $number_of_games - $i + 1;
            echo '<tr>';
            echo "<th score = 'row'><a href = 'gameinfo.php?id=$azaza' class = 'cooltext'>$azaza</a></th>";
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
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
            

<?php
require 'footer.php';
