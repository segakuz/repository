<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    
    <h1>Библиотека</h1>
    
    <form action="search" method="POST" class="auth_page">
        <fieldset>
            <legend>Искать книгу по названию</legend>

            <label for="book_title">Введите название</label>
            <input type="text" name="book_title" id="book_title">

            <input type="submit" name="title_submit" value="Найти">
        </fieldset>
        
        <fieldset>
            <legend>Искать книгу автору</legend>

            <label for="book_author">Введите автора</label>
            <input type="text" name="book_author" id="book_author">

            <input type="submit" name="author_submit" value="Найти">
        </fieldset>
        
        <fieldset>
            <legend>Искать книгу по тематике</legend>

            <label for="book_theme">Введите тематику</label>
            <input type="text" name="book_theme" id="book_theme">

            <input type="submit" name="theme_submit" value="Найти">
        </fieldset>
        
        <fieldset>
            <legend>Искать книгу по издательству</legend>

            <label for="book_publisher">Введите название издательства</label>
            <input type="text" name="book_publisher" id="book_publisher">

            <input type="submit" name="publisher_submit" value="Найти">
        </fieldset>
        
        <fieldset>
            <legend>Искать книгу по полке</legend>

            <label for="book_shelf">Введите название полки</label>
            <input type="text" name="book_shelf" id="book_shelf">

            <input type="submit" name="shelf_submit" value="Найти">
        </fieldset>
    </form>
    
    
    
    
</body>
</html>