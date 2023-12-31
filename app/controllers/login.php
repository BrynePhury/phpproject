<?php

Class Login extends Controller 
{

	private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

	function index()
	{
 	 	
 	 	$data['page_title'] = "Login";

		  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $this->handleLoginForm();
        }

		$this->view("login",$data);
	}

	public function handleLoginForm()
    {
        // Retrieve form data
        $email = $_POST['email'];
        // $password = $_POST['password'];

        // Example: Perform authentication using a database query
        $query = "SELECT * FROM members WHERE email = :email limit 1";
        $data = [
            'email' => $email,
            // 'password' => $password
        ];
        $user = $this->db->read($query, $data);

        if ($user[0]->m_status === "accepted"){


            if ($user) {
                // Successful login
                // You can perform any necessary actions here (e.g., set session variables, redirect to a dashboard page)

                $_SESSION['user'] = $user[0];
                    
                echo "<script>alert('Log in Success');
                    location=('http://localhost/membership_members/public/member_dashboard');
                    </script>";

                // Redirect to the desired page
                //header("Location: " . ROOT . "dashboard");
                die;
            } else {
                // Failed login
                // You can display an error message or perform any necessary actions

                echo "Invalid email or password";
            }

        } else {
            echo "<script>alert('Not Accepted');
                    location=('http://localhost/membership_members/public/login');
                    </script>";

                die;

        }
    }

}