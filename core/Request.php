<?php

use Database\DbConnection;
use App\Http\HttpRequest;

class Request
{

    private $path;
    private $action;
    private $matches;
    private $request;

    public function __construct($path, $action)
    {
        $this->request = new HttpRequest();
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function match(string $url)
    {
        $path = preg_replace("#({[\w]+})#", "([^/]+)", $this->path);
        $path = "#^$path$#";

        if (preg_match($path, $url, $matches)) {
            array_shift($matches);
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->getRequest();
        } else {
            $this->postRequest();
        }
    }

    private function getRequest()
    {
        if (is_string($this->action)) {
            $params = explode('@', $this->action);

            $controller =  new $params[0](new DbConnection(DB_HOST, DB_NAME, DB_USER, DB_PASS));
            $method = $params[1];
            return isset($this->matches) ? $controller->$method(implode("", $this->matches)) : $controller->$method();
        } else {
            call_user_func($this->action, $this->matches);
        }
    }

    private function postRequest()
    {
        if (is_string($this->action)) {
            $params = explode('@', $this->action);

            $controller =  new $params[0](new DbConnection(DB_HOST, DB_NAME, DB_USER, DB_PASS));
            $method = $params[1];
            return isset($this->matches) ? $controller->$method($this->request, implode("", $this->matches)) : $controller->$method($this->request);
        } else {
            call_user_func($this->action, $this->matches);
        }
    }
}
