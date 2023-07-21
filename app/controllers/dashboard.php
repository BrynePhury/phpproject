<?php

Class Dashboard extends Controller
{
	function index(){
		$data['page_title'] = "Dashboard";

		$user = $this->loadModel("user");

        // Get all members from the model
        $members = $user->getAllMembers();

        // Pass $members variable to the view
        $data['members'] = $members;

		$pending_requests = $this->getPendingRequests($members);

		$data['pending_members'] = $pending_requests;

		$this->view("dashboard",$data);
	}

	private function getPendingRequests($members) {
		$req = array();
		foreach ($members as $member) {
			if ($member->m_status === 'pending') {
				$req[] = $member;
			}
		}
		return $req;
	}
	

}