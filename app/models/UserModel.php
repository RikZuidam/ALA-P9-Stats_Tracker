<?php

class UserModel extends Model
{
    public $name;
    public $email;
    public $pwd;
    

    public function get()
	{
		$sql = "SELECT * FROM user WHERE `admin` IS NULL;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
//		return $stmt->fetchAll();
	}
        
    public function getSpecific($input)
    {
        $sql = "SELECT * FROM user WHERE `admin` IS NULL AND (`name` LIKE '%$input%' OR `email` LIKE '%$input%');";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create()
	{
		if(empty($this->name) || empty($this->email) || empty($this->pwd)) { return "Vul alle velden in!"; }
		$sql = "SELECT `email` FROM user WHERE `email` = ?;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(array($this->email));
		if($stmt->rowCount() > 0) { return "E-mailadres bestaat al!"; }

		$hashed_pwd = password_hash($this->pwd, PASSWORD_DEFAULT);

		$sql = "INSERT INTO user(`name`, `email`, `password`) VALUES (?, ?, ?);";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(array($this->name, $this->email, $hashed_pwd));
		return true;
	}
//    public function create2()
//	{
//		$sql = "INSERT INTO user(`name`) VALUES (?);";
//		$stmt = self::$_connection->prepare($sql);
//		$stmt->execute(array($this->name));
//		return true;
//	}

    public function login()
	{
		if(empty($this->email) || empty($this->pwd)) { return "Vul alle velden in!"; }
		$sql = "SELECT `id`, `email`, `password`, `admin` FROM user WHERE `email` = ?;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(array($this->email));
		if($stmt->rowCount() < 1) { return "Gebruiker niet gevonden"; }
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$verify = password_verify($this->pwd, $data[0]["password"]);
		if($verify === false) { return "Ongeldig!"; }
                session_start();
                $_SESSION["id"] = $data[0]["id"];                
                $_SESSION["admin"] = $data[0]["admin"];

		return true;
	}

	public function read($item_id)
	{
		$sql = "SELECT * FROM user WHERE id = ?;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(array($item_id));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function update($item_id)
	{
		$sql = "UPDATE `user` SET `name` = ?, `email` = ? WHERE `id` = ?;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(array($this->name, $this->email, $item_id));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function delete($item_id)
	{
		$sql = "DELETE FROM `user` WHERE `id` = ?;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(array($item_id));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}