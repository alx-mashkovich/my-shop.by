<?php

/**
 * Description of Router
 *
 * @author Алеша
 */
class Router {

    private $routes;

    public function __construct() {
        $routerPath = ROOT . '/config/routes.php';
        $this->routes = include($routerPath);
    }

    /**
     * Return request string
     */
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function Run() {
        // получаем строку запроса
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $externalURI = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $externalURI);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                    ;
                }

                $controllerObject = new $controllerName();

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }
        }
    }

}
