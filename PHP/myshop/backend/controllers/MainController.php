<?php

class MainController {
    
    public function indexAction() {

        $mdl = 'first page';
        $v = new View('template.php');
        $v->render($mdl);
    }
    
   
}

















