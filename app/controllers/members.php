<?php
class Members extends Controller
{
    public function index()
    {
        $data['page_title'] = "Members";

		// Check if it's a GET request with a search query
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['searchQuery'])) {
            $this->search();
            return;
        }

		$user = $this->loadModel("user");

        // Get all members from the model
        $members = $user->getAllMembers();

        // Pass $members variable to the view
        $data['members'] = $members;

        $this->view("members", $data);
    }

    function search()
    {
        $data['page_title'] = "Search Results";

        // Retrieve the search query from the GET parameters
        $searchQuery = $_GET['searchQuery'];

        // Perform the search using the search query
        $user = $this->loadModel("user");
        $members = $user->searchMembers($searchQuery);

        // Pass the search results to the view
        $data['members'] = $members;

        $this->view("search_results", $data);
    }
}
