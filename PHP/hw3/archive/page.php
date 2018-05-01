<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>my-calendar.ru</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php
    
    function createCal() {
        $this_date = $_GET['dt'];
        $date_arr = explode('.', $this_date);
        $months = [1 => 'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
        echo '<small>' . $this_date . '</small><br>';
        echo '<a href="index.php">Вернуться к календарю</a><br><br>';
        echo '<h1 id="' . $this_date . '">' . $date_arr[0] . ' ' . $months[$date_arr[1]] . '</h1>';
    };
    createCal();
    
?>

        <div id="day-calendar">События календаря</div>
        <!--    <div id="log">Здесь лог</div>-->


</body>

</html>
