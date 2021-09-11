<?php
require_once 'app/include/connect_db.php';
require_once 'app/include/functions.php';

if ($_POST["pass"] != 123){
    header("Location: done.php?err_code=wrong_pass");
    exit(0);
}

$cnt_town = 0; $cnt_maf = 0; $cnt_don = 0; $cnt_sher = 0; $best = 0;
for ($i = 1; $i <= 10; $i++){
    $kek = $_POST["role$i"];
    if ($kek == 'town'){
        $cnt_town++;
    } elseif ($kek == 'mafia') {
        $cnt_maf++;
    } elseif ($kek == 'don'){
        $cnt_don++;
    } else {
        $cnt_sher++;
    }
    
    $kek1 = $_POST["best$i"];
    if ($kek1 != 1){
        $best++;
        if ($kek == 'mafia' || $kek == 'don'){
            header("Location: done.php?err_code=bestmaf");
            exit(0);
        }
    }
    
    if ($_POST["player$i"] == "-"){
        header("Location: done.php?err_code=choose");
        exit(0);
    }
}

//echo $cnt_town.' '.$cnt_maf.' '.$cnt_don.' '.$cnt_sher.' '.$best."<br>";

if ($cnt_don != 1){
    //echo 'kek1';
    header("Location: done.php?err_code=don");
    exit(0);
}
if($cnt_sher != 1){
    //echo 'kek2';
    header("Location: done.php?err_code=sher");
    exit(0);
}
if ($cnt_maf != 2){
    header("Location: done.php?err_code=maf");
    exit(0);
}
if ($best > 1){
    header("Location: done.php?err_code=best");
    exit(0);
}

$max_id = get_count_of_games();

for ($i = 1; $i <= 10; $i++){
    $name_now = mysqli_real_escape_string($link, $_POST["player$i"]);
    $win_now = 0;
    $best_now = $_POST["best$i"];
    $role_now = $_POST["role$i"];
    if ((($_POST["winner"] == "0" && ($role_now == 'town' || $role_now == 'sheriff'))) || ($_POST["winner"] == "1" && ($role_now == 'mafia' || $role_now == 'don'))){
        $win_now = 1;
    }
    
    recalc_mmr($name_now, $role_now, $win_now, $best_now);
    
    $sql = "INSERT INTO `log`(`game_id`, `name`, `role`, `win`, `best`) VALUES ($max_id,\"$name_now\",\"$role_now\",$win_now,$best_now)";
    //echo $sql.'<br>';
    $result = mysqli_query($link, $sql);
    
    if (!$result){
        header("Location: done.php?err_code=bad");
        exit(0);
    }
}

header("Location: done.php");