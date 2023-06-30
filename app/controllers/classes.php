<?php

Class Classes extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "Classes";
		
		$this->view("classes",$data);
	}

}