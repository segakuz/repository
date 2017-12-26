<?php

/* первый способ 
echo file_get_contents('tmpl/'.$_POST["id"].".txt", FILE_USE_INCLUDE_PATH);
*/
/* второй способ */
$fileSrc = 'tmpl/'.$_POST['id'].'.txt';
$str = file_get_contents($fileSrc, FILE_USE_INCLUDE_PATH);
$arr = explode(';', $str);
echo json_encode($arr);


?>
