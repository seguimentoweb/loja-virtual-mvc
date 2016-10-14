<?php
namespace App\Controllers;

use App\Classes\Uri;

class Controller
{
    const NAMESPACE_CONTROLLER = 'App\\Controllers\\';
    const ERROR_CONTROLLER = '\\App\Controllers\\Error\\ErrorController';

    private $uri;

    public function __construct()
    {
        $this->uri = new Uri;
    }

    private function getController()
    {
        if (! $this->uri->emptyUri()) {
            $explodeUri = array_filter(explode('/', $this->uri->getUri()));

            if ($explodeUri[1] === 'admin') {
                return 'Admin\\' . ucfirst($explodeUri[2]) . 'Controller';
            }
            return ucfirst($explodeUri[1]) . 'Controller';
        }

        return ucfirst(DEFAULT_CONTROLLER) . 'Controller';
    }

    public function controller()
    {
        $controller = $this->getController();
        $controllerArr = array_filter(explode('\\', $controller));
        $countController = count($controllerArr);
        try {
            if ($countController > 1 && $controllerArr[0] === 'Admin') {
                if (class_exists(self::NAMESPACE_CONTROLLER . 'Admin\\' . $controllerArr[1])) {
                    return self::NAMESPACE_CONTROLLER . 'Admin\\' . $controllerArr[1];
                }
            } else {
                if (class_exists(self::NAMESPACE_CONTROLLER . 'Site\\' . $controller)) {
                    return self::NAMESPACE_CONTROLLER . 'Site\\' . $controller;
                }
            }
        } catch (\Exception $e) {
            return self::ERROR_CONTROLLER;
        }

    }

    private function getMethod()
    {
        if (! $this->uri->emptyUri()) {
            $explodeUri = array_filter(explode('/', $this->uri->getUri()));

            if ($explodeUri[1] === 'admin') {
                return isset($explodeUri[3]) ? $explodeUri[3] : null;
            }

            return isset($explodeUri[2]) ? $explodeUri[2] : null;
        }
    }

    public function method($object)
    {
        $method = $this->getMethod();
        if (method_exists($object, $method)) {
            return $method;
        }

        return DEFAULT_METHOD;
    }

}