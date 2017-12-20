<?php

/* первый способ 
echo file_get_contents('tmpl/'.$_POST["id"].".txt", FILE_USE_INCLUDE_PATH);
*/
/* второй способ */
$str = file_get_contents('./tmpl/19.12.2017.txt', FILE_USE_INCLUDE_PATH);
$arr = explode(";", $str);
echo json_encode($arr);


?>
