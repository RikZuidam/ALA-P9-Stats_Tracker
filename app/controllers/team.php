<?php

class Profile extends Controller
{
	public function index($name = '')
	{
		$user = $this->model('User');
		$user->name = $name;
		
		$this->view('profile/index', ['name' => $user->name]);
	}

	// public function test()
	// {
	// 	echo "test";
	// }
}