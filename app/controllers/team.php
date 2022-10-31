<?php

class Team extends Controller
{
    public $id;
    
	public function info2()
	{
            if(isset($_POST["infoTeam"])) {
		$user = $this->model('TeamModel');
                $user->id = $_POST["infoTeam"];
                $user->info();
		
		$this->view('profile/index', ['name' => $user->name]);
            }
	}

	 public function info($item_id)
	 {
                $teamInfo = $this->model('TeamModel');
                $teamInfo->id = $item_id;
                $teamInfo->info();
                if(is_null($teamInfo->info())) {
                    $this->view('team/info', false);
                } else {
                    $this->view('team/info', $teamInfo->info());
                }
	 }
}