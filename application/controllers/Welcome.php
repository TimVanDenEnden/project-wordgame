<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        session_start();

        if (!isset($_SESSION['userdata']))
        {
        	header("LOCATION: /login");
        }
    }

	public function index()
	{
		$this->load->view('index');
	}
}
