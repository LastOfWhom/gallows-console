<?php
function chekCountLetter($userAnswer){
    while(iconv_strlen($userAnswer) != 1){
        echo "Введите только 1 букву \n";
        $userAnswer = readline("");
    }
} // Проверяем чтобы кол-во вводимых символов не было больше 1
function chekCorrectKirillitsa($userAnswer){
    $pattern = '/^[а-яё]+$/iu';
    while(preg_match($pattern, $userAnswer) != true ){
        echo "Введите буквы Кириллицы ";
        $userAnswer = readline("");
    }
} // Проверяем чтобы символы были только кириллицей

function questionMakeStartGame(){
    echo "Играть заново? \n y or n \n";
    $makeRestartGame = readline();
    if($makeRestartGame == 'y'){
        makeGame();
    }
    else
        echo "Не играю";
    exit;
} // Когда закнчили игру