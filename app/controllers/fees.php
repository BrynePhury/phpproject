<?php

Class Fees extends Controller
{
	function index()
	{
		$data['page_title'] = "Fees";

		
        $fees = $this->loadFees();

        $data['fees'] = $fees;


		$this->view("fees",$data);
	}

	public function loadFees()
    {
        $DB = new Database();

        $query = "SELECT * FROM fees_list";

        return $DB->read($query);
    }

}