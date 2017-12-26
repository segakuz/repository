<?php

/* первый способ 
echo file_get_contents('tmpl/'.$_POST["id"].".txt", FILE_USE_INCLUDE_PATH);
*/
/* второй способ 
$file_src = 'tmpl/'.$_POST['id'].'.txt';
$str = file_get_contents($file_src, FILE_USE_INCLUDE_PATH);
$arr = explode(';', $str);
echo json_encode($arr);
*/

/*Для третьей лабы*/

$file_src = 'tmpl/'.$_POST['id'].'.txt';
$str = file_get_contents($file_src, FILE_USE_INCLUDE_PATH);
$arr = explode(';', $str);
echo json_encode($arr);

?>
