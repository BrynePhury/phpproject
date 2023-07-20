<?php

Class Dashboard extends Controller
{
	function index()
	{
		$data['page_title'] = "Dashboard";


		$this->view("dashboard",$data);
	}

}