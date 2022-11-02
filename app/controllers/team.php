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
        session_start();
            if(isset($_POST['joinTeam'])) {
                $team = $this->model('TeamModel');
                $team->id = $_POST['joinTeam'];
                if($team->sendRequest($_SESSION['id']) === false) {
                    $teams = $this->model('TeamModel')->get();
                    $this->view('home/dashboard', ['teams'=>$teams, 'error'=>"Already did a request to a team!"]);
                } else {
                    $teams = $this->model('TeamModel')->get();
                    $this->view('home/dashboard', ['teams'=>$teams, 'success'=>"Successfull send a request!"]);
                }
            } else {
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
}