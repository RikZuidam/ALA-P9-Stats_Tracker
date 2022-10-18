<?php

class User extends Model
{
    public $name;

    public function get()
	{
		$sql = "SELECT * FROM item;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'item');
		return $stmt->fetchAll();
	}

    public function create()
	{
		$sql = "INSERT INTO item(name) VALUE(?);";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(array($this->name));
		return $stmt->rowCount();
	}

    public function read($item_id)
	{
		$sql = "SELECT * FROM item WHERE item_id = ?;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(array($item_id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'item');
		return $stmt->fetch();
	}

	public function update($item_id)
	{
		$sql = "UPDATE `item` SET `name` = ? WHERE `item_id` = ?;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(array($this->name, $item_id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'item');
		return $stmt->fetch();
	}
	
	public function delete($item_id)
	{
		$sql = "DELETE FROM `item` WHERE `item_id` = ?;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(array($item_id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'item');
		return $stmt->fetch();
	}
}