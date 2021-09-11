<?php
require_once 'header.php';
$kek = $_GET["err_code"];

if (!$kek){
    echo '<p class = "cooltext1">Действие успешно выполнено </p>';
} else {
    echo "<p class = 'cooltext1'>Произошла ошибка. Код ошибки: $kek</p>";
    echo "<p class = 'cooltext1'>";
    if ($kek == 'don'){
        echo "В игре должен быть ровно один дон!";
    } else if ($kek == 'mafia'){
        echo "В игре должно быть ровно две мафии!";
    } else if ($kek == 'sher'){
        echo "В игре должен быть ровно один шериф!";
    } else if ($kek == 'best'){
        echo "Лучший ход может быть не более, чем у одного игрока!";
    } else if ($kek == 'choose'){
        echo "Вы не выбрали игрока!";
    } else if ($kek == 'bestmaf'){
        echo "Лучший ход не может быть у мафии!";
    } else if ($kek == 'wrong_pass'){
        echo "Неверный пароль.";
    } else if ($kek == 'bad' || $kek == 'badp'){
        echo "База данных не вернула ответ на запрос. Сообщите администратору.";
    } else if ($kek == 'alr'){
        echo "Игрок уже в базе данных!";
    }
    else {
        echo "Неизвестная ошибка.";
    }
    echo '</p>';
}

echo '<a href = "/" class = "dontext"><p> Вернуться на главную </p></a>';

require_once 'footer.php';
