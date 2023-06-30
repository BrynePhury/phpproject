<?php

Class Classes_form extends Controller
{
	function index()
	{
		$data['page_title'] = "Classes Form";
		$this->view("class_form",$data);
	}

}