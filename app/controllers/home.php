<?php

class Home extends Controller
{
	public function test($name = '')
	{
		$user = $this->model('User');
		$user->name = $name;
		
		$this->view('home/test', ['name' => $user->name]);
	}

	public function index()
	{
		$items = $this->model('User')->get();
		
		$this->view('home/index', ['items' => $items]);
	}

	// CRUD
	public function create()
	{
		// CREATE
		if(isset($_POST['btnCreate'])) {
			$newItem = $this->model('User');
			$newItem->name = $_POST['name'];
			$newItem->create();
			header("location: index");
		} else {
			$this->view('home/create');
		}
	}

	public function detail($item_id)
	{
		// READ
		$theItem = $this->model('User')->read($item_id);
		$this->view("home/detail", ['item'=>$theItem]);

		// UPDATE
		if(isset($_POST['btnUpdate'])) {
			$theItem2 = $this->model('User');
			$theItem2->name = $_POST['name'];
			$theItem2->update($item_id);
			header("location: ../../home/");
		}

		// DELETE
		if(isset($_POST["btnDelete"])) {
			$theItem3 = $this->model('User')->delete($item_id);
			header("location: ../../home/");
		}
	}
}