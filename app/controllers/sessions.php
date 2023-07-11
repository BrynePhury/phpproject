<?php
class Sessions extends Controller
{
    public function index()
    {
        $data['page_title'] = "Sessions";
        
        $sessions = $this->loadSess();

        $data['sessions'] = $sessions;
       

        $this->view("sessions", $data);
    }

    public function loadSess()
    {
        $DB = new Database();

        $query = "SELECT * FROM m_sessions";

        return $DB->read($query);
    }
}