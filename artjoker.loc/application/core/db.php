<?php

class DB
{
    private static $_instance = null;

	private function __construct () {

       $dsn = "mysql:host=localhost;dbname=artjoker;charset=utf8";

// Параметры задают что в качестве ответа получаем ассоциативный массив
        $opt = array(
            PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

// Проверка корректности подключения
        try { $this->_instance = new PDO($dsn, 'root', '', $opt); }
        catch (PDOException $e) { die('Подключение не удалось: ' . $e->getMessage()); }


//
//        $opt = array(
//            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
//            PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
//            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//        );
//        $this->_instance = new PDO(
//            'mysql:host=' .DB_HOST . ';dbname=' . DB_NAME,
//            DB_USER,
//            DB_PASS,
//            $opt
//        );

    }

	private function __clone () {}
	private function __wakeup () {}

	public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }
//        $db = new self;
//        $sql = 'SELECT * FROM `t_koatuu_tree`';
//        $stmt = $db->query($sql);
//        $row_count = $stmt->rowCount();
//        echo $row_count.' rows selected';
        return new self;
    }
}