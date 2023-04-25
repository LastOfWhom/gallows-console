<?php
require "picture_life.php";
require_once "fuction.php";

function Logic(){
    $library_arr = ['бутылка','кружка', 'кирпич','земля','самолет',
        'страус','танец','лампа','наушники','телефон',
        'тарелка','дверь','подъезд'];
    $life = 5; // Кол-во попыток в висилице
    $newArr = [];
    $word = $library_arr[array_rand($library_arr)]; // Возвращает слово, а не ключ массива
    $flags = false;
    $flagsRepeat = true;
    $wordArr =  preg_split('/(?<!^)(?!$)/u', $word); // Преобразует слово в массив с Кириллицей
    $wordLenght = iconv_strlen($word); // Учитывает кодировку utf-8



    for ($i = 0; $i < $wordLenght; $i++) {
        $newArr[] = '_';
    }  //Делаем массив с нижними тире. В послдествии будем его отображать

    echo "
   _____
        |
        |
        |
        |
________| \n";

    echo "Введите букву \n";
    printf (implode($newArr) ."\n");
    $userAnswer = readline(""); // Вводим символ


    if(iconv_strlen($userAnswer) > 1 ){
        chekCountLetter($userAnswer);
    }



    chekCorrectKirillitsa($userAnswer);

    for ($i = 0; $i < $life; $i++){ // Счетчик жизней
        for($j = 0; $j < count($wordArr); $j++) { // Запускаем массив со словом
            if ($wordArr[$j] == $userAnswer) {
                $flags = true;
                $newArr[$j] = $wordArr[$j];
            }
        }
        for ($k = 0; $k < count($newArr); $k++) { // Проверяем остались ли неотгаданные буквы
            $chek = true;
           if($newArr[$k] == '_'){
               $chek = false;
               break;
           }
        }
        if($chek == true){
            echo "Вы угадали \n";
            printf (implode($newArr) ."\n");
            questionMakeStartGame(); // Спрашиваем о рестарте игры
        }


        if($flags === false){ // Если не угадали букву то перерисовываем картинку
            picture_life(0);
        }
        if($flags === true){ // Если угадали то оставляем картинку неизменной
            $i--;
            $flags = false;
            picture_life(-1);
        }
        printf (implode($newArr) ."\n");
    echo "Вводи букву ";

    $userAnswer = readline("");
    if(iconv_strlen($userAnswer) > 1 )
        chekCountLetter($userAnswer);
    chekCorrectKirillitsa($userAnswer);


        for ($l = 0; $l < count($newArr); $l++) { // Проверка на повторяющиеся буквы
            if($newArr[$l] == $userAnswer){
                echo "Такая буква есть. Введите новую ";
                $userAnswer = readline("");
                $l = 0;
            }
        }


    }
    picture_life(0);
    echo "Игра окончена ";
    questionMakeStartGame();
}