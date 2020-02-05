<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {        
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern =>$path) {
            if (preg_match("~$uriPattern~", $uri)) {
                //поиск внутреннего маршрута
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segment = explode('/', $internalRoute);
                array_shift($segment);
        
                //определение controller и action для обработки запроса
                $controllerName = ucfirst(array_shift($segment)) . 'Controller';
                $actionName = 'action' . ucfirst(array_shift($segment));
                $parameters = $segment;
                
                //подключение файла класса-контроллера
                $controllFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllFile)) {
                    include_once($controllFile);
                } else {
                    $controllerName = 'MainpageController';
                    $actionName = 'actionIndex';
                    $controllFile = ROOT . '/controllers/' . $controllerName . '.php';
                    if (file_exists($controllFile)) {
                        include_once($controllFile);
                    }
                }
                //создание объекта, вызов action
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }
            }
        }
    }
}