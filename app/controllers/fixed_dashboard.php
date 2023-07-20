<?php

Class Fixed_dashboard extends Controller 
{

	function index()
	{
 	 	
 	 	$data['page_title'] = "Invoices Form";

		// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        //     $this->handleLoginForm();
        // }

		

		$this->view("fixed_dashboard",$data);
	}

	
}