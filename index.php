<?php
spl_autoload_register(function ($className) {

    $path = str_replace('\\', '/', $className);
    $path = 'Class/' . $path . '.php';
    if (file_exists($path)) {
        require($path);
    } else {
        $view = 'Class/view/404.php';
        include($view);
    }
});
if (isset($_GET['page'])) {
    $class = $_GET['page'];
    $class = strtolower($class);
    $class = ucfirst($class);
    $class .= 'Controller';
    $class = '\Controller\\' . $class;

    if (class_exists($class)) {
        $classObject = new $class;
        if (!isset($_GET['action'])) {
            $index = 'actionIndex';
            $classObject->$index();
        } else {
            $action = $_GET['action'];
            $action = strtolower($action);
            $action = ucfirst($action);
            $action = 'action' . $action;

            if (method_exists($classObject, $action)) {
                $classObject->$action();

            } else {
                $view = 'Class/view/404.php';
                include($view);
            }
        }
    }
}