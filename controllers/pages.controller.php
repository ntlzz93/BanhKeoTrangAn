<?php

class PagesController extends Controller{
    
    public function index(){
       $this->data['test_content']  = "Here will test";
    }
    public function view(){
        $params = App::getRouter()->getParams();
        
        if(isset($params[0])){
            $alias = strtolower($params[0]);
            $this->data['content']= "here will be a page with '{$alias}' alias";
        }
    }

    public function default_index(){
        
    }
    
    public function admin_index(){
        
    }
    
}

