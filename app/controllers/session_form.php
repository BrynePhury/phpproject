<?php
class Session_form extends Controller
{
    public function index()
    {
        $data['page_title'] = "Sessions form";      

        $this->view("session_form", $data);
    }

    public function handleClassForm()
    {
        $className = $_POST['session_name'];
        $experienceRequired = $_POST['experience_required'];

        $this->saveClassToDatabase($className, $experienceRequired);
    }

    public function saveClassToDatabase($className, $experienceRequired)
    {
        $db = new Database(); // Instantiate your database class

        // Prepare the SQL query
        $query = "INSERT INTO m_session (class_name, experience_required) VALUES (?, ?)";

        // Bind the parameter values
        $values = array($className, $experienceRequired);

        // Execute the query using the write() method of the Database class
        if ($db->write($query, $values)) {
            // Data inserted successfully
            echo "<script>alert('Class Added');
                location=('http://localhost/membership/public/classes');
                </script>";
        } else {
            // Error occurred while inserting data
            echo "<script>alert('Some Error Occured');
                location=('http://localhost/membership/public/classes_form');
                </script>";
        }
    }

}