<?php

class Invoices extends Controller
{
    public function index()
    {
        $data['page_title'] = "Invoices";

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['members'])) {
            // Get the class ID and members from the URL parameters
            $membersString = $_GET['members'];
            $members = explode(',', $membersString);

            // Process and generate the invoices
            $this->generateInvoices($members);

            // Redirect back to the invoices page or any other appropriate page
            header('Location: http://localhost/membership/public/invoices');
            exit;
        }

        if (isset($_SESSION['user'])){

            $mem = $_SESSION['user'];
            $data['is_user'] = true;

            $invoices = $this->loadInvoice($mem->id_number);

        } else {

            $invoices = $this->loadInvoices();
            $data['is_user'] = false;

        }

            $membersArr = array();
            $sessionsArr = array();

            if (is_array($invoices)) {
                $DB = new Database();

                foreach ($invoices as $invoice) {
                    $id_number = $invoice->member_id;

                    $query = "SELECT * FROM members WHERE id_number = :id_number LIMIT 1";
                    $params = array(':id_number' => $id_number);
                    $member = $DB->read($query, $params);

                    if ($member) {
                        $membersArr[] = $member[0];
                    }

                    $session_code = $invoice->session_code;

                    $query = "SELECT * FROM m_sessions WHERE session_code = :session_code LIMIT 1";
                    $params = array(':session_code' => $session_code);
                    $session = $DB->read($query, $params);

                    if ($session) {
                        $sessionsArr[] = $session[0];
                    }
                }
            }
        


        $user = $this->loadModel("user");

        // Get all members from the model
        $data['members'] = $this->getAcceptedRequests($user->getAllMembers());

        $data['invoices'] = $invoices;
        $data['invoice_members'] = $membersArr;
        $data['invoice_sessions'] = $sessionsArr;

        $this->view("invoices", $data);
    }

    private function getAcceptedRequests($members) {
		$req = array();
		foreach ($members as $member) {
			if ($member->m_status === 'accepted') {
				$req[] = $member;
			}
		}
		return $req;
	}


    public function generateInvoices($members)
	{
		if (is_array($members) && !empty($members)) {
			// Create a new instance of the Database class
			$DB = new Database();

			try {
				foreach ($members as $memberId) {
					// Get the member's class ID
					$query = "SELECT class_id FROM members WHERE id_number = :member_id";
					$params = array(':member_id' => $memberId);
					$result = $DB->read($query, $params);

					if ($result) {
						$classId = $result[0]->class_id;

						// Get the grouped fees for the member's class
						$groupedFees = $this->getGroupedFees($classId);

						$invoiceNo = $this->generateInvoiceNumber();

                        $m_status = "Open";

                        $open_session = $this->getOpenSessionId($m_status);


						// Insert into invoices table
						$this->insertInvoice($invoiceNo, $memberId,$open_session);

						if ($groupedFees) {
							foreach ($groupedFees as $groupedFee) {
								$feeId = $groupedFee->fee_id;

								// Get the fee details from fees_list
								$feeDetails = $this->getFeeDetails($feeId);

								if ($feeDetails) {
									$feeDescription = $feeDetails[0]->fee_description;
									$amount = $feeDetails[0]->amount;


									// Insert into invoice_details table
									$this->insertInvoiceDetails($invoiceNo, $feeId, '', $amount);
								}
							}
						}
					}
				}

				echo "Invoices generated successfully!";
			} catch (PDOException $e) {
				echo "Error generating invoices: " . $e->getMessage();
			}
		}
	}


    private function getGroupedFees($classId)
    {
        $DB = new Database();
        $query = "SELECT * FROM grouped_fees WHERE class_id = :class_id";
        $params = array(':class_id' => $classId);
        return $DB->read($query, $params);
    }

    private function getOpenSessionId($m_status)
    {

        $DB = new Database();
        $query = "SELECT * FROM m_sessions WHERE m_status = :m_status";
        $params = array(':m_status' => $m_status);
        $sess = $DB->read($query, $params);

        return $sess[0]->session_code;
    }

    private function getFeeDetails($feeId)
    {
        $DB = new Database();
        $query = "SELECT * FROM fees_list WHERE fee_id = :fee_id";
        $params = array(':fee_id' => $feeId);
        return $DB->read($query, $params);
    }

    private function insertInvoice($invoiceNo,$memberId,$session_code)
	{
		$DB = new Database();
		$query = "INSERT INTO invoices (invoice_no,member_id,session_code) VALUES (:invoice_no, :member_id, :session_code)";
		$params = array(':invoice_no' => $invoiceNo,':member_id' => $memberId, ':session_code' => $session_code );
		$DB->write($query, $params);
	}


    private function insertInvoiceDetails($invoiceNo, $feeId, $period, $amount)
    {
        $DB = new Database();
        $query = "INSERT INTO invoice_details (invoice_no, fee_id, period, amount) VALUES (:invoice_no, :fee_id, :period, :amount)";
        $params = array(
            ':invoice_no' => $invoiceNo,
            ':fee_id' => $feeId,
            ':period' => $period,
            ':amount' => $amount
        );
        $DB->write($query, $params);
    }

    public function loadInvoices()
    {
        $DB = new Database();
        $query = "SELECT * FROM invoices";
        return $DB->read($query);
    }
    public function loadInvoice($member_id)
        {
            $DB = new Database();
            $query = "SELECT * FROM invoices where member_id = :member_id";
            $params = array(':member_id' => $member_id);
            return $DB->read($query,$params);
        }

    private function generateInvoiceNumber()
    {
        // Replace this placeholder implementation with your actual code to generate a unique invoice number
        return uniqid(); // Example: using uniqid() function to generate a unique ID
    }
}
