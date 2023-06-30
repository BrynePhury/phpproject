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

    public function handleSignupForm()
    {
        // Retrieve form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $contact1 = $_POST['contact1'];
        $contact2 = $_POST['contact2'];
        $email = $_POST['email'];
        $id_number = $_POST['id_number'];
        // Access the uploaded file information
        $cv = $_FILES['cv'];

        // Process the form data and perform necessary actions (e.g., store data in database, send emails, etc.)

        // Example: Display the retrieved data
        echo "First Name: $first_name<br>";
        echo "Last Name: $last_name<br>";
        echo "Contact 1: $contact1<br>";
        echo "Contact 2: $contact2<br>";
        echo "Email: $email<br>";
        echo "ID Number: $id_number<br>";
        echo "CV: " . $cv['name']; // Example to display the uploaded file name
    }
}
