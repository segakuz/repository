<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./asset/css/style.css">
</head>
<body>
    <table class="books_table">
        
<?php

    foreach($data as $key=>$value) {
        echo '<tr>';
        foreach($value as $k=>$v) {
            echo '<th>' . $k . '</th>';
        }
        break;
        echo '</tr>';
    }    
  
    foreach($data as $key=>$value) {
        echo '<tr>';
        foreach($value as $v) {
            echo '<td>' . $v . '</td>';
        }
        echo '</tr>';
    }
?>

    </table>
    <br>
    <a href="index">Главная</a>
</body>
</html>

