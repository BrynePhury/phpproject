<?php
class Reciepts extends Controller
{
    public function index()
    {
        $data['page_title'] = "Reciepts";

		

        $this->view("reciepts", $data);
    }
}