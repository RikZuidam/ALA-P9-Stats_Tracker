<?php

class TeamModel extends Model
{
    public $id;
    public $name;
    public $players;
    

    public function get()
	{
		$sql = "SELECT * FROM team;";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
        
    public function sendRequest($pid)
    {
        $sql = "SELECT * FROM `user_to_team` WHERE `user.id` = ? AND `state` = ?;";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(array($pid, 0));
        if($stmt->rowCount() > 0) { return false; }
        
        $sql = "INSERT INTO `user_to_team` (`user.id`, `team.id`, `state`) VALUES (?, ?, ?);";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(array($pid, $this->id, 0));
        return true;
    }
    
    public function getRequests()
    {
        $sql = "SELECT user_to_team.`id`, user.`name`, team.`name` FROM user_to_team JOIN `user` ON user_to_team.`user.id` = user.`id` JOIN `team` ON user_to_team.`team.id` = team.`id` WHERE state = ?;";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(array(0));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function info()
    {
        // GET TEAM :
        $sql1 = "SELECT * FROM team WHERE id = ?;";
        $stmt1 = self::$_connection->prepare($sql1);
        $stmt1->execute(array($this->id));
        $data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        // return $data;

        // GET PLAYERS :
        $sql2 = "SELECT team.`name`, user.`name` FROM team JOIN user_to_team ON team.`id` = user_to_team.`team.id` JOIN user ON user_to_team.`user.id` = user.`id` WHERE team.`id` = ?;";
        $stmt2 = self::$_connection->prepare($sql2);
        $stmt2->execute(array($this->id));
        $data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < count($data2); $i++) {
            $this->players[$i] = $data2[$i]['name'];
        }

        // GET GAMES :
        $sql3 = "SELECT game.`id` as gameId, game.`first_team.id` as firstTeam, game.`second_team.id` as secondTeam, team.`id` as teamId, team.`name` as teamName FROM `game` JOIN `team` ON game.`first_team.id` = team.`id` OR game.`second_team.id` = team.`id` WHERE team.`id` = ? OR game.`first_team.id` = ? OR game.`second_team.id` = ?";
        $stmt3 = self::$_connection->prepare($sql3);
        $stmt3->execute(array($this->id, $this->id, $this->id));
        $data3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

        // GET GOALS :
        $sql4 = "SELECT * FROM `goal` WHERE `team.id` = ?;";
        $stmt4 = self::$_connection->prepare($sql4);
        $stmt4->execute(array($this->id));
        $data4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

        return [$data1, $this->players, $data3, $data4];
        // return $data3;
    }
}