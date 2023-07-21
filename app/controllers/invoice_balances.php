<?php
class Invoice_balances extends Controller
{
    public function index()
    {
        $data['page_title'] = "Invoice Balances";
       

        $this->view("invoice_balances", $data);
    }

}