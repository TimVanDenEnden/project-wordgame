<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller 
{

	public function load()
	{
                session_start();
                
                $url = "https://spelladmin.easypeasycoding.com/api/getLists";

                $data = array(
                'studentId' => $_SESSION['userdata']->studentId,
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                echo curl_exec($ch);

                curl_close($ch);
        }

        public function startSession()
        {
                if (isset($_POST['listId']) && !empty($_POST['listId']))
                {
                        session_start();
                        
                        $url = "https://spelladmin.easypeasycoding.com/api/startSession";

                        $data = array(
                                'listId' => $_POST['listId'],
                                'studentId' => $_SESSION['userdata']->studentId,
                        );

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        echo curl_exec($ch);

                        curl_close($ch);
                }
                else
                {
                        echo json_encode(array(
                                'status' => 'ERROR',
                                'msg' => 'Please provide all needed data.', 
                        ));
                }
        }
}