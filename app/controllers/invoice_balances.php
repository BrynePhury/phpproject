<?php
class Invoice_balances extends Controller
{
    public function index()
    {
        $data['page_title'] = "Invoice Balances";

        if (!isset($_SESSION['user'])){
			echo "<script>
                    location=('http://localhost/membership_members/public/login');
                </script>";
		}
       

        $this->view("invoice_balances", $data);
    }

}