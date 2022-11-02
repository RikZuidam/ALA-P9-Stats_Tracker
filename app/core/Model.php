<?php

class Model
{
	protected static $_connection = null;

	public function __construct()
	{
            if(self::$_connection == null) {
                // Database connection using PDO
                $host = "127.0.0.1";
                $dbname = "realisatie2";
                $user = "rik";
                $password = "rootroot";

                self::$_connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
            }
	}
}

?>