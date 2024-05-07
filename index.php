<?php
// Проверяем, есть ли параметр 'info' в URL
if(isset($_GET['info'])) {
    // Выводим все параметры URL
    echo "Параметры URL: <br>";
    foreach($_GET as $key => $value) {
        echo "Ключ: $key, Значение: $value <br>";
    }
}

// Проверяем, есть ли параметр 'number' в URL
if(isset($_GET['number'])) {
    $number = intval($_GET['number']);
    if($number > 1000) {
        echo "Число не должно быть больше 1000";
    } else {
        // Выводим все простые числа до 'number'
        echo "Простые числа до $number: <br>";
        for($i = 2; $i <= $number; $i++) {
            $isPrime = true;
            for($j = 2; $j * $j <= $i; $j++) {
                if($i % $j == 0) {
                    $isPrime = false;
                    break;
                }
            }
            if($isPrime) {
                echo $i . " ";
            }
        }
    }
}
?>
