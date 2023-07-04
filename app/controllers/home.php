<?php

Class Home extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "Home";
		
		$user = $this->loadModel("user");

		// Get all members from the model
		$members = $user->getAllMembers();

		// Pass $members variable to the view
        $data['members'] = $members;

		$this->view("home",$data);
	}

}