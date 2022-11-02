<?php

class Home extends Controller
{
//	public function test($name = '')
//	{
//		$user = $this->model('User');
//		$user->name = $name;
//		
//		$this->view('home/test', ['name' => $user->name]);
//	}

	public function dashboard()
	{
		session_start();
        if(isset($_SESSION['admin'])) {
            if(isset($_POST["searchEnter"])) {
                $items = $this->model('UserModel')->getSpecific($_POST["input"]);
                $this->view('home/dashboard', ['items' => $items, 'input' => $_POST["input"]]);
            } 
            if(isset($_POST["editItem"])) {
                $id = $_POST["editItem"];
                header("location: ../account/detail/$id");
            } 
            if(isset($_POST["deleteItem"])) {
                $items = $this->model('UserModel')->delete($_POST["deleteItem"]);
                header("location: dashboard");
            } 
            $items = $this->model('UserModel')->get();
            $this->view('home/dashboard', ['items' => $items]);
        } else {
            if(isset($_POST['selectTeam'])) {
                $id = $_POST['selectTeam'];
                header("location: ../team/info/$id");
            }
            $teams = $this->model('TeamModel')->get();
            $this->view('home/dashboard', ['teams'=>$teams]);
        }
	}

	// CRUD

	public function index()
	{
		$this->view("home/index");
	}

    public function requests()
    {
        if(isset($_POST['acceptRequest'])) {
            $requests = $this->model('TeamModel')->acceptRequest($_POST['acceptRequest']);
            header("location: ../home/requests");
        }
        if(isset($_POST['declineRequest'])) {
            $requests = $this->model('TeamModel')->declineRequest($_POST['declineRequest']);
            header("location: ../home/requests");
        }
        $requests = $this->model('TeamModel')->getRequests();
        $this->view("home/requests", ['requests'=>$requests]);
    }
}