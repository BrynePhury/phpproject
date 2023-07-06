<?php

Class Invoices_form extends Controller 
{

	function index()
	{
 	 	
 	 	$data['page_title'] = "Invoices Form";

		// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        //     $this->handleLoginForm();
        // }

		

		$this->view("invoices_form",$data);
	}

	
}