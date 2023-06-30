<?php

class Signup extends Controller
{
    public function index()
    {
        $data['page_title'] = "Signup";

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
            $this->handleSignupForm();
        }

        $this->view("signup", $data);
    }

    public function handleSignupForm(){
        // Retrieve form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $contact1 = $_POST['contact1'];
        $contact2 = $_POST['contact2'];
        $email = $_POST['email'];
        $id_number = $_POST['id_number'];
        $cv = $_FILES['cv'];

        // Validate file format
        $allowedExtensions = array('pdf');
        $fileExtension = strtolower(pathinfo($cv['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Invalid file format. Only PDF files are allowed.";
            return;
        }

        // Insert data into the members table
        $query = "INSERT INTO members (fname, lname, contact1, contact2, email, id_number, cv_file) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $data = array($first_name, $last_name, $contact1, $contact2, $email, $id_number, $cv['name']);

        // Create an instance of the Database class
        $db = new Database();

        // Insert the data into the table
        if ($db->write($query, $data)) {
            echo "Signup successful";
        } else {
            echo "Signup failed";
        }
    }


}
