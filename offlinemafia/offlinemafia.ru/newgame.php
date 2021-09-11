<?php
require 'header.php';
?>

<div class ="container">
<div class ="row">
<div class = "col-9">
    <h1> Добавить новую игру </h1>
    <form action = "addgame.php" method = "POST" id = "kektor">
        <?php
        $sql = "SELECT name FROM `gamers`";
        $res = mysqli_query($link, $sql);
        $arr = mysqli_fetch_all($res);
        $newarr = [];
        foreach($arr as $names){
            $newarr[] = $names;
        }
        sort($newarr);
        
        for($i = 1; $i <= 10; $i++){
            echo "<p>
                <label for = 'player$i' class = 'class1'> Игрок  $i: </label>
                <select name = 'player$i' class = 'select_role'>";
                //<input type = "input" name = "player1" required value= "" class = "player-form" placeholder = "Введите имя игрока">
            echo "<option value = '-'>-</option>";
            foreach ($newarr as $names){
                echo "<option value = '$names[0]'>$names[0]</option>";
            }
            
            echo    "</select>"
            . "<select name = 'role$i' class ='select_role'>
                    <option value = 'town'> Мирный житель </option>
                    <option value = 'mafia'> Мафия </option>
                    <option value = 'sheriff'> Комиссар </option>
                    <option value = 'don'> Дон </option>
                </select>
                <label for ='best$i' class = 'class1'> Лучший ход: </label>
                <select name = 'best$i'; class = 'select_role'>
                    <option value = '1'> - </option>
                    <option value = '2'> Угадана двойка </option>
                    <option value = '3'> Угадана тройка </option>
                </select>
                <br>
            </p>";
        }
        ?>

        <label for ="winner" class ="class1"> Чья победа? </label>
        <input type ="radio" name = "winner" value = "0" checked> Город
        <input type ="radio" name = "winner" value = "1"> Мафия
        <br>
        <input type = "password" placeholder = "Пароль" name = "pass" style = "margin-left: 5px;">
        <br>
        <input type = "submit" value = "Отправить" class = "btn btn-primary" style = "margin-top: 10px;">
    </form>
</div>

<div class="col" align = left>
    <h5 style = "margin-top: 15px"> Добавить игрока в базу </h5>
    <form method="POST" class="kektor" action="addplayer.php">
        <label for ="player1"> Новый игрок: </label>
        <input type = "input" name = "newplayer" required value= "" placeholder = "Введите имя игрока">
        <br>
        <input type = "submit" value = "Отправить" class = "btn btn-primary" style = "margin-top: 10px; margin-left: 0px;">
    </form>
</div>
</div>
</div>
<br>
<?php
require 'footer.php';
?>
