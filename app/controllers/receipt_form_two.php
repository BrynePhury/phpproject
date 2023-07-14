<?php
class Receipt_form_two extends Controller
{
    public function index()
    {
        $data['page_title'] = "Receipts";

        $arr = $_POST['selector'];
        $n = count($arr);

        $memberId= -1;
        $feeIds = array();

        for ($i=0; $i < $n; $i++){
        $actualArray = explode(',',$arr[$i]);

        $feeIds[] = $actualArray[0];
        $memberId= $actualArray[1];

        }

        // Get the member from the database
        $member = $this->getMember($memberId);

        if (!$member) {
            // Member not found, handle the error
            echo "Member not found";
            return;
        }


		$data['member'] = $member;

        $this->view("Receipt_form_two", $data);
    }
}