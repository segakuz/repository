<?php

class Model {
    public function getBooksByTitle($book_title) {
        $query = "SELECT b.id_books AS id, b.title AS name, a.name AS author, c.name AS category, s.name AS shelf, p.name AS publisher FROM books AS b, author AS a, books_has_author AS bha, shelves AS s, books_has_shelves AS bhs, category AS c, books_has_category AS bhc, publisher AS p, books_has_publisher AS bhp WHERE b.id_books=bha.id_books AND bha.id_author=a.id_author AND b.id_books=bhc.id_books AND bhc.id_category=c.id_category AND b.id_books=bhp.id_books AND bhp.id_publisher=p.id_publisher AND b.id_books=bhs.id_books AND bhs.id_shelves=s.id_shelves AND b.title LIKE '%" . $book_title . "%'";
        $result = DatabaseHandler::GetAll($query);
        return $result;
    }
}
























