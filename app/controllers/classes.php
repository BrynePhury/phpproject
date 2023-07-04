<?php

class Classes extends Controller 
{
    public function index()
    {
        $data['page_title'] = "Classes";

        // Load the classes
        $classes = $this->loadClasses();

        $data['classes'] = $classes;

        $this->view("classes", $data);
    }

    public function loadClasses()
    {
        // Create a new instance of the Database class
        $DB = new Database();

        // Retrieve classes from the database using prepared statements
        $query = "SELECT * FROM classes";

        return $DB->read($query);
    }
}
