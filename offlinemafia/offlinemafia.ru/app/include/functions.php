<?php

function get_count_of_games(){
    global $link;
    
    $sql = "SELECT count(DISTINCT game_id) FROM log";
    $result = mysqli_query($link, $sql);
    $kekek = mysqli_fetch_array($result);
    return $kekek[0];
}

function is_player_in_base($player_name){
    global $link;
    
    $sql = "SELECT count(*) FROM gamers WHERE name = '$player_name'";
    $result = mysqli_query($link, $sql);
    $kekek = mysqli_fetch_array($result);
    return $kekek[0];
}

function recalc_mmr($name, $role, $win, $best, $del = 0){
    global $link;

    $sql = "SELECT mmr FROM gamers WHERE name = '$name'";
    $result = mysqli_query($link, $sql);
    $kekek = mysqli_fetch_array($result);
    $mmr = $kekek[0];
    $sql = "SELECT games_played FROM gamers WHERE name = '$name'";
    $result = mysqli_query($link, $sql);
    $kekek = mysqli_fetch_array($result);
    $games_played = $kekek["games_played"];
    //echo "$name $games_played<br>";
    //echo '<pre>';
    //var_dump($kekek);
    
    $delta = 0;
    if ($role == 'town' || $role == 'mafia'){
        if ($win){
            $delta = 15;
        } else {
            $delta = -10;
        }
    } else {
        if ($win){
            $delta = 20;
        } else {
            $delta = -15;
        }
    }
    
    if ($best == 2){
        $delta += 3;
    } else if ($best == 3) {
        $delta += 5;
    }
    
    if ($del){ 
        $delta *=-1;
        $games_played--;
    } else {
        $games_played++;
    }
    $mmr += $delta;
    //echo "$name $games_played<br>";
    $sql = "UPDATE `gamers` SET `mmr`= $mmr, `games_played`= $games_played WHERE name = '$name'";
    $res = mysqli_query($link, $sql);
    
    if (!$res){
        header("Location: done.php?err_code='mmrupd'");
        exit(0);
    }
}

function mmr_compare($p1, $p2){
    if ($p1["mmr"] == $p2["mmr"] && $p1["games_played"] == $p2["games_played"]){
        return 0;
    }
    if ($p1["mmr"] > $p2["mmr"] || ($p1["mmr"] == $p2["mmr"] && $p1["games_played"] > $p2["games_played"])){
        return -1;
    } else {
        return 1;
    }
}

function div($x, $y, $type = 1){
    if ($y == 0){
        return "-";
    } else {
        if ($type){
            $ans = ($x * 100) / $y;
            $ans = number_format($ans, 1, '.', '');
            $ans .= ' %';
            return $ans;
        } else {
            $ans = $x / $y;
            $ans = number_format($ans, 1, '.', '');
            return $ans;
        }
    }
}

function show($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}