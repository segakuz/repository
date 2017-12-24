<?php

/*
$date = $_POST["date"];
$arr = explode("-", $date);
$currDate = $arr[2].".".$arr[1].".".$arr[0];
*/

$currDate = date('d.m.Y', strtotime($_POST['date'])); //от Даниила

$header = $_POST["header"];
$desc = $_POST["desc"];
$img = "img/" . $currDate . ".jpg";

// первый способ
//$str = $currDate.";".$header.";".$desc.";img/".$img;



// второй способ
$arr1 = [
    "date" => $currDate, 
    "header" => $header,
    "desc" => $desc,
    "img" => $img
    ];

$str = json_encode($arr1);

$writing = file_put_contents("tmpl/".$currDate.".txt", $str, FILE_USE_INCLUDE_PATH);

if($writing) {
    echo "Успешно записана следующая информация: " . $str . " - в файл: " . "tmpl/".$currDate.".txt<br><a href=\"admin.php\">Вернуться в админку</a>";
} else {
    echo "Что-то пошло не так!";
}
/*
echo "<pre>";
    print_r($currDate.";".$header.";".$desc.";"."img/".$currDate.".jpg");
echo "</pre>";
*/

?>
