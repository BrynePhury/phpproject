<?php

Class Invoices extends Controller 
{

	function index()
	{
 	 	
 	 	$data['page_title'] = "Invoices";

		// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        //     $this->handleLoginForm();
        // }

		$this->view("invoices",$data);
	}
}