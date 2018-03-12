<?php

class Application
{

    public $params = [];
    public $postData = [];
    private $defaultController = 'Home';
    private $defaultAction = 'index';

    public function __construct()
    {
        $q = filter_input(INPUT_GET, 'q', FILTER_UNSAFE_RAW, FILTER_FLAG_ENCODE_LOW);
        if (strlen($q) === 0) {
            $q = 'Home/index/';
        }
        list($controller, $action, $params) = explode('/', $q, 3);
        $c = strtolower($controller);
        if (!file_exists(APP . "/controllers/{$c}controller.php")) {
            $controller = $this->defaultController;
        }
        $controller .= 'Controller';
        $this->controller = new $controller();
        if (!method_exists($this->controller, $action)) {
            $action = $this->defaultAction;
        }
        $this->params = explode('/', $params);
        $this->postData = $_POST;
        call_user_func_array([$this->controller, $action], $this->params);
    }

}