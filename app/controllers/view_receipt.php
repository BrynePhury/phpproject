<?php
class View_receipt extends Controller
{
    public function index()
    {
        $data['page_title'] = "View Receipt";


        // Get the invoice number from the $_GET global
        $receiptNo = $_GET['receipt'];

        // Create a new instance of the Database class
        $DB = new Database();

        // Get the invoice details
        $query = "SELECT * FROM receipts WHERE receipt_no = :receiptNo";
        $params = array(':receiptNo' => $receiptNo);
        $receipt = $DB->read($query, $params);

        if (!$receipt) {
            // Handle the case when the invoice is not found
            echo "Invoice not found.";
            return;
        }

        $data['receipt'] = $receipt[0];

        // Get the member details
        $memberId = $receipt[0]->member_id;
        $query = "SELECT * FROM members WHERE id_number = :id_number";
        $params = array(':id_number' => $memberId);
        $member = $DB->read($query, $params);
 
        if (!$member) {
            // Handle the case when the member is not found
            echo "Member not found.";
            return;
        }
 
        $data['member'] = $member[0];

        // Get the session details
        $sessionCode = $receipt[0]->session_code;
        $query = "SELECT * FROM m_sessions WHERE session_code = :session_code";
        $params = array(':session_code' => $sessionCode);
        $session = $DB->read($query, $params);

        if (!$session) {
            // Handle the case when the session is not found
            echo "Session not found.";
            return;
        }

        $data['session'] = $session[0];

        // Get the fee details from fees_list
        $query = "SELECT * FROM receipt_details WHERE receipt_id = :receipt_id";
        $params = array(':receipt_id' => $receiptNo);
        $receiptDetails = $DB->read($query, $params);

        foreach ($receiptDetails as $receiptDetail) {
            $fees[] = $receiptDetail;

        }
           
        $data['fees'] = $fees;
        $totalAmount = $this->calculateTotalAmount($fees);
        $data['totalAmount'] = $totalAmount;

        $receipt = $this->getReceipt($receiptNo);

        $data['receipt'] = $receipt;
        

        $this->view("view_receipt", $data);
    }

    // Calculate the total amount from the fees
    private function calculateTotalAmount($fees)
    {
        $totalAmount = 0;
        
        foreach ($fees as $fee) {
            $totalAmount += $fee->amount_paid;
        }
        
        return $totalAmount;
    }

    private function getReceipt($receiptNo){
        // Create a new instance of the Database class
        $DB = new Database();

        // Get the invoice details
        $query = "SELECT * FROM receipts WHERE receipt_no = :receiptNo";
        $params = array(':receiptNo' => $receiptNo);
        $receipts = $DB->read($query, $params);

        return $receipts[0];
    }
}