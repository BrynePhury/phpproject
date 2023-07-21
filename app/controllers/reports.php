<?php
class Reports extends Controller
{
    public function index()
    {
        $data['page_title'] = "Reports";
       

        $this->view("reports", $data);
    }

}