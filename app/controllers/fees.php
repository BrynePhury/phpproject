<?php

Class Fees extends Controller
{
	function index()
	{
		$data['page_title'] = "Fees";
		$this->view("fees",$data);
	}

}