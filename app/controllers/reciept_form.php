<?php
class Reciept_form extends Controller
{
    public function index()
    {
        $data['page_title'] = "Receipt Form";

        // Get the member ID from the $_GET request
        $memberId = $_GET['member_id'];
        
        // Get the member from the database
        $member = $this->getMember($memberId);
        
        // Get the applicable fees for the member
        $fees = $this->getApplicableFees($member->class_id);

        $data['member'] = $member;
        $data['fees'] = $fees;

        $this->view("reciept_form", $data);
    }

    private function getMember($memberId)
    {
        // Create an instance of the Database class
        $DB = new Database();

        // Query to retrieve the member from the database
        $query = "SELECT * FROM members WHERE id_number = :member_id";
        $params = array(':member_id' => $memberId);

        // Execute the query with parameters
        $result = $DB->read($query, $params);

        // Check if a member is found
        if ($result && !empty($result)) {
            return $result[0]; // Return the first row as the member object
        } else {
            return null; // Return null if no member found
        }
    }

    private function getApplicableFees($classId)
    {
        // Create an instance of the Database class
        $DB = new Database();

        // Query to retrieve the applicable fees for the class
        $query = "SELECT fl.* 
                  FROM grouped_fees gf
                  INNER JOIN fees_list fl ON gf.fee_id = fl.fee_id
                  WHERE gf.class_id = :class_id";
        $params = array(':class_id' => $classId);

        // Execute the query with parameters
        $result = $DB->read($query, $params);

        // Check if applicable fees are found
        if ($result && !empty($result)) {
            return $result; // Return the array of applicable fees
        } else {
            return array(); // Return an empty array if no applicable fees found
        }
    }
}


