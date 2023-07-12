<?php

class Invoices extends Controller
{
    public function index()
    {
        $data['page_title'] = "Invoices";

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['members'])) {
            // Get the class ID and members from the URL parameters
			
            $membersString = $_GET['members'];
            if (is_array($membersString)) {
                $members = $membersString; // Use the array directly
            } else {
                $members = explode(',', $membersString); // Convert the string to an array
            }

            // // Process and generate the invoices
            $this->generateInvoices($members);

            // // Redirect back to the invoices page or any other appropriate page
            // header('Location: http://localhost/membership/public/invoices');
            // exit;
        } 

        $invoices = $this->loadInvoices();

        $user = $this->loadModel("user");

        // Get all members from the model
        $data['members'] = $user->getAllMembers();

        $data['invoices'] = $invoices;

        $this->view("invoices", $data);
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

						// Insert into invoices table
						$this->insertInvoice($invoiceNo, $memberId);

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

    private function getFeeDetails($feeId)
    {
        $DB = new Database();
        $query = "SELECT * FROM fees_list WHERE fee_id = :fee_id";
        $params = array(':fee_id' => $feeId);
        return $DB->read($query, $params);
    }

    private function insertInvoice($invoiceNo,$memberId)
	{
		$DB = new Database();
		$query = "INSERT INTO invoices (invoice_no,member_id) VALUES (:invoice_no, :member_id)";
		$params = array(':invoice_no' => $invoiceNo,':member_id' => $memberId ); // Modify session_code as per your requirement
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

    private function generateInvoiceNumber()
    {
        // Replace this placeholder implementation with your actual code to generate a unique invoice number
        return uniqid(); // Example: using uniqid() function to generate a unique ID
    }
}
