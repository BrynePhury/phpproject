<?php
class Reports extends Controller
{
    public function index()
    {
        $data['page_title'] = "Reports";

        if (!isset($_SESSION['user'])){
			echo "<script>
                    location=('http://localhost/membership_members/public/login');
                </script>";
		}
       

        $this->view("reports", $data);
    }

}