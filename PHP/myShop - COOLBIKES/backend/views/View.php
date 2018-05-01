<?php

define('TEMPLATE_PATH' , '/assets/tpl/');

class View {
    private $template;	
    public  $content;
    
    public function __construct($tmpl) {
    	$this->template = $tmpl;
    }
    
    public function render($data=['data'=>null]) {
    	extract($data);
        ob_start();
        try {
            include( TEMPLATE_PATH.$this->template );
        } catch (Exception $e) {
        	// место где ошибка записывается в логер
            $app = new App();
            $app->logger->log($e->getMessage());
        	//echo "файл не найден";
        }
        $content = ob_get_contents();
        ob_end_clean();
        $this->content = $content; 
        echo $this->content;
        //return $this->content;
    }
    public function getJson() {
    	return json_encode(['content' => $this->content]);
    }
    public function getHTML() {
    	return  $this->content;
    }
}