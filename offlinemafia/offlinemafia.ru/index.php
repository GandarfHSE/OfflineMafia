<?php
require 'header.php';
?>

<div id ="container" >
    <h1 align = 'center'>Рейтинговая таблица</h1>
    <form action ='index.php' method='POST' align = 'right'>
        <label for = 'mingame' class = 'text-right'>Выберите минимальное количество игр:</label>
        <input type ='text' size ='5' name = 'mingame' value = <?=$_POST['mingame']?>>
    </form>
    <table class ="table table-bordered table-striped">
        <thead class = "thead-dark">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">MMR</th>
            <th scope="col">Games Played</th>
            <th scope="col">MMR per game</th>
        </thead>
        <tbody class = "table-stripped">
            <?php
            $sql = "SELECT * FROM `gamers`";
            $result = mysqli_query($link, $sql);
            $arr = mysqli_fetch_all($result, 1);
            usort($arr, mmr_compare);
            
            $i = 1;
            foreach ($arr as $gamer){
                $avgmmr = div($gamer['mmr'], $gamer['games_played'], 0);
                if ($gamer['games_played'] >= $_POST['mingame']){
                    echo "<tr>
                    <th score = 'row'>$i</th>
                    <td><a href = 'stat.php?id={$gamer['id']}' class = 'cooltext'>{$gamer['name']}</a></td>
                    <td>{$gamer['mmr']}</td>
                    <td>{$gamer['games_played']}</td>
                    <td>{$avgmmr}</td>
                    </tr>";
                    $i++;
                }
            }   
            ?>
        </tbody>
    </table>
</div>

<?php
require 'footer.php';
