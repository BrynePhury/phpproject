<?php

class View_invoice extends Controller
{
    public function index()
    {
        $data['page_title'] = "View Invoice";

        if (!isset($_SESSION['user'])){
			echo "<script>
                    location=('http://localhost/membership_members/public/login');
                </script>";
		}

        // Get the invoice number from the $_GET global
        $invoiceNo = $_GET['invoice'];

        // Create a new instance of the Database class
        $DB = new Database();

        // Get the invoice details
        $query = "SELECT * FROM invoices WHERE invoice_no = :invoice_no";
        $params = array(':invoice_no' => $invoiceNo);
        $invoice = $DB->read($query, $params);

        if (!$invoice) {
            // Handle the case when the invoice is not found
            echo "Invoice not found.";
            return;
        }

        $data['invoice'] = $invoice[0];

        // Get the member details
        $memberId = $invoice[0]->member_id;
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
        $sessionCode = $invoice[0]->session_code;
        $query = "SELECT * FROM m_sessions WHERE session_code = :session_code";
        $params = array(':session_code' => $sessionCode);
        $session = $DB->read($query, $params);

        if (!$session) {
            // Handle the case when the session is not found
            echo "Session not found.";
            return;
        }

        $data['session'] = $session[0];

        // Get the grouped fees for the member's class
        $classId = $member[0]->class_id;
        $query = "SELECT fee_id FROM grouped_fees WHERE class_id = :class_id";
        $params = array(':class_id' => $classId);
        $groupedFees = $DB->read($query, $params);

        if ($groupedFees) {
            $fees = array();
            foreach ($groupedFees as $groupedFee) {
                $feeId = $groupedFee->fee_id;

                // Get the fee details from fees_list
                $query = "SELECT * FROM fees_list WHERE fee_id = :fee_id";
                $params = array(':fee_id' => $feeId);
                $feeDetails = $DB->read($query, $params);

                if ($feeDetails) {
                    $fees[] = $feeDetails[0];
                }
            }
            $data['fees'] = $fees;
            $totalAmount = $this->calculateTotalAmount($fees);
            $data['totalAmount'] = $totalAmount;
        } else {
            // Handle the case when there are no grouped fees available
            $data['fees'] = array();
        }

        // Get the invoice details
        $query = "SELECT * FROM invoice_details WHERE invoice_no = :invoice_no";
        $params = array(':invoice_no' => $invoiceNo);
        $invoiceDetails = $DB->read($query, $params);

        if (!$invoiceDetails) {
            // Handle the case when the invoice details are not found
            echo "Invoice details not found.";
            return;
        }

        $data['invoiceDetails'] = $invoiceDetails;

        

        $this->view("view_invoice", $data);
    }

    // Calculate the total amount from the fees
    private function calculateTotalAmount($fees)
    {
        $totalAmount = 0;
        
        foreach ($fees as $fee) {
            $totalAmount += $fee->amount;
        }
        
        return $totalAmount;
    }

}
