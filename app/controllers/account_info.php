<?php
class Account_info extends Controller
{
    public function index()
    {
        $data['page_title'] = "Account";

        if (!isset($_SESSION['user'])){
			echo "<script>
                    location=('http://localhost/membership_members/public/login');
                </script>";
		}


        $this->view("account_info", $data);
    }

   
}