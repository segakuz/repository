<?php

$date = $_POST["date"];
$arr = explode("-", $date);
$currDate = $arr[2].".".$arr[1].".".$arr[0];

$header = $_POST["header"];
$desc = $_POST["desc"];
$img = $currDate . ".jpg";

$str = $currDate.";".$header.";".$desc.";img/".$img;

$writing = file_put_contents("tmpl/".$currDate.".txt", $str, FILE_USE_INCLUDE_PATH);

if($writing) {
    echo "Успешно записана следующая информация: " . $str . " - в файл: " . "tmpl/".$currDate.".txt";
} else {
    echo "Что-то пошло не так!";
}
/*
echo "<pre>";
    print_r($currDate.";".$header.";".$desc.";"."img/".$currDate.".jpg");
echo "</pre>";
*/

?>
