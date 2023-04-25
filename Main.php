<?php
require "Logic.php";

function makeGame(){
    echo "Вы хотите начать игру? \n";
    echo "y or n \n";
    $userReady = readline("");
    if($userReady == "y"){
        echo "Начинаем игру";
        Logic();
        // Запускается главная логика
    }
}
makeGame();



