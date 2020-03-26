<?php
class Model
{
	public function get_data()
	{
		// todo
	}

    public function get_DB()
    {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
        $opt = array(
            PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $opt);
            return $pdo;
        }
        catch (PDOException $e) { die('Подключение не удалось: ' . $e->getMessage()); }
    }

}