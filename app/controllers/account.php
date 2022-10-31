<?php

class Account extends Controller
{
	public function register()
	{
		if(isset($_POST['btnRegister'])) {
			$newItem = $this->model('UserModel');
			$newItem->name  = $_POST['name'];
			$newItem->email = $_POST['email'];
			$newItem->pwd   = $_POST['pwd'];
			if($newItem->create() === true) {
				header("location: login");
			} else {
				$this->view("account/register", ['error'=>$newItem->create(), `name`=>$_POST['name'], `email`=>$_POST['email']]);
			}
		} else {
			$this->view("account/register");
		}
	}

	public function login()
	{
		if(isset($_POST['btnLogin'])) {
			$item = $this->model('UserModel');
			$item->email = $_POST['email'];
			$item->pwd   = $_POST['pwd'];
			if($item->login() === true) {
                                header("location: ../home/dashboard");
			} else {
				$this->view("account/login", ['error'=>$item->login(), 'email'=>$_POST['email']]);
			}
		} else {
			$this->view("account/login");
		}
	}

	public function create()
	{
		// CREATE
		if(isset($_POST['btnCreate'])) {
			$newItem = $this->model('UserModel');
			$newItem->name = $_POST['name'];
			$newItem->create2();
			header("location: ../home/dashboard");
		} else {
			$this->view('account/create');
		}
	}

	public function detail($item_id)
	{
                session_start();
                $id = $_SESSION['id'];
                if(!isset($_SESSION['admin'])) {
                    if($_SESSION["id"] != $item_id) {
                        header("location: ../../account/detail/$id");
                    }
                }
		if(isset($_POST['btnUpdate'])) {                                // UPDATE
			$theItem2 = $this->model('UserModel');
			$theItem2->name = $_POST['name'];
                        $theItem2->email = $_POST['email'];
			$theItem2->update($item_id);
                        header("location: ../../home/dashboard");
		} elseif(isset($_POST["btnDelete"])) {                          // DELETE
			$theItem3 = $this->model('User')->delete($item_id);
			header("location: ../../home/dashboard");
		} else {                                                        // READ
                    $theItem = $this->model('UserModel')->read($item_id);
                    $this->view("account/detail", ['item'=>$theItem]);
                }
	}
        
        public function request()
        {   
            $items = $this->model('UserModel')->getRequests();
            $this->view('account/request', ['request'=>$items]);
        }
        
        public function logout()
        {
            session_start();
            session_unset();
            session_destroy();
            header("location: ../home/");
        }
}