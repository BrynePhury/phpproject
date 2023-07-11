<?php

Class Invoices extends Controller 
{

	function index()
	{
 	 	
 	 	$data['page_title'] = "Invoices";

		if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['members'])) {
            $selectedMembers = $_GET['members'];

            $memberIds = explode(',', $selectedMembers);
    
            // Process and create the grouped fees
            $this->generateInvoices($memberIds);
    
            // Redirect back to the add_fees page or any other appropriate page
            header('Location: http://localhost/membership/public/Invoices');
            exit;
        } 

		$invoices = $this->loadInvoices();

		$user = $this->loadModel("user");

        // Get all members from the model
        $data['members'] = $user->getAllMembers();

		$data['invoices'] = $invoices;

		$this->view("invoices",$data);
	}

	public function generateInvoices($members){

		if (is_array($members) && !empty($members)){
			// Create a new instance of the Database class
			$DB = new Database();

			try {
				// Insert the grouped fees into the grouped_fees table
				foreach ($members as $member) {
					$classId = $member->class_id;
					$member_id = $member->member_id;
					
					$query = "INSERT INTO invoices (member_id, fee_id) VALUES (:member_id, :fee_id)";
					$params = array(':member_id' => $member_id, ':fee_id' => $feeId);
					$DB->write($query, $params);
				}
				
				echo "Grouped fees created successfully!";
			} catch (PDOException $e) {
				echo "Error creating grouped fees: " . $e->getMessage();
			}
		}
	
        

        
	}

	public function loadInvoices()
    {
        $DB = new Database();

        $query = "SELECT * FROM invoices";

        return $DB->read($query);
    }
}