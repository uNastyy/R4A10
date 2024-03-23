<?php
class BD
{
    private static $_instance = null;
    private $linkpdo;

    public function __construct()
    {
        $this->linkpdo = new PDO(
            "mysql:host=localhost;dbname=projetr4a10;charset=utf8",
            "root",
            ""
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