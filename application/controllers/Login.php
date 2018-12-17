<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        session_start();

        if (isset($_SESSION['userdata']) && !empty($_SESSION['userdata']))
        {
        	header("location; /");	
        }
    }

	public function index()
	{
		$this->load->view('/authentication/login', array(
			'msg' => '',
			'username' => '',
			'password' => ''
		));
	}

	public function execute()
	{
		if (isset($_POST['input-username']) && !empty($_POST['input-username']) && isset($_POST['input-password']) && !empty($_POST['input-password'])) 
		{
			$url = 'https://spelladmin.easypeasycoding.com/api/login';

			$data = array(
				'Username' => $_POST['input-username'],
				'Password' => md5($_POST['input-password']),
			);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, true);

			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$output = curl_exec($ch);
			$info = curl_getinfo($ch);
			curl_close($ch);
			
			$apiData = json_decode($output);

			if ($apiData->status == "ERROR" && $apiData->msg == "Unauthorised, check values")
			{
				$this->load->view('/authentication/login', array(
					'msg' => 'Please fill in the correct username and password.',
					'username' => '',
					'password' => ''
				));
			}
			else if ($apiData->status == "OK" && $apiData->msg == "successfully")
			{
				$_SESSION['userdata'] = $apiData->authenticationData;
				header("location: /");

			}

		}
		else
		{
			$username = "";
			$password = "";

			if (isset($_POST['input-username']) && !empty($_POST['input-username']))
			{
				$username = $_POST['input-username'];
			}

			if (isset($_POST['input-password']) && !empty($_POST['input-password']))
			{
				$password = $_POST['input-password'];
			}

			$this->load->view('/authentication/login', array(
				'msg' => 'Please fill in the username and password.',
				'username' => $username,
				'password' => $password
			));
		}
	}

	public function logout()
	{
		session_destroy();

		header("location: /login");
	}
}