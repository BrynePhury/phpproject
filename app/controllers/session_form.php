<?php
class Session_form extends Controller
{
    public function index()
    {
        $data['page_title'] = "Sessions form";      

        $this->view("session_form", $data);
    }

}