<?php
class Bootstrap extends Yaf\Bootstrap_Abstract {

    function _initConfig(Yaf\Dispatcher $dispatcher) {

        $config = Yaf\Application::app()->getConfig();
        Yaf\Registry::set("config", $config);
    }

    function _initPlugin($dispatcher) {

    }

    public function _initRoute(Yaf\Dispatcher $dispatcher)
    {
        $router = $dispatcher::getInstance()->getRouter();
        $routes = new Yaf\Config\Ini(APPLICATION_PATH . DS . 'conf' . DS . 'routes.ini', 'routes');
        $router->addConfig($routes->routes);
        unset($routes);
    }

}