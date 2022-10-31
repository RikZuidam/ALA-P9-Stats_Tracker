<?php

class Model
{
	protected static $_connection = null;

	public function __construct()
	{
            if(self::$_connection == null) {
                // Database connection using PDO
                $host = "localhost";
                $dbname = "realisatie2";
                $user = "root";
                $password = "root";

                self::$_connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
            }
	}
}

?>