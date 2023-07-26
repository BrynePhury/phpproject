<?php
class Change_password extends Controller
{
    public function index()
    {
        $data['page_title'] = "Change Password";

        if (!isset($_SESSION['user'])){

			echo "<script>
                    location=('http://localhost/membership_members/public/login');
                </script>";
		}


        $this->view("change_password", $data);
    }

   
}