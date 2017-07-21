<?php

class DatabaseModel
{
    private static $instance;
    protected $dsn = 'mysql:dbname=social;host=127.0.0.1';
    protected $username = "root";
    protected $password = "araqs";

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}