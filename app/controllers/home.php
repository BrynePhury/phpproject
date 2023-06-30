<?php

Class Home extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "Home";

		  $user = $this->loadModel("user");

 	 		header("Location:". ROOT . "signup");
			die;
 	 		

		$this->view("home",$data);
	}

}