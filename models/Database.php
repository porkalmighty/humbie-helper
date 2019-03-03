<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
class Database 
{
	//Data Source Name
	private static $dsn = "mysql:host=localhost;dbname=HumbieHelper";
	private static $username = "root";
	private static $password = "root";
	private static $errMsg;

	//Database Handler
	private static $dbh;

	//private constructor
	private function __construct() 
	{	
	}
	
	public static function getDatabase() 
	{	
		if(!isset(self::$dbh))
		{
			$options = 
			[  
				PDO::ATTR_PERSISTENT => true,  
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  
			];
			try 
			{
			//DBH: Database Handle
				self::$dbh = new PDO(self::$dsn, self::$username, self:: $password, $options);
			}
			catch(PDOException $e)
			{
				self::$errMsg = $e->getMessage();
				exit();
			}
		}
		return self::$dbh;
	}
}
?>