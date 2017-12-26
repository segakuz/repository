<?php

/* формат даты вручную
$date = $_POST["date"];
$arr = explode("-", $date);
$currDate = $arr[2].".".$arr[1].".".$arr[0];
*/

// формат даты через функцию, от ДК
$currDate = date('d.m.Y', strtotime($_POST['date']));
$file = 'tmpl/' . $currDate . '.txt'
$header = $_POST['header'];
$desc = $_POST['desc'];
$img = 'img/' . $currDate . '.jpg';

// первый способ, сохраняем строкой
$str = $currDate . ';' . $header . ';' . $desc . ';' . $img;

/*
второй способ, сохраняем в json формате
$arr1 = [
    'date' => $currDate, 
    'header' => $header,
    'desc' => $desc,
    'img' => $img
    ];
$str = json_encode($arr1);
*/

$writing = file_put_contents($file, $str, FILE_USE_INCLUDE_PATH);

if($writing) {
    echo 'Успешно записана следующая информация: ' . $str . ' - в файл: ' . 'tmpl/' . $currDate . '.txt<br><a href="admin.php">Вернуться в админку</a>';
} else {
    echo 'Что-то пошло не так!';
};

/*
echo "<pre>";
    print_r($currDate.";".$header.";".$desc.";"."img/".$currDate.".jpg");
echo "</pre>";
*/

?>
