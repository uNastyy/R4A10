<?php
class BD
{
    private static $_instance = null;
    private $linkpdo;

    public function __construct()
    {
        $this->linkpdo = new PDO(
            "mysql:host=mysql-unastyy.alwaysdata.net;dbname=unastyy_chatjs;charset=utf8",
            "unastyy",
            '$iutinfo'
        );
    }

    public static function getInstanceBDD()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new BD();
        }

        return self::$_instance;
    }

    public function getBD()
    {
        return $this->linkpdo;
    }
}