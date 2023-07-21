<?php
class View_cv extends Controller
{
    public function index()
    {
        $data['page_title'] = "View CV";
        
        $data['cv_file'] = $_GET['cv_file'];

        $this->view("view_cv", $data);
    }

  
    
}
