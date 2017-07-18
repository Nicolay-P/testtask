<?php

define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','books_library_db');
define('DB_USER','guests');
define('DB_PASS','guests');

class dbConnectClass
{
	public $pdo='';

	function __construct() {
			try{
				
				$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME; 
				$this->pdo = new PDO($connect_str,DB_USER,DB_PASS);				
				$this->pdo->exec('SET NAMES utf8');				
			}
		catch(PDOException $e)
			{
				echo "db Error";
				exit;
			}
		}
}


?>