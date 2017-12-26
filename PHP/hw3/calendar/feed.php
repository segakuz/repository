<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Feed</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/forfeed.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <label for="first_date">Выберите дату начала</label>
    <input type="date" name="first_date" id="first_date">

    <label for="second_date">Выберите дату конца</label>
    <input type="date" name="second_date" id="second_date">
    
    <button id="btn">Поиск</button>
    
    <div id="event_list"></div>
</body>

</html>
