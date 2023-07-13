<?php
class Reciepts extends Controller
{
    public function index()
    {
        $data['page_title'] = "Reciepts";

		$user = $this->loadModel("user");

        // Get all members from the model
        $data['members'] = $user->getAllMembers();

        $this->view("reciepts", $data);
    }
}