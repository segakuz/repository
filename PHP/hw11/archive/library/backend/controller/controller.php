<?php

class Controller {
    public function indexAction() {
        //главная
        $v = new View('template.php');
        $v->render($mdl);
    }
    
    /*public function titleSearchAction() {
        $app = new App();
        $book_title = $app->request->input->get('book_title');
        $mdl = new Model();
        $res = $mdl->getBooksByTitle($book_title);
        $v = new View('result.php');
        $v->render($res);
    }

    public function authorSearchAction() {
        $app = new App();
        $book_author = $app->request->input->get('book_author');
        $mdl = new Model();
        $res = $mdl->getBooksByAuthor($book_author);
        $v = new View('result.php');
        $v->render($res);
    }*/

    public function searchAction() {
        $app = new App();
        $mdl = new Model();
        if($app->request->input->isEx('title_submit')) {
            $book_title = $app->request->input->get('book_title');
            $res = $mdl->getBooksByTitle($book_title);
            
        } elseif($app->request->input->isEx('author_submit')) {
            $book_author = $app->request->input->get('book_author');
            $res = $mdl->getBooksByAuthor($book_author);
            
        } elseif($app->request->input->isEx('theme_submit')) {
            $book_theme = $app->request->input->get('book_theme');
            $res = $mdl->getBooksByTheme($book_theme);
            
        } elseif($app->request->input->isEx('publisher_submit')) {
            $book_publisher = $app->request->input->get('book_publisher');
            $res = $mdl->getBooksByPublisher($book_publisher);
            
        } elseif($app->request->input->isEx('shelf_submit')) {
            $book_shelf = $app->request->input->get('book_shelf');
            $res = $mdl->getBooksByShelf($book_shelf);
            
        }
        $v = new View('result.php');
        $v->render($res);
    }
    
}

















