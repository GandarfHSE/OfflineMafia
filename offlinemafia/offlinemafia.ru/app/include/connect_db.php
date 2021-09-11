<?php

$link = mysqli_connect('localhost', 'l59511_dbuser', ':CYrw6%hi~a$02DN', 'l59511_db');

mysqli_set_charset($link, 'utf8');

if (mysqli_connect_errno()){
    echo 'Ошибка в подключении к базе данных ('.mysqli_connect_errno().'): '.mysqli_connect_error();
    exit();
}
