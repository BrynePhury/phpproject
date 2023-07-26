<?php

Class Member_dashboard extends Controller
{
	function index(){
		$data['page_title'] = "Dashboard";

		$user = $this->loadModel("user");

        // Get all members from the model
        $members = $user->getAllMembers();

        // Pass $members variable to the view
        $data['members'] = $members;

		if (!isset($_SESSION['user'])){
			echo "<script>
                    location=('http://localhost/membership_members/public/login');
                </script>";
		}


		// $pending_requests = $this->getPendingRequests($members);

		// $data['pending_members'] = $pending_requests;

		$this->view("member_dashboard",$data);
	}

	// private function getPendingRequests($members) {
	// 	$req = array();
	// 	foreach ($members as $member) {
	// 		if ($member->m_status === 'pending') {
	// 			$req[] = $member;
	// 		}
	// 	}
	// 	return $req;
	// }
	

}