<?php
class Sessions extends Controller
{
    public function index()
    {
        $data['page_title'] = "Sessions";

       

        $this->view("sessions", $data);
    }
}