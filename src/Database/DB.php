<?php
namespace App\Database;

class DB
{
	private static ?\PDO $_instance = null;

    private function __construct()
    {}

	public static function getDb(): \PDO
	{
		if (null === self::$_instance) {
			self::$_instance = new \PDO('mysql:host=localhost;dbname=facebook;charset=utf8', 'admin', 'adminPassword', [
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
				\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
			]);
		}
		return self::$_instance;
	}
}
