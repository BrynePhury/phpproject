<?php
class Receipts extends Controller
{
    public function index()
    {
        $data['page_title'] = "Receipts";

		$user = $this->loadModel("user");

        // Get all members from the model
        $data['members'] = $user->getAllMembers();

        $data['receipts'] = $this->getAllReceipts();

        $this->view("receipts", $data);
    }

    public function getAllReceipts()
    {
        $DB = new Database();
        
        $query = "SELECT receipts.receipt_no,receipts.member_id,receipts.session_code,members.id_number,members.fname,members.lname,m_sessions.session_name,m_sessions.session_code FROM receipts join members on members.id_number = receipts.member_id join m_sessions on m_sessions.session_code = receipts.session_code order by members.fname";
        $receipts = $DB->read($query);

        return $receipts;
    }
}