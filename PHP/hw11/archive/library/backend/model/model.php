<?php

class Model {
    public function getBooksByTitle($book_title) {
        $query = "SELECT b.id_books AS id, b.title AS title, a.name AS author, p.name AS publisher, c.name AS category, s.name AS shelf FROM books AS b, author AS a, books_has_author AS bha, shelves AS s, books_has_shelves AS bhs, category AS c, books_has_category AS bhc, publisher AS p, books_has_publisher AS bhp WHERE b.id_books=bha.id_books AND bha.id_author=a.id_author AND b.id_books=bhc.id_books AND bhc.id_category=c.id_category AND b.id_books=bhp.id_books AND bhp.id_publisher=p.id_publisher AND b.id_books=bhs.id_books AND bhs.id_shelves=s.id_shelves AND b.title LIKE '%" . $book_title . "%' ORDER BY id";
        $result = DatabaseHandler::GetAll($query);
        return $result;
    }
    public function getBooksByAuthor($book_author) {
        $query = "SELECT b.id_books AS id, b.title AS title, a.name AS author, p.name AS publisher, c.name AS category, s.name AS shelf FROM books AS b, author AS a, books_has_author AS bha, shelves AS s, books_has_shelves AS bhs, category AS c, books_has_category AS bhc, publisher AS p, books_has_publisher AS bhp WHERE b.id_books=bha.id_books AND bha.id_author=a.id_author AND b.id_books=bhc.id_books AND bhc.id_category=c.id_category AND b.id_books=bhp.id_books AND bhp.id_publisher=p.id_publisher AND b.id_books=bhs.id_books AND bhs.id_shelves=s.id_shelves AND a.name LIKE '%" . $book_author . "%' ORDER BY id";
        $result = DatabaseHandler::GetAll($query);
        return $result;
    }
    
    public function getBooksByTheme($book_theme) {
        $query = "SELECT b.id_books AS id, b.title AS title, a.name AS author, p.name AS publisher, c.name AS category, s.name AS shelf FROM books AS b, author AS a, books_has_author AS bha, shelves AS s, books_has_shelves AS bhs, category AS c, books_has_category AS bhc, publisher AS p, books_has_publisher AS bhp WHERE b.id_books=bha.id_books AND bha.id_author=a.id_author AND b.id_books=bhc.id_books AND bhc.id_category=c.id_category AND b.id_books=bhp.id_books AND bhp.id_publisher=p.id_publisher AND b.id_books=bhs.id_books AND bhs.id_shelves=s.id_shelves AND c.name LIKE '%" . $book_theme . "%' ORDER BY id";
        $result = DatabaseHandler::GetAll($query);
        return $result;
    }
    
    public function getBooksByPublisher($book_publisher) {
        $query = "SELECT b.id_books AS id, b.title AS title, a.name AS author, p.name AS publisher, c.name AS category, s.name AS shelf FROM books AS b, author AS a, books_has_author AS bha, shelves AS s, books_has_shelves AS bhs, category AS c, books_has_category AS bhc, publisher AS p, books_has_publisher AS bhp WHERE b.id_books=bha.id_books AND bha.id_author=a.id_author AND b.id_books=bhc.id_books AND bhc.id_category=c.id_category AND b.id_books=bhp.id_books AND bhp.id_publisher=p.id_publisher AND b.id_books=bhs.id_books AND bhs.id_shelves=s.id_shelves AND p.name LIKE '%" . $book_publisher . "%' ORDER BY id";
        $result = DatabaseHandler::GetAll($query);
        return $result;
    }
    
    public function getBooksByShelf($book_shelf) {
        $query = "SELECT b.id_books AS id, b.title AS title, a.name AS author, p.name AS publisher, c.name AS category, s.name AS shelf FROM books AS b, author AS a, books_has_author AS bha, shelves AS s, books_has_shelves AS bhs, category AS c, books_has_category AS bhc, publisher AS p, books_has_publisher AS bhp WHERE b.id_books=bha.id_books AND bha.id_author=a.id_author AND b.id_books=bhc.id_books AND bhc.id_category=c.id_category AND b.id_books=bhp.id_books AND bhp.id_publisher=p.id_publisher AND b.id_books=bhs.id_books AND bhs.id_shelves=s.id_shelves AND s.name LIKE '%" . $book_shelf . "%' ORDER BY id";
        $result = DatabaseHandler::GetAll($query);
        return $result;
    }
    
}




//SELECT 
//    b.id_books AS id, 
//    b.title AS title, 
//    a.name AS author, 
//    p.name AS publisher,
//    c.name AS category,
//    s.name AS shelf 
//FROM 
//    books AS b, 
//    author AS a, 
//    books_has_author AS bha, 
//    shelves AS s, 
//    books_has_shelves AS bhs, 
//    category AS c, 
//    books_has_category AS bhc, 
//    publisher AS p, 
//    books_has_publisher AS bhp 
//WHERE 
//    b.id_books=bha.id_books 
//    AND bha.id_author=a.id_author 
//    AND b.id_books=bhc.id_books 
//    AND bhc.id_category=c.id_category 
//    AND b.id_books=bhp.id_books 
//    AND bhp.id_publisher=p.id_publisher 
//    AND b.id_books=bhs.id_books 
//    AND bhs.id_shelves=s.id_shelves 
//    AND a.name LIKE '%Фрим%';



















