<?php

class Controller {
    public function indexAction() {
        //главная
        $v = new View('template.php');
        $v->render($mdl);
    }
    
    public function titleSearchAction() {
        $app = new App();
        $book_title = $app->request->input->get('book_title');
        $mdl = new Model();
        $res = $mdl->getBooksByTitle($book_title);
        $v = new View('result.php');
        $v->render($res);
    }

    
}

















