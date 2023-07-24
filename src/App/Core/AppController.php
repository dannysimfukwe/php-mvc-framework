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
        $this->class =  new $class();
        $this->action = $action;
        $this->params = $params;
    }

    public function fire() {
        return $this->class->{$this->action}($this->params);
    }
}