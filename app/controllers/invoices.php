<?php

Class Invoices extends Controller 
{

	function index()
	{
 	 	
 	 	$data['page_title'] = "Invoices";

		// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        //     $this->handleLoginForm();
        // }

		$invoices = $this->loadInvoices();

		$data['invoices'] = $invoices;

		$this->view("invoices",$data);
	}

	public function loadInvoices()
    {
        $DB = new Database();

        $query = "SELECT * FROM invoices";

        return $DB->read($query);
    }
}