<?php
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AppController extends Controller {
    private $class;
    private $action;
    private $params;

    public function __construct($class,$action,$params){
        if($_ENV['ENV'] == 'production'){
            error_reporting(E_NOTICE);
        }
        if (class_exists($class)) {
            $this->class =  new $class();
        } else{
            exit('Controller "'.$class.'" not found!');
        }
        
        if(is_a($this->class, $class)){
            $this->action = $action;
            $this->params = $params;
        } else {
            exit('Invalid Controller "'.$class.'"');
        }
       
    }

    public function fire() : string {
        if(method_exists($this->class, $this->action)) {
            return $this->class->{$this->action}($this->params);
        } elseif(count($this->params)) {
            View::render('system/404');
            exit();
        } else {
            exit("Invalid method '".$this->action."' in ".get_class($this->class)."!");
        }
    }
}