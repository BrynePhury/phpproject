<?php
class View_cv extends Controller
{
    public function index()
    {
        $data['page_title'] = "View CV";

        if (!isset($_SESSION['user'])){
			echo "<script>
                    location=('http://localhost/membership_members/public/login');
                </script>";
		}
        
        $data['cv_file'] = $_GET['cv_file'];

        $this->view("view_cv", $data);
    }

  
    
}
